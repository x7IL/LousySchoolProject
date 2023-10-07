<?php
require "../fonctions/connexiondb.php";
require "../fonctions/clean_input.php";
require "../fonctions/CSRFToken.php";
connexiondb();
$sessionToken = isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null;

if (!isUserAllowed($sessionToken)) {
    header("Location: ?action=home");
    exit();
}
$tokenData = displayUserData($sessionToken);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mon Profil</title>
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
<div class='btn block-cube' type='submit'>
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
        <h1>Mon Profil</h1>
        <div class="profile-info">
            <div class="details">
                <p>Nom d'utilisateur : <span><?php echo $tokenData['username']?></span></p>
                <p>id : <span><?php echo $tokenData['id']?></span></p>
                <p>Rôle : <span><?php echo $tokenData['role']?></span></p>
            </div>
        </div>
        <div class="profile-actions">
            <a href="?action=deconnexion" class="btn">Déconnexion</a>
            <a href="?action=home" class="btn">Accueil</a>
        </div></div>
</div>
</body>
</html>
