<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $id = $_POST['id'];
        $value = $_POST['value'];

        $query = "UPDATE locations SET isAccessable = :isAccessable WHERE id = :id;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":isAccessable", $value, PDO::PARAM_INT);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

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
