<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $limit = $_POST['limit'];
    $queryLimit = "LIMIT $limit";
    $location_search = '%' . $_POST['location_search'] . '%';
    $querySearch = $_POST['location_search'] === "" ? "" : "AND locations.location_name LIKE :location_search";
    $location_type = $_POST['location_type'];
    $queryType = $location_type === '' ? "" : "AND location_type LIKE '%$location_type%'";


    $queryTags = [];

    $hasTags = isset($_POST['tag_name']);
    $tagsClause = '';

    if ($hasTags) {
        foreach ($_POST['tag_name'] as $tag_name) {
            $queryTags[] = "tag_name LIKE '%$tag_name%'";
        }

        $tagsClause = 'AND (' . implode(' OR ', $queryTags) . ')';
    }
    $query = "SELECT 
    locations.id AS location_id,
    locations.location_name,
    locations.location_desc,
    locations.location_type,
    GROUP_CONCAT(DISTINCT locations_img.img ORDER BY locations_img.id ASC SEPARATOR ',') AS images,
    GROUP_CONCAT(DISTINCT locations_tag.tag_name ORDER BY locations_tag.id ASC SEPARATOR ',') AS tag_names,
    locations_scene.title,
    locations_scene.img AS panorama_img,
    scene_hotspot.txt,
    scene_hotspot.pitch,
    scene_hotspot.yaw,
    scene_hotspot.sceneId AS target_id
    FROM locations
    INNER JOIN locations_img ON locations.id = locations_img.location_id
    INNER JOIN locations_tag ON locations.id = locations_tag.location_id
    INNER JOIN locations_scene ON locations.id = locations_scene.location_id
    INNER JOIN scene_hotspot ON scene_hotspot.id = scene_hotspot.scene_id
    WHERE 
    locations.status = 1
    AND
    locations.isAccessable = 1
    AND
    locations_img.status = 1
    AND
    locations_tag.status = 1
    $querySearch
    $queryType
    $tagsClause
    GROUP BY locations.id
    $queryLimit
    ;";
    $stmt = $conn->prepare(query: $query);
    if ($_POST['location_search'] !== "") {
        $stmt->bindParam(':location_search', $location_search);
    }
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        "status" => true,
        "data" => $data
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}
