<?php
header("Access-Control-Allow-Origin: https://oscar-quiloulou.github.io");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST, GET");

$CORRECT_PASSWORD = "482917";

if (isset($_POST['password']) && $_POST['password'] === $CORRECT_PASSWORD) {
    echo "OK";
} else {
    echo "NO";
}
