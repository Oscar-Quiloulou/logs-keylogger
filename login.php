<?php
session_start();

// Mot de passe correct
$CORRECT_PASSWORD = "482917";

// Vérification du token CSRF
if (!isset($_POST['csrf']) || $_POST['csrf'] !== $_SESSION['csrf']) {
    header("Location: index.php?csrf=1");
    exit;
}

// Vérification du mot de passe
if (isset($_POST['password']) && $_POST['password'] === $CORRECT_PASSWORD) {
    header("Location: success.html");
    exit;
} else {
    header("Location: index.php?error=1");
    exit;
}
