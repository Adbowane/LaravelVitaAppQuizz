<?php

namespace App\Http\Controllers;

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

            while (($row = fgetcsv($file, 0, ';')) !== false) {
                $row = array_map('trim', $row);

                // Insérer les données dans la table Question
                $questionId = DB::table('Question')->insertGetId([
                    'Type' => mb_convert_encoding($row[2], 'UTF-8', 'auto'),
                    'Content' => mb_convert_encoding($row[3], 'UTF-8', 'auto'),
                    'Description' => mb_convert_encoding($row[1], 'UTF-8', 'auto'),
                ]);

                // Séparer les réponses par virgule
                $reponses = explode(',', $row[4]);

                foreach ($reponses as $reponse) {
                    // Insérer les données dans la table Answer
                    $answerId = DB::table('Answer')->insertGetId([
                        'Content' => mb_convert_encoding(trim($reponse), 'UTF-8', 'auto'),
                    ]);

                    // Convertir la réponse correcte en booléen
                    $isCorrect = strtolower($row[5]) === 'true' ? true : false;

                    // Insérer les données dans la table AnswerQuestion
                    DB::table('AnswerQuestion')->insert([
                        'AnswerId' => $answerId,
                        'QuestionId' => $questionId,
                        'isCorrect' => $isCorrect,
                    ]);
                }

                // Insérer les données dans la table QuestionQuiz
                DB::table('QuestionQuiz')->insert([
                    'QuestionId' => $questionId,
                    'QuizId' => 1, // ID du premier Quiz existant ou utilisez l'ID 1 par défaut
                ]);

                $entry = array(
                    'Question' => $row[0],
                    'Description' => $row[1],
                    'Type' => $row[2],
                    'QuestionContent' => $row[3], // Correspond à la nouvelle colonne QuestionContent
                    'ReponseContent' => $row[4], // Correspond à la nouvelle colonne ReponseContent
                    'Correct' => $isCorrect ? 'Correct' : 'Incorrect',
                    'Tags' => $row[6],
                );
                
                $dataCsv[] = $entry;
                
            }
            fclose($file);
            Storage::delete($path);

            // Redirigez l'utilisateur vers une autre page après traitement
            return view('dashboard/quizConfirmation', compact('filenameWithoutExtension', 'dataCsv'));
        } else {
            return "Impossible d'ouvrir le fichier.";
        }
    }

    return 'Aucun fichier téléchargé.';
}



}