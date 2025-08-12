<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $query = "SELECT COUNT(*) as total_rows FROM feedback WHERE is_read = 0;";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);


        echo json_encode([
            "status" => true,
            "rows" => $data,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}
