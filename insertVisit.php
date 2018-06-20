<?php
session_start();

if(!empty($_POST['remplacant'])){
    $Remplacant = 1;
    }else{
    $Remplacant = 0;
    }

if(!empty($_POST['doc'])){
    $Doc = 1;
    }else{
    $Doc = 0;
    }

if (isset($_POST['AjoutVisit'])) {
    $date = htmlspecialchars($_POST ['date']);
    $motif = htmlspecialchars($_POST ['motif']);
    $praticien = htmlspecialchars($_POST ['praticien']);
    $remplacant = $Remplacant;
    $Coefficient = htmlspecialchars($_POST ['Coefficient']);
    $Idee_generale = htmlspecialchars($_POST ['Idee_generale']);
    $produit1 = htmlspecialchars($_POST['produit1']);
    $produit2 = htmlspecialchars($_POST['produit2']);
    $doc = $Doc;
    $PRA_ECH1 = htmlspecialchars($_POST['PRA_ECH1']);
    $PRA_QTE1 = htmlspecialchars($_POST['PRA_QTE1']);
    $id_Visiteur = htmlspecialchars($_SESSION['Id']);


    $bdd = new PDO('mysql:host=localhost;dbname=compte_rendu;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ins = "INSERT INTO `rapport_visit` (date_visite, practicien, coefficient, remplacant, date_rap, motif, bilan, premier_produit_presente, deuxieme_produit_presente, documentation_offerte, echantillons, quantite_echantillon, id_Visiteur) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?)";
    $insere = $bdd->prepare($ins);
//remplace les ? par des valeurs
    $insere->bindparam(1, $date, PDO::PARAM_STR);
    $insere->bindparam(2, $praticien, PDO::PARAM_STR);
    $insere->bindparam(3, $Coefficient, PDO::PARAM_STR);
    $insere->bindparam(4, $remplacant, PDO::PARAM_STR);
    $insere->bindParam(5, $motif, PDO::PARAM_STR);
    $insere->bindParam(6, $Idee_generale, PDO::PARAM_STR);
    $insere->bindParam(7, $produit1, PDO::PARAM_STR);
    $insere->bindParam(8, $produit2, PDO::PARAM_STR);
    $insere->bindParam(9, $doc, PDO::PARAM_STR);
    $insere->bindparam(10, $PRA_ECH1, PDO::PARAM_STR);
    $insere->bindParam(11, $PRA_QTE1, PDO::PARAM_STR);
    $insere->bindParam(12, $id_Visiteur, PDO::PARAM_STR);


    $insere->execute();

    header("Location:compte-rendu.php");

}