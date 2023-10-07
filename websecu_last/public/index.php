<?php
require "../app/clean_input.php";
require "../app/connexiondb.php";
require "../app/CSRFToken.php";
require "../vendor/autoload.php"; // Inclure l'autoloader de Composer
require "../config/captcha.php";

if (isset($_GET['action'])) {
    $action = clean_input($_GET['action']);
    $log_ins = [
        'connexion' => '../app/log-ins/login2.php',
        'inscription' => '../app/log-ins/register2.php',
        'deconnexion' => '../app/log-ins/logout.php',
    ]; // Liste des fichiers autorisés avec les clés correspondantes

    $fichiers = [
        'home' => '../app/fichiers/home.php',
        'profil' => '../app/fichiers/page.php',
    ]; // Liste des fichiers autorisés avec les clés correspondantes

    $erreurs = [
        '403' => '../app/erreur/403.php',
        '404' => '../app/erreur/404.php',
    ]; // Liste des fichiers autorisés avec les clés correspondantes

    $rd = [
        'droit' => '../app/droit.md',
    ]; // Liste des fichiers autorisés avec les clés correspondantes


    if (isset($log_ins[$action])) {
        $filename = $log_ins[$action];
    } else if (isset($fichiers[$action])) {
        $filename = $fichiers[$action];
    } else if (isset($erreurs[$action])) {
        $filename = $erreurs[$action];
    }
    else if (isset($rd[$action])) {
        $filename = $rd[$action];
    }

    if (isset($filename)) {
        if (file_exists($filename)) {
            include $filename;
        } else {
            include "../app/erreur/404.php";
        }
    } else {
        include "../app/erreur/403.php";
    }

    $action = "";
} else {
    $defaultFile = '../app/fichiers/home.php';

    if (file_exists($defaultFile)) {
        include $defaultFile;
    } else {
        include "../app/erreur/404.php";
    }

    $action = "";
}
?>
