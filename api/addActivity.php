<?php
header('Content-Type: application/json');
include "../lib/conn.php";
include "../lib/key.php";
include "../assets/library/php-jwt-main/src/Key.php";
include "../assets/library/php-jwt-main/src/JWT.php";

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $decoded = JWT::decode($_COOKIE['auth'], new Key($key, 'HS256'));

        $admin_id =  $decoded->data->admin_id;
        $action_desc = $_POST['action_desc'];
        $action_taken = $_POST['action_taken'];

        $query = "INSERT INTO activity_logs (admin_id,action_desc, action_taken) VALUES (:admin_id, :action_desc, :action_taken);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":admin_id", $admin_id);
        $stmt->bindParam(":action_desc", $action_desc);
        $stmt->bindParam(":action_taken", $action_taken);
        $stmt->execute();


        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid HTTP Request"
    ]);
}
