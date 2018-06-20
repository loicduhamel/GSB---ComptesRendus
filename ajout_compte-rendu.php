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
    <script language="javascript">
        function selectionne(pValeur, pSelection, pObjet) {
            //active l'objet pObjet du formulaire si la valeur s�lectionn�e (pSelection) est �gale � la valeur attendue (pValeur)
            if (pSelection == pValeur) {
                formRAPPORT_VISITE.elements[pObjet].disabled = false;
            }
            else {
                formRAPPORT_VISITE.elements[pObjet].disabled = true;
            }
        }
    </script>
    <script language="javascript">
        function ajoutLigne(pNumero) {//ajoute une ligne de produits/qt� � la div "lignes"
            //masque le bouton en cours
            document.getElementById("but" + pNumero).setAttribute("hidden", "true");
            pNumero++;										//incr�mente le num�ro de ligne
            var laDiv = document.getElementById("lignes");	//r�cup�re l'objet DOM qui contient les donn�es
            var titre = document.createElement("label");	//cr�e un label
            laDiv.appendChild(titre);						//l'ajoute � la DIV
            titre.setAttribute("class", "titre");			//d�finit les propri�t�s
            titre.innerHTML = "   Produit : ";
            var liste = document.createElement("select");	//ajoute une liste pour proposer les produits
            laDiv.appendChild(liste);
            liste.setAttribute("name", "PRA_ECH" + pNumero);
            liste.setAttribute("class", "zone");
            //remplit la liste avec les valeurs de la premi�re liste construite en PHP � partir de la base
            liste.innerHTML = formRAPPORT_VISITE.elements["PRA_ECH1"].innerHTML;
            var qte = document.createElement("input");
            laDiv.appendChild(qte);
            qte.setAttribute("name", "PRA_QTE" + pNumero);
            qte.setAttribute("size", "2");
            qte.setAttribute("class", "zone");
            qte.setAttribute("type", "text");
            var bouton = document.createElement("input");
            laDiv.appendChild(bouton);
            //ajoute une gestion �venementielle en faisant �voluer le num�ro de la ligne
            bouton.setAttribute("onClick", "ajoutLigne(" + pNumero + ");");
            bouton.setAttribute("type", "button");
            bouton.setAttribute("value", "+");
            bouton.setAttribute("class", "zone");
            bouton.setAttribute("id", "but" + pNumero);
        }
    </script>
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
                <a class="nav-link" href="compte_rendu.php">Comptes-Rendus</a>
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
    <form  action="insertVisit.php" method="post" name="AjoutVisit">
        <div class="row">
            <div class="white-zone2">
                <h1 class="title-page">Ajout compte-rendu de visite</h1>
                <div class="form-group form-group_ajout">
                    <div id="date-visite">
                        <p>Date de la visite :</p>
                        <input id="date2" name="date" type="date" class="form-control" required="" placeholder="">
                    <select class="motif" name="motif" size="1">
                        <option value="" selected>Motif</option>
                        <option value="Périodicité">Périodicité</option>
                        <option value="Actualisation">Actualisation</option>
                        <option value="Relance">Relance</option>
                        <option value="Sollicitation praticien">Sollicitation praticien</option>
                        <option value="Autre">Autre</option>
                    </select>

                    <select class="praticien" name="praticien" size="1">

                        <option value="" selected>Praticiens</option>
                        <?php
                        $data = affichePraticiens();
                        foreach ($data as $tab){
                            ?>
                        <option><?php echo $tab['Nom']." ".$tab['Prenom'] ?></option>
                        <?php } ?>

                    </select>
                    <div class="form-check">
                        <input type="checkbox" name="remplacant" class="form-check-input" id="exampleCheck1" value="remplacant">
                        <label class="form-check-label" for="exampleCheck1">Remplaçant</label>
                    </div>
                    <input type="text" class="form-control form_ajout" name="Coefficient" aria-describedby="Coefficient"
                           placeholder="Coefficient de confiance">
                    <textarea class="form-control" rows="5" name="Idee_generale" id="comment">Bilan</textarea>
                    <p>Médicament(s) présenté(s) :</p>
                    <select class="produit1" name="produit1" size="1">
                        <option value="" selected>Produit 1</option>
                        <?php
                        $data = afficheMedicament();
                        foreach ($data as $tab){
                        ?>
                        <option><?php echo $tab['Nom'] ?></option>
                        <?php } ?>
                    </select>
                    <select class="produit1" name="produit2" size="1">
                        <option value="" SELECTED>Produit 2</option>
                        <?php
                        $data = afficheMedicament();
                        foreach ($data as $tab){
                            ?>
                            <option><?php echo $tab['Nom'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="form-check">
                        <input type="checkbox" name="doc" class="form-check-input" id="exampleCheck1" value="doc">
                        <label class="form-check-label" for="exampleCheck1">Documentation fournie</label>
                    </div>
                    <p>Échantillon(s) offert(s) :</p>
                    <form name="formRAPPORT_VISITE" method="post" action="recupRAPPORT_VISITE.php">
                        <div class="titre" id="lignes">
                            <label class="titre">Produit : </label>
                            <select name="PRA_ECH1" class="zone">
                                <option value="" SELECTED>Produit</option>
                                <?php
                                $data = afficheMedicament();
                                foreach ($data as $tab){
                                    ?>
                                    <option><?php echo $tab['Nom'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" name="PRA_QTE1" size="2" class="zone"/>
                            <input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone"/>
                        </div>
                    </form>
                    <button type="submit" name="AjoutVisit" class="btn btn-primary">Valider</button>

                </div>
            </div>
        </div>
    </form>
</div>
<script defer src="js/fontawesome/svg-with-js/js/fontawesome-all.js"></script>
<script type="text/javascript" src="plugins/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>