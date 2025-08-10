<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $id = $_POST['id'];

        $query = "DELETE FROM locations_scene WHERE location_id = :id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $query2 = "UPDATE locations SET isAccessable = 0, isComplete = 0 WHERE id = :id;";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(":id", $id);
        $stmt2->execute();
        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage(),
        ]);
    }
}
