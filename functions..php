<?php

// cette fonction pour nommer chaque fichier avec le no de son propriotaire

function rename_uplod($file,$nom,$prenom){

    $infosfichier = pathinfo($file);

    $extension_upload = $infosfichier['extension'];
    
    $new_nom = ($extension_upload == 'pdf') ? $nom.' '.$prenom.'.pdf' : $nom.' '.$prenom.'.jpg';

    return $new_nom;

}
function insert_data($bdd,$table,$nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp,$cle){

    if(strlen($mdp)<=18){

        $mdp_hash = sha1($mdp);

        $photo = rename_uplod($photo,$nom,$prenom);

        $cv = rename_uplod($cv,$nom,$prenom);

        if($bdd->query("SELECT * FROM $table where email =  '$email' and mdp = '$mdp_hash'")->rowcount() == 0){

            $recup_data = $bdd->prepare("INSERT INTO $table(nom,prenom,email,date_naiss,diplome,niveau,photo,cv,log,mdp,cle) values(?,?,?,?,?,?,?,?,?,?,?)");
    
            $recup_data->execute(array($nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp_hash,$cle));

            header("Location: authen.php");
    
        }else{
            echo "Deja inscrit !";
        }   
    }

}

// stocker les fichiers dans un dosier correspend a son niveau

function uploaded_file($monfichier,$doc,$nom,$prenom,$msg=""){

    if(move_uploaded_file($_FILES[$monfichier]["tmp_name"],$doc.'/'.rename_uplod($_FILES[$monfichier]['name'],$nom,$prenom))){

        @$msg.="Fichier chargé avec succés <br>";

    }else{

        @$msg.="Erreur de chargement ou fichier deja existant <br>";
        
    }
}

function verif_user($bdd,$email,$mdps){

    $recup_user3 = $bdd->query("SELECT * FROM etud3a where email =  '$email' and mdp = '$mdps' and verif = 1");

    $recup_user4 = $bdd->query("SELECT * FROM etud4a where email = '$email' and mdp = '$mdps' and verif  = 1");
    
    if($recup_user3->rowcount() != 0) {

        $e3 = $recup_user3->fetch();

        $_SESSION['cle'] = $e3['cle'];

        $_SESSION['mdp'] = true;

        header("Location: recap.php");

    }

    if($recup_user4->rowcount() != 0) {

        $e4 = $recup_user4->fetch();

        $_SESSION['cle'] = $e4['cle'];

        $_SESSION['mdp'] = true;

        header("Location: recap.php");

    }

}

function verif_admin($bdd,$email,$mdps){

    $recup_admin = $bdd->query("SELECT * FROM admin where email =  '$email' and mdp = '$mdps'");
    
    if($recup_admin->rowcount() != 0) {  
        
        $_SESSION['mdp'] = true;

        header("Location: administration.php");

    }

}

function updat_infos($bdd,$table,$diplome,$niveau,$photo,$cv,$log,$cle){

    $updat_data = $bdd->prepare("update $table set diplome=?,niveau=?,photo=?,cv=?,log= ? where cle = ?");
    
    $updat_data->execute(array($diplome,$niveau,$photo,$cv,$log,''.$cle.''));

    header("Location: recap.php");

}

function delet_account($bdd,$table,$cle){

    $delet_data = $bdd->prepare("DELETE FROM $table where cle = ?");
    
    $delet_data->execute(array($cle));

}

function smtpmailer($to, $from, $from_name, $subject, $body)
                    {

                        require "PHPMailer/PHPMailerAutoload.php";

                        $mail = new PHPMailer();
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true; 
                        
                        $mail->SMTPSecure = 'ssl'; 
                        $mail->Host = 'smtp.gmail.com';
                        $mail->Port = 465;  
                        $mail->Username = 'y.ouhba3689@uca.ac.ma';
                        $mail->Password = 'oouuhhbbaa2001@YXOU';   
   
                         //   $path = 'reseller.pdf';
                        //   $mail->AddAttachment($path);
   
                        $mail->IsHTML(true);
                        $mail->From="y.ouhba3689@uca.ac.ma";
                        $mail->FromName=$from_name;
                        $mail->Sender=$from;
                        $mail->AddReplyTo($from, $from_name);
                        $mail->Subject = $subject;
                        $mail->Body = $body;
                        $mail->AddAddress($to);
                        if(!$mail->Send())
                        {
                            $error ="Please try Later, Error Occured while Processing...";
                            return  $error; 
                        }
                        else 
                        {
                            $error = "Thanks You !! Your email is sent.";  
                            return $error;
                        }
                }
?>