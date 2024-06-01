<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
// Requete pour supprimer un film 
$req_insert = $bdd->prepare('DELETE FROM Reservation WHERE id_Reservation = :id');
$req_insert->execute(array('id'=>$_POST['supp_reservation']));
header('Location: tableau_de_bord_admin.php');

?>