<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'administrateur</title>
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

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
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
    <!-- Tout simplement un formulaire pour ajouter un admin -->
    <form action="ajouter_admin.php" method="post">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="mail">E-mail :</label>
        <input type="email" id="mail" name="mail" required><br><br>

        <label for="code_postal">Code Postal :</label>
        <input type="text" id="code_postal" name="code_postal"><br><br>

        <label for="rue">Rue :</label>
        <input type="text" id="rue" name="rue"><br><br>

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville"><br><br>

        <label for="num_tel">Numéro de téléphone :</label>
        <input type="text" id="num_tel" name="num_tel"><br><br>

        <label for="mdp">Mot de passe :</label>
        <input type="password" id="mdp" name="mdp" required><br><br>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo"><br><br>

        <input type="submit" value="Ajouter l'administrateur">
    </form>
</body>
</html>


