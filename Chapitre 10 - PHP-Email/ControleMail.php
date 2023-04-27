<?php
 // Fonction contrôlant l'entrée de l'application e-mail.

 function ControleMail (&$mail)
 {
   // Le tableau en paramètre doit contenir les entrées: destinataire, 
   // sujet et message.  Vérification.
   if (!isSet($mail['destinataire'])) 
     {echo "Pas de destinataire!"; return false;}
   else $mail['destinataire'] = htmlSpecialChars($mail['destinataire']);

   if (!isSet($mail['sujet'])) 
     {echo "Pas de sujet!"; return false;}
   else $mail['sujet'] = htmlSpecialChars($mail['sujet']);

   if (!isSet($mail['message'])) 
     {echo "Pas de message!"; return false;}
   else $mail['message'] = htmlSpecialChars($mail['message']);

   // On vérifie que les données ne sont pas vides
   if (empty($mail['destinataire'])) 
     {echo "Destinataire vide!"; return false;}
   if (empty($mail['sujet'])) 
     {echo "Sujet vide!"; return false;}
   if (empty($mail['message'])) 
     {echo "Message vide!"; return false;}

   // Maintenant on peut/doit également faire des contrôles
   // sur les valeurs attendues: destinataire, sujet, message.
   // Voir les exercices pour des suggestions.

   return true;
 } 
?>
