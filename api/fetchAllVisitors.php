<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT 
        visitors.id,
        visitors.location_id,
        visitors.visit_desc,
        visitors.purpose,
        visitors.email,
        visitors.fname,
        visitors.lname,
        visitors.phone_num,
        visitors.province,
        visitors.city,
        visitors.brgy,
        visitors.street,
        DATE_FORMAT(visitors.date_visited, '%M %d, %Y %h:%i %p') as date_visited,
        locations.location_name
    FROM visitors
    INNER JOIN locations 
    ON visitors.location_id = locations.id
    ORDER BY visitors.id
    DESC
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $visitors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $visitors
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}
