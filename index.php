<?php
session_start();

// Génération d’un token CSRF unique
$_SESSION['csrf'] = bin2hex(random_bytes(16));
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accès secret</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #222;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px #0f0;
        }

        input[type="password"] {
            padding: 8px;
            margin-right: 10px;
        }

        button {
            padding: 8px 15px;
            cursor: pointer;
        }

        .message {
            margin-top: 10px;
            min-height: 20px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Zone ultra secrète 🕶️</h2>
        <p>Entre le mot de passe :</p>

        <form method="POST" action="login.php">
            <input type="hidden" name="csrf" value="<?php echo $_SESSION['csrf']; ?>">
            <input type="password" name="password" placeholder="Mot de passe">
            <button type="submit">Valider</button>
        </form>

        <div class="message">
            <?php
            if (isset($_GET['error'])) {
                echo "Mot de passe incorrect 🚫";
            }
            if (isset($_GET['csrf'])) {
                echo "Token CSRF invalide ⚠️";
            }
            ?>
        </div>
    </div>
</body>
</html>
