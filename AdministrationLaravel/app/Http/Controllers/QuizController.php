<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;
use App\Models\Quiz; 


class QuizController extends Controller
{
   
    // public function GetCsv(Request $request)
    // {
    //     if ($request->hasFile('csv_file')) {
    //         $file = $request->file('csv_file');
    
    //         $path = $file->storeAs('csv_file', $file->getClientOriginalName());
    
    //         $filenameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    
    //         $file = fopen(storage_path('app/' . $path), "r");
    
    //         if ($file) {
    //             fgetcsv($file, 0, ';'); // Sautez la première ligne (ligne d'en-tête)
    
    //             while (($row = fgetcsv($file, 0, ';')) !== false) {
    //                 $row = array_map('trim', $row);
    
    //                 Quiz::create([
    //                     'nom_du_quiz' => $filenameWithoutExtension,
    //                     'question' => mb_convert_encoding($row[0], 'UTF-8', 'auto'),
    //                     'bonnes_reponses' => mb_convert_encoding($row[1], 'UTF-8', 'auto'),
    //                     'mauvaises_reponses' => mb_convert_encoding($row[2], 'UTF-8', 'auto'),
    //                     'tags' => mb_convert_encoding($row[3], 'UTF-8', 'auto'),
    //                 ]);
    //             }
    
    //             fclose($file);
    //             Storage::delete($path);
    
    //             // Redirigez l'utilisateur vers une autre page après traitement
    //             return view('dashboard/quizConfirmation', compact('filenameWithoutExtension'));
    //         } else {
    //             return "Impossible d'ouvrir le fichier.";
    //         }
    //     }
    
    //     return 'Aucun fichier téléchargé.';
    // }
    public function GetCsv(Request $request)
{
    // Vérifiez si un fichier a été téléchargé
    if ($request->hasFile('csv_file')) {
        $file = $request->file('csv_file');

        $path = $file->storeAs('csv_file', $file->getClientOriginalName());

        // Récupérez le nom du fichier sans l'extension
        $filenameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $file = fopen(storage_path('app/' . $path), "r");

        if ($file) {
            $dataCsv = array();

            // Sautez la première ligne (ligne d'en-tête)
            fgetcsv($file, 0, ';');

            while (($row = fgetcsv($file, 0, ';')) !== false) {
                $entry = array(
                    'Question' => $row[0],
                    'Bonne réponse' => $row[1],
                    'Mauvaise réponse' => $row[2],
                    'Tags' => $row[3]
                );

                $dataCsv[] = $entry;

            
            }

            fclose($file);

            Storage::delete($path);

            $test = "Test de la fonction";
            // Redirigez l'utilisateur vers une autre page après traitement
            // Avec le tableau associatif avec les données et le nom du fichier sans l'extension
            return view('dashboard/quizConfirmation', compact('dataCsv', 'filenameWithoutExtension'));
        } else {
            echo "Impossible d'ouvrir le fichier.";
        }

        return 'Fichier téléchargé avec succès!';
    }

    return 'Aucun fichier téléchargé.';
}

}
