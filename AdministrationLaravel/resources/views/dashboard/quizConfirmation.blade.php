<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Réinitialisation des styles par défaut du navigateur */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styles pour le corps de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
}

/* Styles pour la section principale */
main {
    text-align: center;
    padding: 20px;
}

/* Styles pour le conteneur de données du fichier CSV */
.container {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Styles pour le titre */
h1 {
    font-size: 24px;
    margin-bottom: 20px;
}

/* Styles pour le tableau de données */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Styles pour l'en-tête du tableau */
thead {
    background-color: #007bff;
    color: #fff;
}

/* Styles pour les cellules du tableau */
th, td {
    padding: 10px;
    border: 1px solid #ccc;
}

/* Styles pour les cellules d'en-tête */
th {
    font-weight: bold;
}

/* Styles pour les lignes impaires du tableau */
tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
}

/* Styles pour les liens (si besoin) */
a {
    color: #007bff;
    text-decoration: none;
}

/* Styles pour les liens au survol (si besoin) */
a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <main>
        <div class="container">
            <h1>Nom du Quiz : {{ $filenameWithoutExtension }}</h1>
        
            @if(isset($dataCsv))
            <table>
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Bonnes Réponses</th>
                        <th>Mauvaises Réponses</th>
                        <th>Tags</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dataCsv as $entry)
                    <tr>
                        <td>{{ $entry['Question'] }}</td>
                        <td>{{ implode(', ', explode(';', $entry['Bonne réponse'])) }}</td>
                        <td>{{ implode(', ', explode(';', $entry['Mauvaise réponse'])) }}</td>
                        <td>{{ implode(', ', explode(';', $entry['Tags'])) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </main>
        
</body>
</html>