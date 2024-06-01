<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de film</title>
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

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
            margin: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        select, input[type="date"], input[type="number"], input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        select {
            cursor: pointer;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        button {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #218838;
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
<body>
    <?php session_start();?>
    <?php echo 'idUtilisateur: ' . $_SESSION['idUtilisateur'] . '<br>';?>
    <?php echo 'idSalle: ' . $_SESSION['idSalle'] . '<br>'; ?>

    <h1>Réservation de film</h1>
    <!-- Formulaire de reservation de film -->
    <form action="reservation2.php" method="post">
        <label for="film">Film :</label>
        <select id="film_reservation" name="film">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

            $aff = $bdd->query('SELECT titre FROM `Film`');
            $donnees = $aff->fetchAll();

            foreach ($donnees as $element) {
                ?>
                <option value="<?php echo $element['titre']; ?>"><?php echo $element['titre']; ?></option>
                <?php
            }
            ?>
        </select>
        <br>

        <label for="date">Date de la séance :</label>
        <input type="date" id="date" name="date">
        <br>

        <label for="seats">Nombre de places :</label>
        <input type="number" id="seats" name="nb_place" min="1" max="10">
        <br>

        <label for="payment">Moyen de paiement :</label>
        <select id="payment" name="payer">
            <option value="credit_card">Carte de crédit</option>
            <option value="paypal">PayPal</option>
        </select>
        <br>

        <label for="discount_code">Code de réduction (Si vous en avez un) :</label>
        <input type="text" id="discount_code" name="reduction">
        <br>

        <input type="submit" value="Réserver" name="Reserver">
    </form>
    <button><a href="historique_reservation.php">Voir ses dernières réservations</a></button>

</body>
</html>
