<?php
session_start();

if (isset($_POST['film_attribution'], $_POST['film_attribution_salle'], $_POST['date_debut'], $_POST['date_fin'])) 
{
    $ref_Salle = $_POST['film_attribution_salle'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer l'ID du film
        $req_select = $bdd->prepare("SELECT id_Film FROM Film WHERE Titre = ?");
        $req_select->execute([$_POST['film_attribution']]);
        $recup = $req_select->fetch(PDO::FETCH_ASSOC);

        if ($recup) {
            $ref_Film = $recup['id_Film'];
            $insert = $bdd->prepare("INSERT INTO `Salle_Film`(`ref_Salle`, `ref_Film`, `date_debut`, `date_fin`) VALUES (:keyRef_Salle, :keyRef_Film, :keyDate_Debut, :keyDate_Fin)");
            $insert->bindParam(':keyRef_Salle', $ref_Salle);
            $insert->bindParam(':keyRef_Film', $ref_Film);
            $insert->bindParam(':keyDate_Debut', $date_debut);
            $insert->bindParam(':keyDate_Fin', $date_fin);
            $insert->execute();
            header('Location: acceuil.php');
        } else {
            echo "Film non trouvé.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
