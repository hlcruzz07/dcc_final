<?php
require 'vendor/autoload.php';
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['token'])) {
    try {
        $decoded_token = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        setcookie("token", "", time() - 3600, "/");
        header("Location: /register");
        exit;
    }
} else {
    setcookie("token", "", time() - 3600, "/");
    header("Location: /register");
    exit;
}
if (isset($_COOKIE['kiosk_token'])) {
    try {
        $decoded_kiosk = JWT::decode($_COOKIE['kiosk_token'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        setcookie("kiosk_token", "", time() - 3600, "/");
        setcookie("token", "", time() - 3600, "/");
        header("Location: /");
        exit();
    }
} else {
    setcookie("kiosk_token", "", time() - 3600, "/");
    setcookie("token", "", time() - 3600, "/");
    header("Location: /");
    exit();
}

if (isset($_COOKIE['visit_token'])) {
    try {
        $visit_token = $_COOKIE['visit_token'];
        $check_visit_token = JWT::decode($_COOKIE['visit_token'], new Key($key, 'HS256'));

        header("Location: /visit");
    } catch (Exception $e) {
        setcookie("visit_token", "", time() - 3600, "/");
        echo "
        <script>
            window.location.href = '/user-location';
        </script>
        ";
        exit();
    }
}
