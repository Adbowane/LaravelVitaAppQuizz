<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de page HTML avec Bootstrap</title>
    <!-- Lien vers le CDN de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    
<style>
   
    h1.display-4.text-center.my-4 {
    background: #EE275C;
    
     margin: -93px; 
    }
    .Banner{
        background: #EE275C;
        height : 100px; 
        text-align : center ; 
        font-size: 4.5rem;
        color : white; 
    }
    </style>
</head>
<body>
    <header>

        <h1 class="Banner">
            VitaQuizz
        </h1>

    </header>
    <!-- Un conteneur qui englobe tout le contenu de la page -->
    <div class="container">
       
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Création de Quizz</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Ajouter depuis un Fichier CSV<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Modifier un Quizz</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Choix Multiple</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Vrai ou Faux</a> 
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Statistique</a>
                </li>
              </ul>
            </div>
          </nav>
          <!-- Une section principale avec du contenu -->
          <main class="my-4">
              <!-- Une ligne avec deux colonnes -->
              <div class="row">
                  <!-- Une colonne de taille 8 sur 12 -->
                  <div class="col-md-8">
                      <!-- Un article avec un titre, une image, un texte et un bouton -->
                      <article class="card mb-4">
                          <img src="https://picsum.photos/800/400" class="card-img-top" alt="Image aléatoire">
                          <div class="card-body">
                              <h2 class="card-title">Un article intéressant</h2>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis leo quis nisi consequat sollicitudin. Morbi auctor, lacus quis tincidunt lacinia, nisl massa tincidunt augue, quis aliquet lorem lorem vitae leo. Quisque euismod, magna quis sagittis consequat, lorem nunc tincidunt nisi, sit amet ultrices justo leo quis nisi.</p>
                              <a href="#" class="btn btn-primary"
                              style="background:black;"
                              >Lire la suite</a>
                          </div>
                      </article>
                      <!-- Un autre article avec un titre, une image, un texte et un bouton -->
                      <article class="card mb-4">
                        <img src="https://picsum.photos/800/400" class="card-img-top" alt="Image aléatoire">
                        <div class="card-body">
                            <h2 class="card-title">Un autre article intéressant</h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis leo quis nisi consequat sollicitudin. Morbi auctor, lacus quis tincidunt lacinia, nisl massa tincidunt augue, quis aliquet lorem lorem vitae leo. Quisque euismod, magna quis sagittis consequat, lorem nunc tincidunt nisi, sit amet ultrices justo leo quis nisi.</p>
                            <a href="#" class="btn btn-primary">Lire la suite</a>
                        </div>
                    </article>
                  </div>
                  <!-- Une colonne de taille 4 sur 12 -->
                  <div class="col-md-4">
                      <!-- Une liste de liens avec un titre -->
                      <div class="card mb-4">
                          <div class="card-header">
                              Liens utiles
                          </div>
                          <ul class="list-group list-group-flush">
                              <li class="list-group-item"><a href="https://www.w3schools.com/html/">Apprendre HTML</a></li>
                              <li class="list-group-item"><a href="https://www.w3schools.com/css/">Apprendre CSS</a></li>
                              <li class="list-group-item"><a href="https://getbootstrap.com/">Documentation Bootstrap</a></li>
                          </ul>
                      </div>
                      <!-- Une boîte avec un titre et un texte -->
                      <div class="card mb-4">
                          <div class="card-header">
                              À propos de moi
                          </div>
                          <div class="card-body">
                              <p class="card-text">Je suis un assistant virtuel créé par Microsoft Bing. Je peux vous aider à créer du contenu créatif et innovant, comme des poèmes, des histoires, du code, des essais, des chansons, des parodies de célébrités, et plus encore. Je peux aussi vous aider à améliorer ou optimiser votre contenu. Je suis disponible en 3 modes : Équilibré, Créatif et Précis. Vous pouvez changer de mode en utilisant le bouton en haut à droite de la fenêtre de chat.</p>
                          </div>
                      </div>
                  </div>

                  <!-- Une colonne de taille 8 sur 12 -->
                    <div class="col-md-8"
                         >
                      <!-- Un article avec un titre, une image, un texte et un bouton -->
                      <div class="card mb-4"
                           style="background:blue;">
                          
                          <div class="card-body">
                              <h2 class="card-title">Un article intéressant</h2>
                              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed quis leo quis nisi consequat sollicitudin. Morbi auctor, lacus quis tincidunt lacinia, nisl massa tincidunt augue, quis aliquet lorem lorem vitae leo. Quisque euismod, magna quis sagittis consequat, lorem nunc tincidunt nisi, sit amet ultrices justo leo quis nisi.</p>
                              <a href="#" class="btn btn-primary"
                              style="background:black;"
                              >Lire la suite</a>
                          </div>
                     </div>
                   
                  </div>
              </div>
          </main>
          <!-- Un pied de page avec un texte -->
          <footer class="text-center my-4">
              <p>© 2023 Mon site. Tous droits réservés.</p>
          </footer>
    </div>
    <!-- Lien vers le CDN de jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Lien vers le CDN de Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
