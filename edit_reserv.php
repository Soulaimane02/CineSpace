<?php
session_start();
$refUtilisateur = $_POST['newRefUser'];
$refSalle = $_POST['newRefSalle'];

$bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

    // Requete pour modifier la reservation 
    $req_insert = $bdd->prepare('UPDATE `Reservation` SET `ref_Utilisateur`= :keyUtilisateur, `ref_Salle`= :keySalle WHERE id = :id');
    $req_insert->execute(array(
        'keyUtilisateur'=>$refUtilisateur, 
        'keySalle'=>$refSalle, 
        'id' => $_SESSION['id'] //faire une requete cachée select pour avoir les ref grace a $session
    ));

    header('Location: tableau_de_bord_admin.php');


?>
