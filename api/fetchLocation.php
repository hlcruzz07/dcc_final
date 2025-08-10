<?php
header('Content-Type: application/json');
include "../lib/conn.php";
include "../lib/key.php";
require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $check_visit_token = JWT::decode($_COOKIE['visit_token'], new Key($key, 'HS256'));
    $location_id = $check_visit_token->data->location_id;
    $query = "SELECT 
    locations.id AS location_id,
    locations.location_name,
    locations.location_desc,
    locations.location_type,
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
    AND 
    locations.id = :location_id
    GROUP BY locations.id
    ";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":location_id", $location_id);
    $stmt->execute();
    $locations = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $locations,
        "location_id" => $location_id
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}
