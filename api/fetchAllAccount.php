<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $query = "SELECT 
        id, 
        img, 
        username, 
        DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') AS created_at,
        DATE_FORMAT(updated_at, '%M %d, %Y %h:%i %p') AS updated_at
        FROM admin
        ORDER BY id DESC
        ;";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}
