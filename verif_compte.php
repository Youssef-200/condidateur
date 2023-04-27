<?php
require_once("connect.php");

require_once("functions..php");

require_once("configue.php");

     if($niveau == '3eme'){
         insert_data($bdd,$table="etud3a",$nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp,$cle);

         uploaded_file('photo',"etud3a",$nom,$prenom,$msg="");

         uploaded_file('cv',"etud3a",$nom,$prenom,$msg="");

     }elseif($niveau == '4eme'){

         insert_data($bdd,$table="etud4a",$nom,$prenom,$email,$naissance,$diplome,$niveau,$photo,$cv,$log,$mdp,$cle);

         uploaded_file('photo',"etud4a",$nom,$prenom,$msg="");

         uploaded_file('cv',"etud4a",$nom,$prenom,$msg="");

     }

?>