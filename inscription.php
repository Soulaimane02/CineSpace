<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
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
    
</head>

<body>

<form action="inscription_trait.php" method="post">

    <h2>Inscription</h2>

    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom">

    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email">

    <label for="code_postal">Code Postal :</label>
    <input type="number" id="code_postal" name="code_postal">

    <label for="rue">Rue :</label>
    <input type="text" id="rue" name="rue" >

    <label for="ville">Ville :</label>
    <input type="text" id="ville" name="ville" >

    <label for="telephone">Numéro de Téléphone :</label>
    <input type="tel" id="telephone" name="telephone">

    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe">

    <button type="submit">S'inscrire</button>
</form>

</body>

</html>