<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = "SELECT 
    locations.id AS location_id,
    locations.location_name,
    locations.location_desc,
    locations.location_type,
    locations.isAccessable,
    DATE_FORMAT(locations.created_at, '%M %d, %Y %h:%i %p') AS date, 
    GROUP_CONCAT(DISTINCT locations_img.id SEPARATOR ',') AS img_id, 
    GROUP_CONCAT(DISTINCT locations_img.img ORDER BY locations_img.id ASC SEPARATOR ',') AS images,
    GROUP_CONCAT(DISTINCT locations_tag.id SEPARATOR ',') AS tag_id, 
    GROUP_CONCAT(DISTINCT locations_tag.tag_name ORDER BY locations_tag.id ASC SEPARATOR ',') AS tag_name
    FROM locations
    INNER JOIN locations_img ON locations.id = locations_img.location_id
    INNER JOIN locations_tag ON locations.id = locations_tag.location_id
    WHERE 
    locations.status = 1
    AND
    locations_img.status = 1
    AND
    locations_tag.status = 1
    GROUP BY locations.id
    ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $locations
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}
