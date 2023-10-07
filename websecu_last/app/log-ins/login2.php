<?php
// Importer la classe ReCaptcha
use ReCaptcha\ReCaptcha;

try {
    // Bloc de code principal
    require "../config/cert.php";

    $sessionToken = clean_input(isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null);

    if (isUserAllowed($sessionToken)) {
        header("Location: ?action=403");
        exit();
    }

    // Vérification de la soumission du formulaire
    if (clean_input($_SERVER["REQUEST_METHOD"] == "POST")) {
        $username = clean_input(isset($_POST["username"]) ? $_POST["username"] : null);
        $password = clean_input(isset($_POST["password"]) ? $_POST["password"] : null);

        // Vérification reCAPTCHA
        $reCaptchaResponse = clean_input($_POST['g-recaptcha-response']);

        $reCaptcha = new ReCaptcha($reCaptchaSecretKey);
        $reCaptchaResult = $reCaptcha->verify($reCaptchaResponse, clean_input($_SERVER['REMOTE_ADDR']));

        if ($reCaptchaResult->isSuccess()) {
            // Vérification de l'existence de l'utilisateur
            $query = "SELECT * FROM login WHERE username = :username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $stored_password = clean_input($user['password']);
                $userrole = clean_input($user['roole']);
                $username = clean_input($user['username']);
                $userid = clean_input($user['id']);

                if (password_verify($salt.$password . $salt2, $stored_password)) {
                    // Mot de passe correct, authentification réussie
                    // Supprimer les jetons CSRF expirés
                    // deleteExpiredCSRFTokens();

                    $expiration = strtotime('+1 hour');
                    $token = generateAndStoreCSRFToken($userid, $username, $userrole);
                    $_SESSION['csrf_token'] = $token;

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
    } else {
        echo "Rien n'a été soumis.<br>";
    }
} catch (Exception $e) {
    // Gestion des erreurs
    echo "Une erreur s'est produite : " . $e->getMessage();
    exit();
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
    style="margin-bottom: 5%"></div>


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
