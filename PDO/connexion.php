<?php
require 'configPDO.php';


function connectUser($login,$mdp){
    $connexion = mysqli_connect("localhost", "root","root","compte_rendu");
    $sqlRequest = "SELECT * FROM visiteur WHERE utilisateur = '".$login."'";
    $result = mysqli_query($connexion, $sqlRequest);
    $data = mysqli_fetch_row($result);
    $_mdp = $data[2];

    $dataR = array();
    $dataR['Bool'] = password_verify($_mdp, $mdp);
    $dataR['Utilisateur'] = $data[1];
    $dataR['Id'] = $data[0];
    $dataR['Nom'] = $data[3];
    $dataR['Prenom'] = $data[4];
    $dataR['mail'] = $data[5];

    mysqli_free_result($result);
    mysqli_close($connexion);
    return $dataR;

}

?>