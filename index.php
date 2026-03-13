<?php
// Autoriser les cookies cross-site pour la session PHP
ini_set('session.cookie_samesite', 'None');
ini_set('session.cookie_secure', '1');

header("Access-Control-Allow-Origin: https://oscar-quiloulou.github.io");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET");

session_start();

// Générer un token CSRF
$_SESSION['csrf'] = bin2hex(random_bytes(16));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Backend CSRF</title>
</head>
<body>
    <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
</body>
</html>
