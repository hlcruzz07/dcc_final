<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT 
    DISTINCT tag_name
    FROM locations_tag
    WHERE status = 1
    ;";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}
