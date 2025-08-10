<?php
require 'vendor/autoload.php';
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['kiosk_token'])) {
    try {
        $decoded_kiosk = JWT::decode($_COOKIE['kiosk_token'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        // Clear invalid token
        setcookie("kiosk_token", "", time() - 3600, "/");
        echo "
            <script>
            alert('Invalid Token');
            window.location.href = '/';
            </script>";
        exit();
    }
} else {
    setcookie("kiosk_token", "", time() - 3600, "/");
    echo "
    <script>
    alert('Unauthorized User');
    window.location.href = '/';
    </script>";
    exit();
}

if (isset($_COOKIE['token'])) {
    try {
        $decoded_kiosk = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
        header("Location: /home");
    } catch (Exception $e) {
        // Clear invalid token
        setcookie("kiosk_token", "", time() - 3600, "/");
        setcookie("token", "", time() - 3600, "/");
        echo "
            <script>
            alert('Invalid Token');
            window.location.href = '/';
            </script>";
        exit();
    }
}
