<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $query = "SELECT 
        id, 
        table_id, 
        table_name, 
        page_name, 
        DATE_FORMAT(created_at, '%M %d, %Y %h:%i %p') AS date
        FROM archive
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
