<?php

function displayUserData($csrfToken)
{
    if ($csrfToken) {
        $decodedToken = decodeJSONWithPrivateKey($csrfToken, dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . "../token.key", '');
        if ($decodedToken !== false) {
            $tokenData = json_decode($decodedToken, true);
            
            // Appliquer clean_input sur les valeurs de $tokenData
            $tokenData = array_map('clean_input', $tokenData);

            return $tokenData;
        }
    }
}
function encodeJSONWithPublicKey($jsonData, $publicKeyPath) {
    // Charger la clé publique
    $publicKey = openssl_pkey_get_public(file_get_contents($publicKeyPath));

    // Vérifier si la clé publique a été chargée avec succès
    if (!$publicKey) {
        throw new Exception("Impossible de charger la clé publique.");
    }

    // Convertir le JSON en chaîne
    $jsonString = json_encode($jsonData);

    // Chiffrer la chaîne JSON avec la clé publique
    openssl_public_encrypt($jsonString, $encryptedData, $publicKey);

    // Encodage Base64 des données chiffrées
    $base64EncodedData = base64_encode($encryptedData);

    // Retourner les données chiffrées encodées en Base64
    return $base64EncodedData;
}

// Fonction pour décoder un JSON avec une clé privée
function decodeJSONWithPrivateKey($encryptedData, $privateKeyPath) {
    // Charger la clé privée
    $privateKey = openssl_pkey_get_private(file_get_contents($privateKeyPath));

    // Vérifier si la clé privée a été chargée avec succès
    if (!$privateKey) {
        throw new Exception("Impossible de charger la clé privée.");
    }

    // Décoder les données chiffrées encodées en Base64
    $encryptedData = base64_decode($encryptedData);

    // Initialiser la variable pour stocker les données déchiffrées
    $decryptedData = '';

    // Déchiffrer les données avec la clé privée
    openssl_private_decrypt($encryptedData, $decryptedData, $privateKey);

    // Décoder la chaîne JSON
    $jsonData = json_decode($decryptedData, true);

    // Retourner les données JSON décodées
    return $jsonData;
}


function getUserRoleFromCSRFToken($token)
{

    // Décoder le token CSRF à partir de Base64
    $decodedToken = decodeJSONWithPrivateKey($token,dirname( dirname( __FILE__ ) ). DIRECTORY_SEPARATOR ."../token.key",'');

    // Vérifier si le décodage a réussi
    if ($decodedToken !== false) {
        // Convertir le JSON en tableau associatif
        $tokenData = json_decode($decodedToken, true);

        // Vérifier si le JSON a été correctement parsé
        if ($tokenData !== null && isset($tokenData['role'])) {
            return $tokenData['role'];
        }
    }

    return null;
}

// Vérifier si le token CSRF existe et si l'utilisateur a le rôle autorisé
function isUserAllowed($sessionToken)
{
    if (isset($sessionToken)) {
        if (isCSRFTokenValid($sessionToken)) {
            $role = getUserRoleFromCSRFToken($sessionToken);
            return ($role === 'membre' || $role === 'admin');
        }
    }

    return false;
}

// Fonction pour récupérer un jeton CSRF valide déjà existant dans la base de données pour un utilisateur donné
function getValidCSRFToken($userId)
{
    global $conn;
    $query = "SELECT token FROM session WHERE id_user = ? AND expiration > NOW()";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userId]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return ($row) ? $row['token'] : null;
}

// Fonction pour générer un jeton CSRF
function generateCSRFToken($userId, $username, $role)
{

    $userInfo = [
        'id' => $userId,
        'username' => $username,
        'role' => $role
    ];

    // Convertir le tableau en JSON
    $json = json_encode($userInfo);

    // Encoder le JSON en Base64
    $base64 = encodeJSONWithPublicKey($json,dirname( dirname( __FILE__ ) ). DIRECTORY_SEPARATOR ."../token.crt");

    return $base64;
}

// Fonction pour insérer un jeton CSRF dans la base de données
function insertCSRFToken($userId, $username, $role, $token, $expiration)
{
    global $conn;
    $query = "INSERT INTO session (id_user, username, roole, token, expiration) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userId, $username, $role, $token, $expiration]);
}

// Fonction pour vérifier si un jeton CSRF est valide et non expiré
function isCSRFTokenValid($token)
{
    global $conn;
    $query = "SELECT * FROM session WHERE token = ? AND expiration > NOW()";
    $stmt = $conn->prepare($query);
    $stmt->execute([$token]);
    return $stmt->rowCount() > 0;
}


// Génère un jeton CSRF et l'enregistre dans la base de données
function generateAndStoreCSRFToken($userId, $username, $role)
{
    $existingToken = getValidCSRFToken($userId);

    if ($existingToken) {
        if (!isset($_COOKIE['csrf_token'])) {
            $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));
            setcookie('csrf_token', $existingToken, strtotime($expiration), '/'); // Stocke le jeton dans un cookie avec expiration d'une heure
            updateCSRFTokenExpiration($userId, $expiration); // Met à jour l'expiration du jeton dans la base de données
        }
        return $existingToken;
    }

    $token = generateCSRFToken($userId, $username, $role);
    $expiration = date('Y-m-d H:i:s', strtotime('+1 hour'));

    insertCSRFToken($userId, $username, $role, $token, $expiration);
    setcookie('csrf_token', $token, strtotime($expiration), '/'); // Stocke le jeton dans un cookie avec expiration d'une heure
    return $token;
}

function updateCSRFTokenExpiration($userId, $expiration)
{
    global $conn;
    $query = "UPDATE session SET expiration = ? WHERE id_user = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$expiration, $userId]);
}

?>