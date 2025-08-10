<?php
header('Content-Type: application/json');
include "../lib/conn.php";
include "../lib/key.php";
require_once "../assets/library/php-jwt-main/src/JWT.php";

use Firebase\JWT\JWT;


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $sql = "SELECT username,password FROM kiosk WHERE username = :username;";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            echo json_encode([
                "status" => false,
                "message" => "Invalid Username or Password"
            ]);
            exit;
        }
        $dbPassword = $stmt->fetch(PDO::FETCH_ASSOC)['password'];
        if (!password_verify($password, $dbPassword)) {
            echo json_encode([
                "status" => false,
                "message" => "Invalid Username or Password"
            ]);
            exit;
        }
        // JWT payload
        $payload = [
            "iss" => "", //domain
            "aud" => "", //domain
            "iat" => time(),
            "exp" => time() + (60 * 60 * 24 * 365), // 1 year
            "data" => [
                "isAuthorized" => true,
            ]
        ];

        // Encode the token
        $jwt = JWT::encode($payload, $key, 'HS256');

        // Set JWT as HTTP-only cookie
        setcookie(
            "kiosk_token",       // cookie name
            $jwt,                 // JWT token
            time() + (60 * 60 * 24 * 365), // 1 year 
            "/",                  // path
            "",                   // domain (current)
            false,                // secure (true if using HTTPS)
            true                  // httponly
        );

        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
