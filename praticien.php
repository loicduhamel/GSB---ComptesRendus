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
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <h1 class="title-page">Praticiens</h1>
            </br>
            <form class="form_departement">
                  <select name="departement" size="1" placeholder="Departement" id="departement">
                     <option>Tous les départements</option>
                  </select>
               </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Coefficient de confiance</th>
                        <th scope="col">Spécialité</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $data = affichePraticiens();
                    foreach ($data as $tab){
                    ?>
                    <tr>
                        <td><?php echo $tab['Nom'] ?></td>
                        <td><?php echo $tab['Prenom'] ?></td>
                        <td><?php echo $tab['Adresse'] ?></td>
                        <td><?php echo $tab['Coefficient'] ?></td>
                        <td><?php echo $tab['Sepcialite'] ?></td>
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