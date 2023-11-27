<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Models\Quiz; 
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function GetCsv(Request $request)
{
    if ($request->hasFile('csv_file')) {
        $file = $request->file('csv_file');

        $path = $file->storeAs('csv_file', $file->getClientOriginalName());

        $filenameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $file = fopen(storage_path('app/' . $path), "r");

        if ($file) {
            fgetcsv($file, 0, ';'); // Sautez la première ligne (ligne d'en-tête)

            $dataCsv = [];

            while (($row = fgetcsv($file, 0, ';')) !== false) {
                $row = array_map('trim', $row);

                //Construire chaque entrée pour le tableau $dataCsv
                $entry = [
                    'Question' => $row[0],
                    'Description' => $row[1],
                    'Type' => $row[2],
                    'QuestionContent' => $row[3],
                    'ReponseContent' => $row[4],
                    'Correct' => strtolower($row[5]) === 'true' ? 'Correct' : 'Incorrect',
                    'Tags' => $row[6],
                ];
                // $entry = [
                  
                //     'Description' => $row[0],
                //     'Type' => $row[1],
                //     'QuestionContent' => $row[2],
                //     'ReponseContent' => $row[3],
                //     'Correct' => strtolower($row[4]) === 'true' ? 'Correct' : 'Incorrect',
                //     'Tags' => $row[5],
                // ];

                // Correction d'encodage des valeurs
                $entry = array_map(function ($value) {
                    return mb_convert_encoding($value, 'UTF-8', 'UTF-8');
                }, $entry);

                $dataCsv[] = $entry;
            }

            // fclose($file);
            // Storage::delete($path);

            // Stocker les données dans la session
            $request->session()->put('dataCsv', $dataCsv);

            // Rediriger vers la vue quizConfirmation avec les données extraites du CSV
            return view('dashboard.quizConfirmation', compact('filenameWithoutExtension'));
        } else {
            return "Impossible d'ouvrir le fichier.";
        }
    }

    return 'Aucun fichier téléchargé.';
}

public function storeData(Request $request)
{
    $dataCsv = $request->session()->get('dataCsv');

    foreach ($dataCsv as $entry) {
        $questionId = DB::table('Question')->insertGetId([
            'Type' => mb_convert_encoding($entry['Type'], 'UTF-8', 'UTF-8'),
            'Content' => mb_convert_encoding($entry['QuestionContent'], 'UTF-8', 'UTF-8'),
            'Description' => mb_convert_encoding($entry['Description'], 'UTF-8', 'UTF-8'),
        ]);

        $reponses = explode(',', $entry['ReponseContent']);

        foreach ($reponses as $reponse) {
            $answerId = DB::table('Answer')->insertGetId([
                'Content' => trim(mb_convert_encoding($reponse, 'UTF-8', 'UTF-8')),
            ]);

            $isCorrect = $entry['Correct'] === 'Correct' ? true : false;

            DB::table('AnswerQuestion')->insert([
                'AnswerId' => $answerId,
                'QuestionId' => $questionId,
                'isCorrect' => $isCorrect,
            ]);
        }

        DB::table('QuestionQuiz')->insert([
            'QuestionId' => $questionId,
            'QuizId' => 1, // ID du premier Quiz existant ou utilisez l'ID 1 par défaut
        ]);
    }

    return redirect()->route('dashboardManagement')->with('success', 'Données insérées avec succès dans la base de données.');
}


    public function showParsedCsv()
    {
        $dataCsv = []; // Assurez-vous que $dataCsv est disponible avec les données du CSV ici

        return view('dashboard.quizConfirmation', compact('dataCsv'));
    }

    public function showQuizWithQuestionsAndAnswers($quizId)
    {
        $quiz = Quiz::with('questions.answers')->find($quizId);

        return view('quiz.show', compact('quiz'));
    }
    public function updateQuestion(Request $request, $questionId)
    {
        $question = Question::find($questionId);
        $question->Content = $request->input('content');
        $question->save();

        return redirect()->back();
    }

    public function updateAnswer(Request $request, $answerId)
    {
        $answer = Answer::find($answerId);
        $answer->Content = $request->input('content');
        $answer->save();

        return redirect()->back();
    }
}