<?php
 
//ficher controler
 
session_start();
$temps=date("Y-m-d H:i:s");
$commentaire=$_POST['commentaire'];
 
 
$mabase = new PDO ('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
 
$marequete = $mabase->prepare("INSERT INTO commentaire (date,ref_Utilisateur,commentaire) VALUES (:keydate,:keyidutilisateur,:keycommentaire)");
 
$key=array('keydate'=>$temps,'keycommentaire'=>$commentaire,'keyidutilisateur'=>$_SESSION['id_Utilisateur']);
 
$marequete->execute($key);
 
header('location: commentairevue.php');
 
 
?>