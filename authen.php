<?php

session_start();

$_SESSION['mdp'] = false;

require_once("connect.php");

require_once("functions..php");

require_once("configue.php");

if(isset($envoyer)){

    if(!empty($email) and !empty($mdps) and !empty($statut)){

        if($statut == "Utilisateur"){

            verif_user($bdd,$email,$mdps);

        }else{

            verif_admin($bdd,$email,$mdps);

        }

    }else{

        echo 'veulliez replire toutes les champs ...!';

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | concours</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Bienvenu dans la page de connexion .</h1>
        <table>
            <tr>
                <td> vous ètes:</td>
                <td>
                    <select name="statut" >
                        <option value="Utilisateur">Utilisateur</option>
                        <option value="Admin">Admin</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td> email :</td>
                <td> <input type="email" name="email" value="<?= @$_POST['email']; ?>"/> </td>
            </tr>
            <tr>
                <td> Mot de pass:</td>
                <td> <input type="password" name="mdps" value="<?= @$_POST['mdps']; ?>"/> </td>
            </tr>

        </table>

        <input type="submit" name="submit" value="Se connecter" />
    </form>
</body>
</html>