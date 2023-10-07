<?php

session_start();
$csrfToken = clean_input(isset($_COOKIE['csrf_token']) ? $_COOKIE['csrf_token'] : null);

try {
    if (!isUserAllowed($csrfToken)) {
        header("Location: ?action=403");
        exit();
    }

    if ($csrfToken) {
        // Décoder le token CSRF à partir de Base64
        // Il faut juste mettre le chemin du fichier de certificat privé pour déchiffrer le token
        $decodedToken = decodeJSONWithPrivateKey($csrfToken, dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "../private/token.key", '');

        // Vérifier si le décodage a réussi
        if ($decodedToken !== false) {
            // Convertir le JSON en tableau associatif
            $tokenData = json_decode($decodedToken, true);

            // Vérifier si le JSON a été correctement parsé et si l'ID est présent
            if ($tokenData !== null && isset($tokenData['id'])) {
                $id = clean_input($tokenData['id']);

                // Supprimer l'utilisateur de la table "session" en utilisant PDO
                $stmt = $conn->prepare("DELETE FROM session WHERE id_user = :id_user");
                $stmt->bindParam(':id_user', $id);
                $stmt->execute();
                setcookie('csrf_token', '', time() - 3600, '/');
                header("Location: ?action=home");
                exit();
            }
        }
    }

    // Rediriger vers une page de déconnexion réussie
} catch (Exception $e) {
    // Gestion des erreurs
    echo "Une erreur s'est produite : " . $e->getMessage();
    exit();
}
?>
