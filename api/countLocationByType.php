<?php
header('Content-Type: application/json');
include "../lib/conn.php";

$allTypes = ["Building", "Facility", "Office", "Room"];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "
        SELECT location_type, COUNT(*) AS total_rows
        FROM locations
        WHERE status = 1
        GROUP BY location_type
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Convert to associative array for easier mapping
    $counts = array_column($rows, 'total_rows', 'location_type');

    // Ensure all types exist
    $data = [];
    foreach ($allTypes as $type) {
        $data[] = [
            'location_type' => $type,
            'total_rows' => $counts[$type] ?? 0
        ];
    }

    echo json_encode([
        "status" => true,
        "data" => $data,
    ]);
}
