<?php
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
    <form>
        <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
    </form>
</body>
</html>
