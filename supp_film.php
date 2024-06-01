<?php
$supprimer = $_POST['supprimer_film'];
if(isset($supprimer)){
    $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
    //Requete pour supprimer un film 
    $req_insert = $bdd->prepare('DELETE FROM Film WHERE id_Film = :keyId');
    $req_insert->execute(array('keyId'=>$_POST['supprimer_film']));

    header('Location: accueil.php');

}
?>