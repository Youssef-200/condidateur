<?php
  require_once ("UtilBD.php");

 // Fonction stockant un e-mail dans la base. Le tableau en
 // param�tre doit contenir les entr�es destinataire, sujet
 // et message. NB: il faudrait v�rifier les valeurs.

 function StockeMail ($mail)
 {
  // Connexion au serveur 
  $connexion = Connexion (NOM, PASSE, BASE, SERVEUR);

  // On "�chappe" les caract�res g�nants. 
  $destinataire = mysqli_real_escape_string ($connexion,$mail['destinataire']);
  $sujet = mysqli_real_escape_string($connexion,$mail['sujet']);
  $message = mysqli_real_escape_string($connexion,$mail['message']);

  // Cr�ation et ex�cution de la requ�te
  $requete = "INSERT INTO Mail(destinataire, sujet, message, date_envoi) "
    . "VALUES ('$destinataire', '$sujet', '$message', NOW())";

  ExecRequete ($requete, $connexion);
 } 
?>
