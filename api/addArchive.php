<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $table_id = $_POST['table_id'];
        $table_name = $_POST['table_name'];
        $page_name = $_POST['page_name'];

        $query = "INSERT INTO archive (table_id, table_name, page_name) VALUES (:table_id, :table_name, :page_name);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam("table_id", $table_id);
        $stmt->bindParam("table_name", $table_name);
        $stmt->bindParam("page_name", $page_name);
        $stmt->execute();

        echo json_encode([
            "status" => true
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}
