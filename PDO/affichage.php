<?php
require "AccessBdd.php";

function afficheVisiteur()
{

    $connexion = openDb();
    $sqlRequest = "SELECT * FROM visiteur;";
    $result = mysqli_query($connexion, $sqlRequest);
    $res = array();
    $i = 0;
    while($data = mysqli_fetch_row($result)) {

        $res[$i]['Id'] = $data[0];
        $res[$i]['Nom'] = $data[3];
        $res[$i]['Prenom'] = $data[4];
        $res[$i]['Adresse'] = $data[5];
        $res[$i]['Mail'] = $data[6];
        $res[$i]['Secteur'] = $data[7];
        $res[$i]['Departement'] = $data[8];
        $i++;
    }
    closeDb($connexion);
    return $res;
}


function afficheMedicament()
{

    $connexion = openDb();
    $sqlRequest = "SELECT * FROM medicament;";
    $result = mysqli_query($connexion, $sqlRequest);
    $res = array();
    $i = 0;
    while($data = mysqli_fetch_row($result)) {

    $res[$i]['Id'] = $data[0];
    $res[$i]['Depot_legal'] = $data[1];
    $res[$i]['Nom'] = $data[2];
    $res[$i]['Composition'] = $data[3];
    $res[$i]['Effets'] = $data[4];
    $res[$i]['Contre_indication'] = $data[5];
    $res[$i]['Prix_echantillion'] = $data[6];
    $res[$i]['Famille'] = $data[7];
    $i++;
}
    closeDb($connexion);
    return $res;
}

function affichePraticiens()
{

    $connexion = openDb();
    $sqlRequest = "SELECT * FROM praticien;";
    $result = mysqli_query($connexion, $sqlRequest);
    $res = array();
    $i = 0;
    while($data = mysqli_fetch_row($result)) {

        $res[$i]['Id'] = $data[0];
        $res[$i]['Nom'] = $data[1];
        $res[$i]['Prenom'] = $data[2];
        $res[$i]['Adresse'] = $data[3];
        $res[$i]['Coefficient'] = $data[4];
        $res[$i]['Sepcialite'] = $data[5];
        $i++;

    }
    closeDb($connexion);
    return $res;
}


function afficheCompterendu($id)
{

    $connexion = openDb();
    $sqlRequest = "SELECT * FROM rapport_visit WHERE id_Visiteur = '".$id."';";
    $result = mysqli_query($connexion, $sqlRequest);
    $res = array();
    $i = 0;
    while($data = mysqli_fetch_row($result)) {

        $res[$i]['Id'] = $data[0];
        $res[$i]['Date_visite'] = $data[1];
        $res[$i]['Praticien'] = $data[2];
        $res[$i]['Coefficient'] = $data[3];
        $res[$i]['Remplacant'] = $data[4];
        $res[$i]['Date_rap'] = $data[5];
        $res[$i]['Motif'] = $data[6];
        $res[$i]['Bilan'] = $data[7];
        $res[$i]['Premier_produit'] = $data[8];
        $res[$i]['Deuxieme_produit'] = $data[9];
        $res[$i]['Documentation'] = $data[10];
        $res[$i]['Echantillions'] = $data[11];
        $res[$i]['Quantite_echantillion'] = $data[12];
        $i++;

    }
    closeDb($connexion);
    return $res;
}


function afficheCompterenduDetail($id){
    $connexion = openDb();
    $sqlRequest ="SELECT * FROM rapport_visit WHERE id = '".$id."';";
    $result = mysqli_fetch_row(mysqli_query($connexion, $sqlRequest));
    $res = array();
    $res['Id'] = $result[0];
    $res['Date_visite'] = $result[1];
    $res['Praticien'] = $result[2];
    $res['Coefficient'] = $result[3];
    $res['Remplacant'] = $result[4];
    $res['Date_rap'] = $result[5];
    $res['Motif'] = $result[6];
    $res['Bilan'] = $result[7];
    $res['Premier_produit'] = $result[8];
    $res['Deuxieme_produit'] = $result[9];
    $res['Documentation'] = $result[10];
    $res['Echantillions'] = $result[11];
    $res['Quantite_echantillion'] = $result[12];
    closeDb($connexion);
    return $res;
}
