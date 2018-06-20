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
      <link href="css/style.css" rel="stylesheet" type="text/css">
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
            <div class="white-zone2">
               <h1 class="title-page">Comptes-rendus de visite</h1>
               <a class="compte_rendu" href="ajout_compte-rendu.php">
                  <p>Ajouter un compte-rendu</p>
               </a>
               <div class="info">
                  <input id="date" type="date" class="form-control" required="" placeholder="">
               </div>
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead>
                        <tr>
                           <th scope="col">Date d'ajout</th>
                           <th scope="col">Motif</th>
                           <th scope="col">Praticien</th>
                           <th scope="col"></th>
                        </tr>
                     </thead>
                     <tbody>

                     <?php
                     $data = afficheCompterendu($_SESSION['Id']);
                     foreach ($data as $tab){
                         ?>
                         <tr>
                             <td><?php echo $tab['Date_rap'] ?></td>
                             <td><?php echo $tab['Motif'] ?></td>
                             <td><?php echo $tab['Praticien'] ?></td>
                             <td>
                                 <a class="icon1" href="detail_compte-rendu.php?param1=<?php echo $tab['Id'] ?>" title="Consulter"><i class="fas fa-eye"></i></a>
                             </td>
                         </tr>
                     <?php } ?>

                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <script defer src="js/fontawesome/svg-with-js/js/fontawesome-all.js"></script>
      <script type="text/javascript" src="plugins/jquery.min.js"></script>
      <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
   </body>
</html>