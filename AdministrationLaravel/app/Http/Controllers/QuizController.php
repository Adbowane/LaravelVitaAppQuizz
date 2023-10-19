<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class QuizController extends Controller
{
    //
    public function GetCsv(Request $request)
{
    // Vérifiez si un fichier a été téléchargé
    if ($request->hasFile('csv_file')) {
        $file = $request->file('csv_file');

        $path = $file->storeAs('csv_file', $file->getClientOriginalName());

        $file = fopen(storage_path('app/' . $path), "r");

        if ($file) {
            $dataCsv = array();

            while (($row = fgetcsv($file)) !== false) {
                $entry = array(
                    'question' => $row[0],
                    'bonnes_reponses' => isset($row[1]) ? explode(',', $row[1]) : [],
                    'mauvaises_reponses' => isset($row[2]) ? explode(',', $row[2]) : [],
                    'tags' => isset($row[3]) ? explode(',', $row[3]) : []
                );

                $dataCsv[] = $entry;
            }

            fclose($file);

            Storage::delete($path);

            $test = "Test de la fonction";
            // Redirigez l'utilisateur vers une autre page après traitement
            // Avec le tableau associatif avec les données
            return view('dashboard/quizConfirmation', compact('dataCsv'));
        } else {
            echo "Impossible d'ouvrir le fichier.";
        }

        return 'Fichier téléchargé avec succès!';
    }

    return 'Aucun fichier téléchargé.';
}


}
