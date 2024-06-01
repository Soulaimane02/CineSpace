<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un film</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
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
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
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

<?php

//ajouct de film dans la bdd

$ajouter =  $_POST['film_ajout'];




if(isset($ajouter)){
    $nomFilm = $_POST['film_ajout'];

// Les clés d'API
$api_key_tmdb = '7dbb8ecdd2b3ae8c9063f071ef18fcbb';
$api_key_youtube = 'AIzaSyA9W3QVmlcEc31OnubqoPsDE5faQusWPg4';

//La fonction permettant de rechercher le film dans TMDB
function search_movie_tmdb($movie_title) {
    $base_url = 'https://api.themoviedb.org/3';
    $search_url = "{$base_url}/search/movie";
    $params = [
        'api_key' => $GLOBALS['api_key_tmdb'],
        'query' => $movie_title,
        'language' => 'fr-FR'
    ];
    $response = file_get_contents($search_url . '?' . http_build_query($params));
    // Si il trouve le film il renvoie le film sinon il renvoi rien (null)
    if ($response !== false) 
    {
        $movie_data = json_decode($response, true);
        return $movie_data;
    } else 
    {
        return null;
    }
}

//La fonction permettant de rechercher le trailler du film fonctionnant de la même manière que la fonction de recherche de film
function search_trailer_youtube($movie_title) {
    $params = [
        'q' => $movie_title . ' official trailer',
        'part' => 'snippet',
        'maxResults' => 1,
        'key' => $GLOBALS['api_key_youtube']
    ];
    $search_url = 'https://www.googleapis.com/youtube/v3/search?' . http_build_query($params);
    $response = file_get_contents($search_url);

    if ($response !== false) 
    {
        $search_response = json_decode($response, true);
        foreach ($search_response['items'] as $item) 
        {
            if ($item['id']['kind'] === 'youtube#video') {
                return "https://www.youtube.com/watch?v={$item['id']['videoId']}";
            }
        }
    }

    return null;
}

//La fonction permettant d'enrengistrer le film et qui reprend les autre fonctions ci-dessus si il existe dans la BDD de TMDB
function save_movie_info($movie_title) {
    $movie_info = search_movie_tmdb($movie_title);
    if ($movie_info && isset($movie_info['results']) && !empty($movie_info['results'])) {
        $movie = $movie_info['results'][0];
        $synopsis = $movie['overview'] ?? 'Aucun synopsis disponible';
        $poster_path = $movie['poster_path'];
    

        if ($poster_path) {
            $image_url = "https://image.tmdb.org/t/p/original{$poster_path}";
            $trailer_link = search_trailer_youtube($movie_title);

            try {
                $bdd = new PDO('mysql:host=localhost;dbname=szi_cinespace', 'root', 'php');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $req = $bdd->prepare("INSERT INTO Film (titre, image_du_film, synopsis, Bande_Annonce) VALUES (:Titre, :image_du_film, :synopsis, :Bande_Annonce)");
                $req->bindParam(':Titre', $movie_title);
                $req->bindParam(':image_du_film', $image_url);
                $req->bindParam(':synopsis', $synopsis);
                $req->bindParam(':Bande_Annonce', $trailer_link);


                $req->execute();
                echo "Informations du film enregistrées dans la base de données pour {$movie_title}.";
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
        } else {
            echo "Aucune image disponible pour ce film.";
        }
    } else {
        echo 'Film non trouvé sur TMDb.';
    }
}
// permettant de le faire pour n'importe quel film ecrit dans le formulaire grâce à $nomFilm
save_movie_info($nomFilm);

}


?>

</body>
</html>





















