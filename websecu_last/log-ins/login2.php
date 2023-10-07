<?php
require "../fonctions/connexiondb.php";
require "../fonctions/clean_input.php";
require "../fonctions/CSRFToken.php";
require "../../vendor/autoload.php"; // Inclure l'autoloader de Composer
require "../config/captcha.php";

use ReCaptcha\ReCaptcha;

// Importer la classe ReCaptcha

connexiondb();


$sessionToken = isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null;

if (isUserAllowed($sessionToken)) {
    header("Location: index.php");
    exit();
}

// Vérification de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["username"]);
    $password = clean_input($_POST["password"]);

    // Vérification reCAPTCHA
    $reCaptchaResponse = $_POST['g-recaptcha-response'];

    $reCaptcha = new ReCaptcha($reCaptchaSecretKey);
    $reCaptchaResult = $reCaptcha->verify($reCaptchaResponse, $_SERVER['REMOTE_ADDR']);

    if ($reCaptchaResult->isSuccess()) {
        // Vérification de l'existence de l'utilisateur
        $query = "SELECT * FROM login WHERE username = :username";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $count = $stmt->rowCount();


        if ($count > 0) {
            $salt = "manger";
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $stored_password = $user['password'];

            if (password_verify($password . $salt, $stored_password)) {
                // Mot de passe correct, authentification réussie
                // Supprimer les jetons CSRF expirés
                // deleteExpiredCSRFTokens();

                $expiration = strtotime('+1 hour');
                $token = generateAndStoreCSRFToken($user['id'], $user['username'], $user['roole']);


                // Redirection vers index.php après l'affichage
                header("Location: ?action=profil");
                exit();
            } else {
                // Mot de passe incorrect
                echo "Nom d'utilisateur ou mot de passe incorrect.<br>";
            }
        } else {
            // Utilisateur non trouvé
            echo "Nom d'utilisateur ou mot de passe incorrect.<br>";
        }
    } else {
        // Échec de vérification reCAPTCHA
        echo "Veuillez remplir le reCAPTCHA correctement.<br>";
    }

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <script nonce='captcha' src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<form autocomplete='off' class='form' method="post">
    <div class='control'>
        <h1>Se connecter</h1>
    </div>
    <div class='control block-cube block-input'>
        <input name='username' placeholder='Username' type='text'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
    </div>
    <div class='control block-cube block-input'>
        <input name='password' placeholder='Password' type='password'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
    </div>
    <div class="g-recaptcha" data-sitekey=<?php echo $reCaptchaPublicKey ?>
    style="margin-bottom: 5%
    "></div>


    <button class='btn block-cube block-cube-hover' type='submit'>
        <div class='bg-top'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg-right'>
            <div class='bg-inner'></div>
        </div>
        <div class='bg'>
            <div class='bg-inner'></div>
        </div>
        <div class='text'>
            Log In
        </div>
    </button>
</form>
<div class="links">
    <a href="?action=inscription" class="btn">S'inscrire</a>
    <a href="?action=home" class="btn">Accueil</a>
</div>
</body>
</html>
