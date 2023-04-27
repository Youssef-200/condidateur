<?php

@$nom = $_POST['nom'];
@$prenom = $_POST['prenom'];
@$email = $_POST['email'];
@$naissance = $_POST['naissance'];

@$diplome = $_POST['diplome'];
@$niveau = $_POST['niveau'];
@$etblissement = $_POST['etablissement'];

@$photo = $_FILES['photo']['name'];
@$cv = $_FILES['cv']['name'];
@$log = $_POST['log'];

@$mdp = $_POST['mdp'];
@$mdps = sha1($_POST['mdps']);


@$envoyer = $_POST['submit'];
@$cle=rand(10000000,900000000);
@$statut = $_POST['statut'];


$to   = $email;
$from = 'y.ouhba3689@uca.ac.ma';
$name = 'YOUSSAF OUHBA';
$subj = 'Email de Confirmation de Compte';
$msg = "HI ";

?>