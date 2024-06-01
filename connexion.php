<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion - CineSpace</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Metropolitano', sans-serif;
            background-color: #cccdd2;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            color: #7b61ff;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #7b61ff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>

    <!-- Script reCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<form action="connexion_admin.php" method="post">
    <div class="login-container">
        <h2>Connexion</h2>
        <div class="form-group">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="mail" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="mdp" class="form-control" required>
        </div>
        <div class="form-group">
            <div class="g-recaptcha" data-sitekey="6Le_0VEpAAAAAJvTuuzZyH_dR4Q0XhS6ugP8bbIE"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </div>
        <div class="form-group">
            <p class="error-message" id="error-message"></p>
        </div>
        <div class="form-group">
            <a href="#" onclick="forgotPassword()">Mot de passe oublié ?</a> <!-- A creuser -->
        </div>
        <div class="form-group">
            <a href="inscription.php">S'inscrire</a>
        </div>
    </div>
</form>
<script>
    
    // Captcha fais avec un tutoriel youtube
    function validateCaptcha() {
        return true;
    }
    // A creuser 
    function forgotPassword() {
        const email = prompt('Veuillez saisir votre adresse e-mail :');

        if (email) {
            alert('Un lien de réinitialisation a été envoyé à votre adresse e-mail.');
        }
    }
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
