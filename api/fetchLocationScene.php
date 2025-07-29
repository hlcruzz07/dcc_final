<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];

    $query = "SELECT 
        locations_scene.id as scene_id,
        locations_scene.title as scene_title,
        locations_scene.img as scene_img,
        scene_hotspot.pitch as hotspot_pitch,
        scene_hotspot.yaw as hotspot_yaw,
        scene_hotspot.txt as hotspot_txt,
        scene_hotspot.sceneId as hotspot_sceneId
    FROM locations_scene
    INNER JOIN scene_hotspot
    ON locations_scene.id = scene_hotspot.scene_id
    WHERE locations_scene.location_id = :id
    ORDER BY locations_scene.id ASC";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $scenes = [];

    foreach ($results as $row) {
        $scene_key = $row['scene_id']; // You can use $row['scene_title'] or create a slug if needed

        if (!isset($scenes[$scene_key])) {
            $scenes[$scene_key] = [
                'title' => $row['scene_title'],
                'type' => 'equirectangular',
                'panorama' => $row['scene_img'],
                'hotSpots' => []
            ];
        }

        $scenes[$scene_key]['hotSpots'][] = [
            'pitch' => floatval($row['hotspot_pitch']),
            'yaw' => floatval($row['hotspot_yaw']),
            'type' => isset($row['hotspot_sceneId']) ? 'scene' : 'info',
            'text' => $row['hotspot_txt'],
            'sceneId' => $row['hotspot_sceneId'] ?: null
        ];
    }

    echo json_encode([
        "status" => true,
        "scenes" => $scenes
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid request method."
    ]);
}