<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="design/style.css"> 
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

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Fond gris clair */
            color: #333; /* Couleur du texte */
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .film-details {
            width: 80%;
            background-color: #fff; /* Fond blanc */
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            border-radius: 8px;
        }

        h2 {
            color: #333;
            font-family: 'Arial Black', sans-serif;
            text-align: center;
            margin-bottom: 20px;
        }

        .film-content {
            display: flex;
            flex-direction: row;
            margin-bottom: 20px;
        }

        .film-image {
            flex: 1;
            margin-right: 20px;
        }

        img {
            width: 100%;
            max-width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        iframe {
            flex: 2;
            height: 400px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .synopsis {
            width: 100%;
            text-align: justify;
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

    // Conditions pour verifier si l'ID existe dans la BDD et si l'ID est numérique
    if (isset($_GET['id_Film']) && is_numeric($_GET['id_Film'])) {
        $id_film = $_GET['id_Film'];
        // Requete pour selectionner tout les elements d'un film spécifique lié à son ID
        $requete_film = $bdd->prepare('SELECT * FROM Film WHERE id_Film = ?');
        $requete_film->execute([$id_film]);
        $film = $requete_film->fetch();
        // Si la requete affiche un resultat
        if ($film) {
            echo '<div class="film-details">';
            echo '<h2>' . $film['Titre'] . '</h2>';
            echo '<div class="film-content">';
            echo '<div class="film-image">';
            echo '<img src="' . $film['image_du_film'] . '" alt="' . $film['Titre'] . '">';
            echo '</div>';
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . substr($film['Bande_Annonce'], 32) . '" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
            echo '<div class="synopsis">';
            echo '<p>' . $film['synopsis'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '<title>' . $film['Titre'] . ' - CineSpace</title>';
        } else {
            echo '<p>Le film demandé n\'existe pas.</p>';
        }
    } else {
        echo '<p>Aucun ID de film spécifié.</p>';
    }
    ?>
</body>

</html>
