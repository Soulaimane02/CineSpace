<?php
session_start();
try {
    $paiement = $_POST['payer'];
    $reduc = $_POST['reduction'];
    $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

    $dateJT = date('Y-m-d H:i:s'); // Fonction date pour avoir la date 

    // Requete pour ajouter la reservation
    $req = $bdd->prepare('INSERT INTO `Reservation`(`moyen_de_paiement`, `code_de_reduc`, `ref_Utilisateur`, `ref_Salle`, `date_reservation`) VALUES (:keyPaiement, :keyReduc, :keyUtilisateur, :keySalle, :dateReservation)');
    $req->execute(array(
        'keyPaiement' => $paiement,
        'keyReduc' => $reduc,
        'keyUtilisateur' => $_SESSION['idUtilisateur'],
        'keySalle' => 2,
        'dateReservation' => $dateJT
    ));
    header('Location: reservation.php');
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
