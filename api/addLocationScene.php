<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['back_pitch']) && !isset($_POST['next_pitch']) && !isset($_POST['destination_text'])) {
        die(json_encode([
            "status" => false,
            "message" => "Scene Hotspots not found."
        ]));
    }

    if (isset($_POST['back_pitch']) && !isset($_POST['next_pitch']) && !isset($_POST['destination_text'])) {
        die(json_encode([
            "status" => false,
            "message" => "Only with Back hotspot is invalid"
        ]));
    }

    if (!isset($_POST['back_pitch']) && !isset($_POST['next_pitch']) && isset($_POST['destination_text'])) {
        die(json_encode([
            "status" => false,
            "message" => "Only with Destination hotspot is invalid"
        ]));
    }





    try {
        $file_name = $_FILES['scene_img']['name'];
        $tmp_name = $_FILES['scene_img']['tmp_name'];
        $file_size = $_FILES['scene_img']['size'];
        $file_type = $_FILES['scene_img']['type'];
        $pathToFolder = "../assets/img/scene-img/" . basename($file_name);
        $pathToDb = "./assets/img/scene-img/" . basename($file_name);
        // Check file size (15MB max)
        if ($file_size > 15 * 1024 * 1024) {
            die(json_encode([
                "status" => false,
                "message" => "File size exceeds 5MB limit."
            ]));
        }

        // Check file type
        $allowed_types = ['image/jpeg', 'image/jpg'];
        if (!in_array($file_type, $allowed_types)) {
            die(json_encode(value: [
                "status" => false,
                "message" => "Invalid file type. Only JPG and PNG are allowed."
            ]));
        }

        // Move the uploaded file to the destination folder
        if (!move_uploaded_file($tmp_name, $pathToFolder)) {
            die(json_encode([
                "status" => false,
                "message" => "Failed to upload image."
            ]));
        }

        $query = "INSERT INTO locations_scene (location_id, title, img) VALUES (:location_id, :title, :img)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':location_id', $_POST['location_id']);
        $stmt->bindParam(':title', $_POST['scene_title']);
        $stmt->bindParam(':img', $pathToDb);
        $stmt->execute();

        $lastInsertId = $conn->lastInsertId();

        //Hotspot Insertion
        if (!isset($_POST['back_pitch']) && isset($_POST['next_pitch']) && !isset($_POST['destination_text'])) {
            $txt = $_POST['next_text'];
            $pitch = $_POST['next_pitch'];
            $yaw = $_POST['next_yaw'];
            $sceneId = $lastInsertId + 1;
            $query2 = "INSERT INTO scene_hotspot (scene_id, txt, pitch, yaw, sceneId) VALUES (:scene_id, :txt, :pitch, :yaw, :sceneId);";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bindParam(":scene_id", $lastInsertId);
            $stmt2->bindParam(":txt", $txt);
            $stmt2->bindParam(":pitch", $pitch);
            $stmt2->bindParam(":yaw", $yaw);
            $stmt2->bindParam(":sceneId", $sceneId);
            $stmt2->execute();
        }

        if (isset($_POST['back_pitch']) && isset($_POST['next_pitch']) && !isset($_POST['destination_text'])) {

            $back_text = $_POST['back_text'];
            $back_pitch = $_POST['back_pitch'];
            $back_yaw = $_POST['back_yaw'];
            $back_sceneId = $lastInsertId - 1;

            $query2 = "INSERT INTO scene_hotspot (scene_id, txt, pitch, yaw, sceneId) VALUES (:scene_id, :txt, :pitch, :yaw, :sceneId);";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bindParam(":scene_id", $lastInsertId);
            $stmt2->bindParam(":txt", $back_text);
            $stmt2->bindParam(":pitch", $back_pitch);
            $stmt2->bindParam(":yaw", $back_yaw);
            $stmt2->bindParam(":sceneId", $back_sceneId);
            $stmt2->execute();


            $next_text = $_POST['next_text'];
            $next_pitch = $_POST['next_pitch'];
            $next_yaw = $_POST['next_yaw'];
            $next_sceneId = $lastInsertId + 1;

            $query3 = "INSERT INTO scene_hotspot (scene_id, txt, pitch, yaw, sceneId) VALUES (:scene_id, :txt, :pitch, :yaw, :sceneId);";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bindParam(":scene_id", $lastInsertId);
            $stmt3->bindParam(":txt", $next_text);
            $stmt3->bindParam(":pitch", $next_pitch);
            $stmt3->bindParam(":yaw", $next_yaw);
            $stmt3->bindParam(":sceneId", $next_sceneId);
            $stmt3->execute();
        }

        if (isset($_POST['back_pitch']) && !isset($_POST['next_pitch']) && isset($_POST['destination_text'])) {
            $back_text = $_POST['back_text'];
            $back_pitch = $_POST['back_pitch'];
            $back_yaw = $_POST['back_yaw'];
            $back_sceneId = $lastInsertId - 1;

            $query2 = "INSERT INTO scene_hotspot (scene_id, txt, pitch, yaw, sceneId) VALUES (:scene_id, :txt, :pitch, :yaw, :sceneId);";
            $stmt2 = $conn->prepare($query2);
            $stmt2->bindParam(":scene_id", $lastInsertId);
            $stmt2->bindParam(":txt", $back_text);
            $stmt2->bindParam(":pitch", $back_pitch);
            $stmt2->bindParam(":yaw", $back_yaw);
            $stmt2->bindParam(":sceneId", $back_sceneId);
            $stmt2->execute();


            $destination_text = $_POST['destination_text'];
            $destination_pitch = $_POST['destination_pitch'];
            $destination_yaw = $_POST['destination_yaw'];

            $query3 = "INSERT INTO scene_hotspot (scene_id, txt, pitch, yaw) VALUES (:scene_id, :txt, :pitch, :yaw);";
            $stmt3 = $conn->prepare($query3);
            $stmt3->bindParam(":scene_id", $lastInsertId);
            $stmt3->bindParam(":txt", $destination_text);
            $stmt3->bindParam(":pitch", $destination_pitch);
            $stmt3->bindParam(":yaw", $destination_yaw);
            $stmt3->execute();


            $query4 = "UPDATE locations SET isAccessable = 1, isComplete = 1 WHERE id = :id;";
            $stmt4 = $conn->prepare($query4);
            $stmt4->bindParam(":id", $_POST['location_id']);
            $stmt4->execute();
        }

        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => true,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}
