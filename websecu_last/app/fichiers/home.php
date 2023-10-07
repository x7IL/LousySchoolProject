<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            margin-bottom: 20px;
        }

        ul li a {
            color: #00ffff;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        ul li a:hover {
            color: #ffffff;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        p:before,
        p:after {
            content: "";
            display: inline-block;
            width: 20px;
            height: 2px;
            background-color: #00ffff;
            vertical-align: middle;
            margin-right: 10px;
        }
    </style>
</head>
<body>
<h1>Bienvenue sur la page d'accueil</h1>

<ul>
    <?php
    try {
        $csrfToken = clean_input(isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null);

        if (!isUserAllowed($csrfToken)) {
            ?>
            <p>Veuillez sélectionner une option :</p>
            <li><a href="?action=connexion">Se Connecter</a></li>
            <li><a href="?action=inscription">S'inscrire</a></li>
            <?php
        } else {
            $tokenData = displayUserData($csrfToken);
            echo "Re-bonjour " . $tokenData['username'] . "<br>";
            echo "ton id: " . $tokenData['id'] . "<br>";
            ?>
            <li><a href="?action=profil">Ma page</a></li>
            <li><a href="?action=deconnexion">Deconnexion</a></li>
            <?php
        }
    } catch (Exception $e) {
        // Gestion des erreurs
        echo "Une erreur s'est produite";
    }
    ?>
    <li><a href="?action=droit">S'droit</a></li>
</ul>
</body>
</html>
