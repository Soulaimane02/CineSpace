<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
$newprenom = $_POST['newprenom'];
$newnom = $_POST['newnom'];
$newmail = $_POST['newmail'];
$newcodepostal = $_POST['newcp'];
$newrue = $_POST['newrue'];
$newville = $_POST['newville'];
$newtel = $_POST['newtel'];
$newmdp = $_POST['newville'];
$newphoto = $_POST['newphoto'];


$requete = $bdd ->prepare("UPDATE Utilisateur SET prenom = :prenom , nom = :nom , mail = :mail , code_postal = :code_postal,rue= :rue, ville= :ville , num_tel= :num_tel,mdp = :mdp,photo = :photo");

$requete = $requete->execute(array(
    'newnom' => $newnom,
    'newprenom' => $newprenom,
    'newmail' => $newmail,
    'newcp' => $newcodepostal,
    'newrue' => $newrue,
    'newville' => $newville,
    'newtel' => $newtel,
    'newmdp' => $newmdp,
    'newphoto'=> $newphoto,
));

header('Location: editprofil.html');

if ($requete) {
    echo "La modification a été faite avec succès";
} else {
    echo "Erreur pendant votre modification";
}



?>