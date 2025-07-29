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
if (isset($_COOKIE['kiosk_auth'])) {
    try {
        $decoded_kiosk = JWT::decode($_COOKIE['kiosk_auth'], new Key($key, 'HS256'));
    } catch (Exception $e) {
        setcookie("kiosk_auth", "", time() - 3600, "/");
        setcookie("token", "", time() - 3600, "/");
        header("Location: /");
        exit();
    }
} else {
    setcookie("kiosk_auth", "", time() - 3600, "/");
    setcookie("token", "", time() - 3600, "/");
    header("Location: /");
    exit();
}
