<!DOCTYPE html>
<html lang="fr">
<head>
    
    <meta charset="UTF-8">
    <title>Historique des réservations</title>
    <head>
    <meta charset="UTF-8">
    <title>Historique des réservations</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
    <link rel="stylesheet" href="design/premier.css">
<link rel="stylesheet" href="design/2.css">
<link rel="stylesheet" href="design/3.css">
<link rel="stylesheet" href="design/4.css">
<link rel="stylesheet" href="design/5.css">
<link rel="stylesheet" href="design/6.css">
<link rel="stylesheet" href="design/7.css">
<link rel="stylesheet" href="design/8.css">
<link rel="stylesheet" href="design/9.css">
<link rel="stylesheet" href="design/10.css">
<link rel="stylesheet" href="design/11.css">
<style id="jws-style-theme-inline-css" type="text/css">
.container , .elementor-section.elementor-section-boxed > .elementor-container , .shop-single .woocommerce-notices-wrapper { max-width:100%}body { --container-padding:0 70px 0 70px}body {--e-global-color-primary:#7b61ff; --main: #7b61ff}body {--secondary: #9e61ff}body {--third: #619bff}body {--body:#cccdd2}body {--heading:#ffffff}body {--light:#ffffff}body {--body-font: Metropolitano;--font2: Metropolitano;}.jws_header > .elementor {position:absolute;width:100%;left:0;top:0;}
.blen_lighten {
mix-blend-mode: lighten;
}
</style>
</head>
</head>
<body>

<h2>Historique des réservations</h2>

<table>
    <thead>
        <tr>
            <th>Date de réservation</th>
            <th>Moyen de paiement</th>
            <th>Code de réduction</th>
            <th>Référence Utilisateur</th>
            <th>Référence Salle</th>
        </tr>
    </thead>
    <?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
    $req_historique = $bdd->prepare("SELECT `date_reservation`, `moyen_de_paiement`, `code_de_reduc`, `ref_Utilisateur`, `ref_Salle` FROM `Reservation` WHERE ref_Utilisateur = :keyUtilisateur");
    $req_historique->execute(array('keyUtilisateur' => $_SESSION['idUtilisateur']));
    $recup_historique = $req_historique->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <?php foreach ($recup_historique as $aff): ?>
        <!-- Boucle pour afficher l'historique d'un utilisateur -->
            <tr>
                <td><?php echo $aff['date_reservation']; ?></td>
                <td><?php echo $aff['moyen_de_paiement']; ?></td>
                <td><?php echo $aff['code_de_reduc']; ?></td>
                <td><?php echo $aff['ref_Utilisateur']; ?></td>
                <td><?php echo $aff['ref_Salle']; ?></td>
            </tr>
        <?php endforeach; ?>

</table>

</body>
</html>
