<?php

require "../fonctions/connexiondb.php";
require "../fonctions/CSRFToken.php";
$pdo = connexiondb();
session_start();
$csrfToken = isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null;

if (!isUserAllowed($csrfToken)) {
    header("Location: ?action=home");
    exit();
}

if ($csrfToken) {
    // Décoder le token CSRF à partir de Base64
    //il faut juste mettre le path du fichier certificat prive pour dechiffre le token
    $decodedToken = decodeJSONWithPrivateKey($csrfToken, dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "../token.key", '');

    // Vérifier si le décodage a réussi
    if ($decodedToken !== false) {
        // Convertir le JSON en tableau associatif
        $tokenData = json_decode($decodedToken, true);

        // Vérifier si le JSON a été correctement parsé et si l'ID est présent
        if ($tokenData !== null && isset($tokenData['id'])) {
            $id = $tokenData['id'];

            // Supprimer l'utilisateur de la table "session" en utilisant PDO
            $stmt = $pdo->prepare("DELETE FROM session WHERE id_user = :id_user");
            $stmt->bindParam(':id_user', $id);
            $stmt->execute();
            setcookie('csrf_token', '', time() - 3600, '/');
            header("Location: ?action=home");
            exit();

        }

    }
}

// Rediriger vers une page de déconnexion réussie


?>
