<?php
header("Access-Control-Allow-Origin: https://oscar-quiloulou.github.io");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET");

session_start();

$CORRECT_PASSWORD = "482917";

// Vérification du token CSRF
if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    echo "CSRF_INVALID";
    exit;
}

// Vérification du mot de passe
if (isset($_POST['password']) && $_POST['password'] === $CORRECT_PASSWORD) {
    echo "OK";
    exit;
} else {
    echo "NO";
    exit;
}
