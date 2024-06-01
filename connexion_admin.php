<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

$user = isset($_POST['mail']) ? $_POST['mail'] : '';
$mdp = isset($_POST['mdp']) ? $_POST['mdp'] : '';

if (!empty($user) && !empty($mdp)) {
    $reqs = $bdd->prepare("SELECT * FROM `Utilisateur` WHERE mail = :keymail AND mdp = :keymdp");
    $reqs->execute(array('keymail' => $user, 'keymdp' => $mdp));
    $rep = $reqs->fetch();
    
    /* Verification compte */
    if ($rep && $rep['mail'] == $user && $rep['mdp'] == $mdp) {
        $_SESSION['idUtilisateur'] = $rep['id_Utilisateur'];
        $_SESSION['idSalle'] = $rep['id_Salle'];
        if ($rep['admin'] == 1) {
            header('Location: tableau_de_bord_admin.php');
        } 
        else {
            sleep(1.5); // Pour eviter des attaque de forces brutes
            header('Location: reservation.php');
        }
    } else {
        header('Location: design.php');
    }
} else {
    header('Location: design.php');
}


?>
