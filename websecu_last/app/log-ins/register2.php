<?php

// Importer la classe ReCaptcha

use ReCaptcha\ReCaptcha;

try {
    require "../config/cert.php";

    $sessionToken = clean_input(isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null);

    if (isUserAllowed($sessionToken)) {
        header("Location: ?action=403");
        exit();
    }


    // Récupération des données du formulaire
    if (clean_input($_SERVER["REQUEST_METHOD"]) == "POST") {
        $username = clean_input(isset($_POST["username"]) ? $_POST["username"] : null);
        $password = clean_input(isset($_POST["password"]) ? $_POST["password"] : null);
        $confirm_password =clean_input(isset($_POST["confirm_password"]) ? $_POST["confirm_password"] : null);

        // Vérification reCAPTCHA
        $reCaptchaResponse = clean_input($_POST['g-recaptcha-response']);

        $reCaptcha = new ReCaptcha($reCaptchaSecretKey);
        $reCaptchaResult = $reCaptcha->verify($reCaptchaResponse, clean_input($_SERVER['REMOTE_ADDR']));
        $booolean = 1;

        if ($reCaptchaResult->isSuccess()) {
            // Vérification des caractères autorisés dans le nom d'utilisateur
            if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
                echo "Le nom d'utilisateur ne doit contenir que des lettres et des chiffres.";
                $booolean = 0;
            }

            // Vérification de la longueur du nom d'utilisateur
            if (strlen($username) < 5 || strlen($username) > 16) {
                echo "Le nom d'utilisateur doit comporter entre 5 et 16 caractères.";
                $booolean = 0;
            }

            // Vérification du mot de passe
            if ($password !== $confirm_password) {
                echo "Les mots de passe ne correspondent pas.";
                $booolean = 0;
            }

            // Vérification de la longueur du mot de passe
            if (strlen($password) < 16) {
                echo "Le mot de passe doit comporter plus de 16 caractères.";
                $booolean = 0;
            }

            // Vérification de l'existence de l'utilisateur
            $query = "SELECT * FROM login WHERE username = :username";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $count = $stmt->rowCount();

            if ($count > 0) {
                echo "Le nom d'utilisateur existe déjà. Veuillez choisir un nom d'utilisateur différent.";
                $booolean = 0;
            }

            if ($booolean == 1 ) {
                $hashed_password = password_hash($salt.$password . $salt2, PASSWORD_BCRYPT, ['cost' => 12]);
                $roole = "membre"; // Définissez ici le rôle par défaut de l'utilisateur

                // Insertion des données dans la table login en utilisant des requêtes préparées
                $query = "INSERT INTO login (username, password, roole) VALUES (:username, :password, :roole)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":password", $hashed_password);
                $stmt->bindParam(":roole", $roole);
                $stmt->execute();

                // Récupération de l'ID de l'utilisateur nouvellement inscrit
                $userId = $conn->lastInsertId();

                // Génération et stockage du jeton CSRF dans la base de données
                $token = generateAndStoreCSRFToken($userId, $username, $roole);
                header("Location: ?action=profil");
                exit();
            }
            $booolean = 1;
        } else {
            // Échec de vérification reCAPTCHA
            echo "Veuillez remplir le reCAPTCHA correctement.";
        }
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
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <script nonce='captcha' src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<form autocomplete='off' class='form' method="post">
    <div class='control'>
        <h1>S'inscrire</h1>
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
    <div class='control block-cube block-input'>
        <input name='confirm_password' placeholder='Confirm Password' type='password'>
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
            S'inscrire
        </div>
    </button>
</form>
<div class="links">
    <a href="?action=connexion" class="btn">Se connecter</a>
    <a href="?action=home" class="btn">Accueil</a>
</div>
</body>
</html>
