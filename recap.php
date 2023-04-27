<?php

session_start();

if(!$_SESSION['mdp']){
    header("Location: authen.php");
}

require_once("connect.php");

require_once("functions..php");

require_once("configue.php");

$inscrit3 = $bdd->prepare("SELECT * FROM etud3a where cle = ? ");

$inscrit3->execute(array($_SESSION['cle']));

$inscrit4 = $bdd->prepare("SELECT * FROM etud4a where cle = ? ");

$inscrit4->execute(array($_SESSION['cle']));

$etud3a = ($inscrit3) ? $inscrit3->fetchAll() : $inscrit4->fetchAll();

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
    input{
        width: 97%;
    }
</style>
<body>
        <table>
           <!-- <tr>
                <th> Informations Personnelles :</th>
            </tr>
            <tr>
                <td> NOM </td>
                <td> Prenom </td>
                <td> Email </td>
                <td> Date de naissance </td>
                <td> Diplome </td>
                <td> Niveau </td>
                <td> Etablissement </td>
            </tr>-->
            <?php
            
            for($i=0;$i < count($etud3a) ;$i++){
               /* echo "
                
                <tr>
                    <td>".$etud3a[$i]['nom'], "</td>
                    <td>".$etud3a[$i]['prenom']," </td>
                    <td>".$etud3a[$i]['email'], "</td>
                    <td>".$etud3a[$i]['date_naiss']," </td>
                    <td>".$etud3a[$i]['diplome'], "</td>
                    <td>".$etud3a[$i]['niveau']," </td>
                    <td>".$etud3a[$i]['etablissement']; "</td>
                 </tr><br>
                
                ";*/
                ?>

        </table>

        <embed src="./etud3a/<?php echo $etud3a[$i]['photo']; ?>" style="width: 150px;height: 250px;">

        <br>

        <a href="./etud3a/<?= $etud3a[$i]['cv']; ?>">cv</a>
       
        <form method="POST" action="" enctype="multipart/form-data">
        
        <h1>Bienvenu <?php echo $etud3a[$i]['nom']; ?></h1>
        
        <table>
        
            <tr>
                <td> nom:</td>
                <td> <input type="text" disabled style="color:brown;" name="nom" value="<?= $etud3a[$i]['nom']; ?>"/> </td>
            </tr>
            <tr>
                <td> prénom:</td>
                <td> <input type="text" disabled style="color:brown;"  name="prenom" value="<?= $etud3a[$i]['prenom']; ?>"/> </td>
            </tr>
            <tr>
                <td> email :</td>
                <td> <input type="email" disabled style="color:brown;"  name="email" value="<?= $etud3a[$i]['email']; ?>"/> </td>
            </tr>
            <tr>
                <td> naissance :</td>
                <td> <input type="date" disabled style="color:brown;"  name="naissance" value="<?= @$etud3a[$i]['date_naiss']; ?>"/> </td>
            </tr>
            <tr>
                <td> diplome :</td>
                <td>
                    <select  name="diplome" value="<?= @$etud3a[$i]['diplome']; ?>">
                        <option value="Bac+3">Bac+3</option>
                        <option value="Bac+4">Bac+4</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td> niveau :</td>
                <td>
                    <select name="niveau" value="<?= @$etud3a[$i]['niveau']; ?>">
                        <option value="3eme">3eme</option>
                        <option value="4eme">4eme</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td> etablissement :</td>
                <td> <input type="text" name="etablissement" value="<?= @$etud3a[$i]['etablissement']; ?>"/> </td>
            </tr>
            <tr>
                <td> photo :</td>
                <td> <input type="file" accept="image/png, image/jpeg" name="photo" value="<?= @$etud3a[$i]['photo']; ?>"/> </td>
            </tr>
            <tr>
                <td> cv :</td>
                <td> <input type="file" accept="application/pdf" name="cv" value="<?= @$etud3a[$i]['cv']; ?>"/> </td>
            </tr>
            <tr>
                <td> log :</td>
                <td> <input type="text" name="log" value="<?= @$etud3a[$i]['log']; ?>"/> </td>
            </tr>
        </table>
        <button type="submit" name="update">update</button>
        <!--<input type="submit" name="submit" value="inscription" />-->
    </form>

</body>
<?php 

$cle = $etud3a[$i]['cle'];

$photo=$etud3a[$i]['photo'];

$cv=$etud3a[$i]['cv'];

}

if(isset($_POST["update"])){

    if(!empty($diplome) and !empty($niveau) and !empty($log)){

        if($niveau == '3eme'){

            $error=smtpmailer($to,$from, $name ,$subj, $msg);

            updat_infos($bdd,$table="etud3a",$diplome,$niveau,$photo,$cv,$log,$cle);
   
        }elseif($niveau == '4eme'){

            $error=smtpmailer($to,$from, $name ,$subj, $msg);
   
            updat_infos($bdd,$table="etud4a",$diplome,$niveau,$photo,$cv,$log,$cle);
   
        }

        }else{

        echo 'veulliez replire toutes les champs ...!';
        
    }

}
?>
</html>