<?php
require 'pdo/affichage.php';

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
      <div class="container">
         <div class="row">
            <div class="white-zone3">
               <h1 class="title-page">Médicaments</h1>
               </br>
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Dépôt légal</th>
                           <th scope="col">Nom commercial</th>
                           <th scope="col">Famille</th>
                           <th scope="col">Composition</th>
                           <th scope="col">Effets</th>
                           <th scope="col">Contre-indication</th>
                           <th scope="col">Prix échantillion</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php
                     $data = afficheMedicament();
                     foreach ($data as $tab){

                     ?>
                     <tr>
                         <td><?php echo $tab['Depot_legal'] ?></td>
                         <td><?php echo $tab['Nom'] ?></td>
                         <td><?php echo $tab['Famille'] ?></td>
                         <td><?php echo $tab['Composition'] ?></td>
                         <td><?php echo $tab['Effets'] ?></td>
                         <td><?php echo $tab['Contre_indication'] ?></td>
                         <td><?php echo $tab['Prix_echantillion'] ?></td>
                     </tr>
                     <?php } ?>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <script type="text/javascript" src="plugins/jquery.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   </body>
</html>