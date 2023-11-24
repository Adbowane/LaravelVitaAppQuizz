<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Reset des styles par défaut du navigateur */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Styles pour le corps de la page */
body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

/* Styles pour la section principale */
main {
    text-align: center;
    padding: 20px;
}

/* Styles pour le conteneur du formulaire */
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

/* Styles pour le formulaire et ses éléments */
form {
    text-align: left;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Styles pour le bouton */
.btn-primary {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

/* Styles pour le bouton au survol */
.btn-primary:hover {
    background-color: #0056b3;
}

    </style>
</head><body>
    <main>
        <div class="container">
            <h1>Créer un quiz</h1>
        
            <form action="{{ route('quiz.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
        
                <div class="form-group">
                    <label for="csv_file">Sélectionnez un fichier CSV :</label>
                    <input type="file" name="csv_file" id="csv_file" accept=".csv">
                </div>
        
                <button type="submit" class="btn btn-primary">Télécharger le fichier CSV</button>
            </form>

            
        </div>
    </main>
</body>

</html>

@if(session('success'))
    <script>
        // Affichage de la pop-up avec un message de succès
        alert('Données insérées avec succès dans la base de données.');
    </script>
@endif