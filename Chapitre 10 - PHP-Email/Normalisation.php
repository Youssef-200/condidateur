<?php
// Application de la suppression des �chappements, si n�cessaire,
// dans tous les tableaux contenant des donn�es HTTP

require_once("NormalisationHTTP.php");

function Normalisation()
{
  // Si l'on est en �chappement automatique, on rectifie...

    $_POST = NormalisationHTTP($_POST);
    $_GET = NormalisationHTTP($_GET);
    $_REQUEST = NormalisationHTTP($_REQUEST);
    $_COOKIE = NormalisationHTTP($_COOKIE);
  
}
?>
