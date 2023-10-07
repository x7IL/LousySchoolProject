<?php
include "../config/db_log.php";
include "../config/cert.php";
$conn = NULL;

try {
    $options = array(
        PDO::MYSQL_ATTR_SSL_CA => $path_cert_pem,
        PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => false,
    );

    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password, $options);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données");
}
