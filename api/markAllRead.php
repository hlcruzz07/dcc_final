<?php
header("Content-type: application/json");
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $query = "UPDATE
        feedback
        SET 
        is_read = 1
        ;";

        $stmt = $conn->prepare($query);
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
}
