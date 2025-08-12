<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $limit = $_GET['limit'];
        $query = "SELECT 
        id, 
        email, 
        fname, 
        lname, 
        message, 
        is_read,
        created_at
        FROM feedback
        ORDER BY id DESC
        LIMIT :limit
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalQuery = "SELECT COUNT(*) as total_rows FROM feedback;";
        $totalStmt = $conn->prepare($totalQuery);
        $totalStmt->execute();
        $total = $totalStmt->fetch(PDO::FETCH_ASSOC);


        echo json_encode([
            "status" => true,
            "data" => $data,
            "total" => $total['total_rows']
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}
