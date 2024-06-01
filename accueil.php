<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        /* ... Votre style ici ... */
    </style>
    <title>Films - CineSpace</title>
    <style>
        /* Styles pour les films */
        .film-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .film-image {
            width: 19%;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .film-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s;
        }

        .film-image:hover img {
            transform: scale(1.1);
        }

        .film-image h2 {
            margin: 0;
            font-size: 14px;
            color: #fff;
            background-color: #3b008e;
            padding: 10px;
            border-top: 1px solid #ddd;
            text-align: center;
            width: 100%;
        }

        /* Style pour le titre */
        h1 {
            color: #3b008e;
            text-align: center;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-top: 20px;
        }

        /* Style pour la recherche */
        form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
            font-size: 16px;
            color: #3b008e;
        }

        input[type="text"] {
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 8px 15px;
            font-size: 14px;
            background-color: #3b008e;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Style pour la pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            display: inline-block;
            margin: 0 5px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }
    </style>
</head>

<body>
    <!-- formulaire fonction de recherche -->
    <form action="accueil.php" method="post">
        <label for="recherche">Rechercher votre film </label>
        <input type="text" placeholder="Titanic" name="recherche" id="recherche">
        <input type="submit" value="Rechercher">
    </form>
        <!-- fin formulaire fonction de recherche -->


    <h1>Films</h1>
    <div class="film-images">
        <!-- Boucle PHP pour afficher tous les films -->
        <?php
        $titre = $_POST['recherche'];
        $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');

        $films_par_page = 10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1; 

        $debut = ($page - 1) * $films_par_page;
        $fin = $debut + $films_par_page;

        if (!empty($titre)) {
            $t = 'SELECT id_Film, Titre, image_du_film FROM Film WHERE Titre LIKE "%' . $titre . '%"';
            $o = $bdd->prepare($t);
            $o->execute();
            $res = $o->fetchAll(PDO::FETCH_ASSOC);
        } else {

            $paginitaion = 'SELECT * FROM Film LIMIT ' .$debut. ' , ' .$fin. ' ';
            $requete_films = $bdd->prepare($paginitaion);
            $requete_films->execute();
            $res = $requete_films->fetchAll(PDO::FETCH_ASSOC);
        }

        foreach ($res as $elem) {
            echo '<div class="film-image">';
            echo '<a href="details_film.php?id_Film=' . $elem['id_Film'] . '">';
            echo '<img src="' . $elem['image_du_film'] . '" alt="' . $elem['Titre'] . '">';
            echo '<h2>' . $elem['Titre'] . '</h2>';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

    <!-- Pagination (aide de GPT)-->
    <div class="pagination">
        <?php
        $total_films = $bdd->query('SELECT COUNT(*) FROM Film')->fetchColumn();
        $total_pages = ceil($total_films / $films_par_page);

        for ($i = 1; $i <= $total_pages; $i++) 
        {
            echo '<a href="accueil.php?page=' . $i . '">Page ' . $i . '</a>';
        }
        ?>
    </div>
</body>

</html>
