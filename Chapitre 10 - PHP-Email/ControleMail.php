<?php
 // Fonction contr�lant l'entr�e de l'application e-mail.

 function ControleMail (&$mail)
 {
   // Le tableau en param�tre doit contenir les entr�es: destinataire, 
   // sujet et message.  V�rification.
   if (!isSet($mail['destinataire'])) 
     {echo "Pas de destinataire!"; return false;}
   else $mail['destinataire'] = htmlSpecialChars($mail['destinataire']);

   if (!isSet($mail['sujet'])) 
     {echo "Pas de sujet!"; return false;}
   else $mail['sujet'] = htmlSpecialChars($mail['sujet']);

   if (!isSet($mail['message'])) 
     {echo "Pas de message!"; return false;}
   else $mail['message'] = htmlSpecialChars($mail['message']);

   // On v�rifie que les donn�es ne sont pas vides
   if (empty($mail['destinataire'])) 
     {echo "Destinataire vide!"; return false;}
   if (empty($mail['sujet'])) 
     {echo "Sujet vide!"; return false;}
   if (empty($mail['message'])) 
     {echo "Message vide!"; return false;}

   // Maintenant on peut/doit �galement faire des contr�les
   // sur les valeurs attendues: destinataire, sujet, message.
   // Voir les exercices pour des suggestions.

   return true;
 } 
?>
