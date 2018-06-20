<?php
require 'PDO/connexion.php';

$message = '';

if (isset($_POST['Connexion']) && $_POST['Connexion'] == 'Connexion') {
    $Name = $_POST['identifiant'];
    $Mdp = $_POST['password'];
    $options = [
        'cost' => 12,
    ];
    $_mdpHash = password_hash($Mdp, PASSWORD_BCRYPT, $options);
    $verif = array();
    $verif = connectUser($Name, $_mdpHash);

    if ($verif['Bool'] == true) {

        session_start();

        $_SESSION['Utilisateur'] = $verif['Utilisateur'];
        $_SESSION['Nom'] = $verif['Nom'];
        $_SESSION['Prenom'] = $verif['Prenom'];
        $_SESSION['Id'] = $verif['Id'];


        header('Location: http://localhost:8888/CompteRendu/menu.php');
    } else {

        $message = '<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
                      <div class="modal-dialog " role="document">
                        <div class="modal-body alert alert-danger">
                          <button type="button" class="close" data-dismiss="modal" rel="modal:close" aria-label="Close">
                            <span aria-hidden="true" onclick="">&times;</span>
                          </button>
                          <p>L\'identifiant ou le mot de passe est incorrecte !<br/> Veuillez réessayer.</p>
                        </div>
                      </div>
                     </div>';
    }
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#exampleModal').modal('show');
            $(".close").modal('hide');
        });
    </script>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <div class="error">
            <?php echo $message; ?>
        </div>
        <form name="Connexion" method="post" class="login-form">
            <a href="index.php"><img class="logo" src="img/logo.png" alt="GSB"></img></a>
            <h3 class="title">Gestion Comptes-Rendus</h3>
            <div class="form-group">
                <input name="identifiant" type="text" class="form-control" id="form-connect" placeholder="Utilisateur"
                       required="">
            </div>
            <div class="form-group">
                <input name="password" type="password" class="form-control" id="form-connect" placeholder="Mot de passe"
                       required="">
            </div>
            <a class="mdp-missing" data-toggle="modal" data-target="#Modalmdp" href="">Mot de passe oublié ?</a></br>
            <button id="connect" type="submit" class="btn btn-primary" name="Connexion" value="Connexion">Connexion
            </button>
        </form>
    </div>
</div>
<div class="modal fade" id="Modalmdp" tabindex="-1" role="dialog" aria-labelledby="Modalmdp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Mot de passe oublié</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <p>Veuillez entrer une adresse e-mail valide pour recevoir votre nouveau mot de passe.</p>
                        <input type="text" class="form-control" aria-describedby="Adresse e-mail"
                               placeholder="Adresse e-mail" required="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="plugins/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>