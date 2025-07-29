<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    try {
        $query = "SELECT 
        activity_logs.id, 
        activity_logs.admin_id, 
        activity_logs.action_desc, 
        activity_logs.action_taken,
        DATE_FORMAT(activity_logs.created_at, '%M %d, %Y %h:%i %p') AS date,
        admin.img,
        admin.username
        FROM activity_logs
        INNER JOIN admin ON admin.id = activity_logs.admin_id
        ORDER BY activity_logs.id DESC
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
