<?php 

session_start();

$_SESSION['verif'] = 0;

require_once("connect.php");

require_once("functions..php");

require_once("configue.php");

if(isset($envoyer)){

    if(!empty($nom) and !empty($prenom) and !empty($email) and !empty($naissance) and !empty($diplome) and !empty($niveau) and !empty($log) and !empty($mdp)){

        if($niveau == '3eme'){

            $error=smtpmailer($to,$from, $name ,$subj, $msg);

            insert_data($bdd,$table="etud3a",$nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp,$cle);
   
            uploaded_file('photo',"etud3a",$nom,$prenom,$msg="");
   
            uploaded_file('cv',"etud3a",$nom,$prenom,$msg="");
   
        }elseif($niveau == '4eme'){

            $error=smtpmailer($to,$from, $name ,$subj, $msg);
   
            insert_data($bdd,$table="etud4a",$nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp,$cle);
   
            uploaded_file('photo',"etud4a",$nom,$prenom,$msg="");
   
            uploaded_file('cv',"etud4a",$nom,$prenom,$msg="");
   
        }

        require_once("email_confirmation.php");

        echo "confirmer votre compte";

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
    <h4>Formulaire d'Inscription</h4>
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Bienvenu</h1>
        <table>
            <tr>
                <td> nom:</td>
                <td> <input type="text" name="nom" value="<?= @$_POST['nom']; ?>"/> </td>
            </tr>
            <tr>
                <td> prénom:</td>
                <td> <input type="text" name="prenom" value="<?= @$_POST['prenom']; ?>"/> </td>
            </tr>
            <tr>
                <td> email :</td>
                <td> <input type="email" name="email" value="<?= @$_POST['email']; ?>"/> </td>
            </tr>
            <tr>
                <td> naissance :</td>
                <td> <input type="date" name="naissance" value="<?= @$_POST['naissance']; ?>"/> </td>
            </tr>
            <tr>
                <td> diplome :</td>
                <td>
                    <select  name="diplome" value="<?= @$_POST['diplome']; ?>">
                        <option value="Bac+3">Bac+3</option>
                        <option value="Bac+4">Bac+4</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td> niveau :</td>
                <td>
                    <select name="niveau" value="<?= @$_POST['niveau']; ?>">
                        <option value="3eme">3eme</option>
                        <option value="4eme">4eme</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td> etablissement :</td>
                <td> <input type="text" name="etablissement" value="<?= @$_POST['etablissement']; ?>"/> </td>
            </tr>
            <tr>
                <td> photo :</td>
                <td> <input type="file" accept="image/png, image/jpeg" name="photo" value="<?= @$_POST['photo']; ?>"/> </td>
            </tr>
            <tr>
                <td> cv :</td>
                <td> <input type="file" accept="application/pdf" name="cv" value="<?= @$_POST['cv']; ?>"/> </td>
            </tr>
            <tr>
                <td> log :</td>
                <td> <input type="text" name="log" value="<?= @$_POST['log']; ?>"/> </td>
            </tr>
            <tr>
                <td> Mot de pass:</td>
                <td> <input type="password" name="mdp" maxlength="18" value="<?= @$_POST['mdp']; ?>"/> </td>
            </tr>
        </table>

        <input type="submit" name="submit" value="inscription" />
    </form>
</body>
</html>