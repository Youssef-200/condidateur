<?php

session_start();

if(!$_SESSION['mdp']){
    header("Location: authen.php");
}

require_once("connect.php");

require_once("functions..php");

require_once("configue.php");

$inscrit3 = $bdd->prepare("SELECT * FROM etud3a");

$inscrit3->execute();

$etud3a = $inscrit3->fetchAll();

$inscrit4 = $bdd->prepare("SELECT * FROM etud4a");

$inscrit4->execute();

$etud4a = $inscrit4->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | concours</title>
</head>
<style>
    table ,tr ,td{ 
        border: 1px solid black;
    }
</style>
<body>
        <h1>Listes des Inscription .</h1>
        <table>
            <tr>
                <th> 3eme année :</th>
            </tr>
            <tr>
                <td> nom </td>
                <td>prenom </td>
            </tr>
            <?php
            
            for($i=0;$i < count($etud3a) ;$i++){
                echo "
                
                <tr>
                    <td>".$etud3a[$i]['nom'], "</td>
                    <td>".$etud3a[$i]['prenom'];" </td>
                 </tr><br>
                
                ";
            }

            ?>
        </table>

        <table>
            <tr>
                <th> 4eme année :</th>
            </tr>
            <tr>
                <td> nom </td>
                <td> prenom </td>
            </tr>
            <?php
            
            for($i=0;$i < count($etud4a) ;$i++){
                echo "
                
                <tr>
                    <td>".$etud4a[$i]['nom'], "</td>
                    <td>".$etud4a[$i]['prenom'];" </td>
                 </tr><br>
                
                ";
            }

            ?>
        </table>
</body>
</html>