<?php
require_once("functions..php");

require_once("configue.php");

require "PHPMailer/PHPMailerAutoload.php";

$from = 'y.ouhba3689@uca.ac.ma';
$name = 'YOUSSAF OUHBA';
$subj = 'Email de Confirmation de Compte';
$msg = "HI ";
               
$error=smtpmailer("youssafouhba@gmail.com",$from, $name ,$subj, $msg);
         
            
            ?>