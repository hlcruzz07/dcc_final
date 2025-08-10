<?php
header('Content-Type: application/json');
include "../lib/conn.php";


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "
        SELECT COUNT(*) AS total_rows
        FROM visitors
        GROUP BY fname AND date_visited
        ";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode([
            "status" => true,
            "data" => $rows,
        ]);
    } catch (Exception $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage(),
        ]);
    }
}
