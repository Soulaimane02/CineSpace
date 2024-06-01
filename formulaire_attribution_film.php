<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineSpace</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        select, input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
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
    <!-- Formulaire d'attribution du film -->
    <form action="ajout_salle_film.php" method="post">
        <label>Choissez le film </label>
        <select  name="film_attribution">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

            $aff = $bdd->query('SELECT titre FROM `Film`');
            $donnees = $aff->fetchAll();
            // Une boucle pour afficher tout les films dans une liste déroulante
            foreach ($donnees as $element) {
                ?>
                <option value="<?php echo $element['titre']; ?>"><?php echo $element['titre']; ?></option>

                <?php
            }
            ?>
        </select>
        <br>
        <label>Choissez la salle</label>
        <select  name="film_attribution_salle">
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

            $aff = $bdd->query('SELECT id_Salle FROM `Salle`');
            $donnees = $aff->fetchAll();
                
            foreach ($donnees as $element) {
                ?>
                <option value="<?php echo $element['id_Salle']; ?>"><?php echo $element['id_Salle']; ?></option>

                <?php
            }
            ?>
        </select>
        <br>
        <label>Inserer la date du début du film</label>
        <input type="date" name="date_debut">
        <br>
        <label>Inserer la date de fin du film</label>
        <input type="date" name="date_fin">
        <br>
        <input type="submit" value="Inserer" name="insertion_Salle_Film">
    </form>
    
</body>
</html>