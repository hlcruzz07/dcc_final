<?php
require 'vendor/autoload.php';
include "./lib/key.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if (isset($_COOKIE['visit_token'])) {
    try {
        $decoded_visit_token = JWT::decode($_COOKIE['visit_token'], new Key($key, 'HS256'));

        if (!$decoded_visit_token->data->isVisited) {
            setcookie("visit_token", "", time() - 3600, "/");
            header("Location: /user-location");
            exit;
        }
    } catch (Exception $e) {
        setcookie("visit_token", "", time() - 3600, "/");
        header("Location: /user-location");
        exit;
    }
} else {
    setcookie("visit_token", "", time() - 3600, "/");
    header("Location: /user-location");
    exit;
}
