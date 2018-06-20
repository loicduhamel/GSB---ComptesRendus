<?php
session_start();

if (empty($_SESSION)){
    header('Location: http://localhost:8888/CompteRendu/');
}

?>
<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <title>GSB - Gestion Compte Rendus</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="img/favicon.ico">
      <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
   </head>
   <body>
      <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
         <a class="navbar-brand" href="menu.php">
         <img class="logo-nav" src="img/logo.png" alt="GSB">
         </a>
         <p class="app-frais">Gestion Compte Rendus</p>
         <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
         <span> </span>
         <span> </span>
         <span> </span>
         </button>
         <div class="collapse navbar-collapse" id="collapsingNavbar">
            <ul class="navbar-nav">
               <li class="nav-item active">
                  <a class="nav-link" href="menu.php">Menu <span class="sr-only">(current)</span></a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="compte-rendu.php">Comptes-Rendus</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="visiteur.php">Visiteurs</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="praticien.php">Praticiens</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="medicament.php">Médicaments</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['Prenom'].' '.$_SESSION['Nom'] ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                     <a class="dropdown-item" href="PDO/deconnexion.php">Déconnexion</a>
                  </div>
               </li>
            </ul>
         </div>
      </nav>
      <div class="container container_menu">
         <div class="row row_menu">
            <div class="card card_menu">
               <a class="a_menu" href="compte-rendu.php"><img class="card-img-top" src="img/compte_rendu.png" alt="Card image cap"></a>
               <div class="card-body">
                  <h5 class="card-title">Comptes-Rendus</h5>
                  <p class="card-text">Saisie et parcours des rapports de visite</p>
                  <a href="compte-rendu.php" class="btn btn-primary">Accéder</a>
               </div>
            </div>
            <div class="card card_menu">
               <a class="a_menu" href="visiteur.php"><img class="card-img-top" src="img/visiteurs.png" alt="Card image cap"></a>
               <div class="card-body">
                  <h5 class="card-title">Visiteurs</h5>
                  <p class="card-text">Recherche des coordonnées de vos collègues</p>
                  <a href="visiteur.php" class="btn btn-primary">Accéder</a>
               </div>
            </div>
         </div>
         <div class="row row_menu">
            <div class="card card_menu">
               <a class="a_menu" href="praticien.php"><img class="card-img-top" src="img/praticiens.png" alt="Card image cap"></a>
               <div class="card-body">
                  <h5 class="card-title">Praticiens</h5>
                  <p class="card-text">Recherche des coordonnées des praticiens</p>
                  <a href="praticien.php" class="btn btn-primary">Accéder</a>
               </div>
            </div>
            <div class="card card_menu">
               <a  class="a_menu" href="medicament.php"><img class="card-img-top" src="img/medicaments.png" alt="Card image cap"></a>
               <div class="card-body">
                  <h5 class="card-title">Médicaments</h5>
                  <p class="card-text">Base de documentation sur les produits du laboratoire</p>
                  <a href="medicament.php" class="btn btn-primary">Accéder</a>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="plugins/jquery.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   </body>
</html>