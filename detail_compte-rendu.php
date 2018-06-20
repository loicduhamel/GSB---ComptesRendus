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
        <div class="white-zone2">
            <h1 class="title-page">Détails du compte-rendu</h1>
            <div class="table-responsive">
                <table class="table table-striped">
                    <?php
                    $data = afficheCompterenduDetail($_GET['param1']);
                    ?>
                    <tr>
                        <th>Date</br>d'ajout</th>
                        <td><?php echo $data['Date_rap'] ?></td>
                    </tr>
                    <tr>
                        <th>Date de</br> la visite</th>
                        <td><?php echo $data['Date_visite'] ?></td>
                    </tr>
                    <tr>
                        <th>Motif</th>
                        <td><?php echo $data['Motif'] ?></td>
                    </tr>
                    <tr>
                        <th>Praticien</th>
                        <td><?php echo $data['Praticien'] ?></td>
                    </tr>
                    <tr>
                        <th>Remplaçant</th>
                        <td><?php
                            if ($data['Remplacant'] == 0) {
                                echo "Non";
                            }
                            else if ($data['Remplacant'] = 1) {
                                echo "Oui";
                            } ?></td>
                    </tr>
                    <tr>
                        <th>Coefficient</br> de confiance</th>
                        <td><?php echo $data['Coefficient'] ?></td>
                    </tr>
                    <tr>
                        <th>Bilan</th>
                        <td><?php echo $data['Bilan'] ?></td>
                    </tr>
                    <tr>
                        <th>Médicament(s)</br> présenté(s)</th>
                        <td><?php echo $data['Premier_produit'] ?>
                            <?php echo " " . $data['Deuxieme_produit'] ?></td>
                    </tr>
                    <tr>
                        <th>Documentation</br> fournie</th>
                        <td>
                            <?php
                            if ($data['Documentation'] == 0) {
                                echo "Non";
                            }
                            else if ($data['Documentation'] = 1) {
                                echo "Oui";
                            } ?></td>
                    </tr>
                    <tr>
                        <th>Échantillon(s)</br> offert(s)</th>
                        <td><?php echo $data['Echantillions']." : ".$data['Quantite_echantillion'] ?></td>
                    </tr>
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