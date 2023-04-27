<?php

session_start();

if(!$_SESSION['mdp']){
    header("Location: authen.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>administration |</title>
</head>
<body>
    <h4>Bonjours Admin , Nous sommes le <?php echo $dat_current = date("d/M/Y"); ?></h4><br>
    <h1>Bienvenu dans votre page d'administration</h1> <br>
    <div >
        <a href="lister.php" style="margin-right: 10%;">Liste des inscriptions</a> 
        <a href="ajout_client.html" style="margin-right: 10%;">Ajouter un client</a>    
        <a href="listes_client.php" style="margin-right: 10%;">Lister clients</a>
    </div>
</body>
</html>