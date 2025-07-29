<?php
header('Content-Type: application/json');
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_FILES['location_img']['name'][0])) {
        foreach ($_FILES['location_img']['name'] as $key => $name) {
            $tmp_name = $_FILES['location_img']['tmp_name'][$key];
            $file_size = $_FILES['location_img']['size'][$key];
            $file_type = $_FILES['location_img']['type'][$key];
            $pathToFolder = "../assets/img/location-img/" . basename($name);

            // Check file size (5MB max)
            if ($file_size > 5 * 1024 * 1024) {
                die(json_encode([
                    "status" => false,
                    "message" => "File size exceeds 5MB limit."
                ]));
            }

            // Check file type
            $allowed_types = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!in_array($file_type, $allowed_types)) {
                die(json_encode([
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
        }
    }
    if ((empty($_POST['location_tag'][0]) || !isset($_POST['location_tag'][0])) &&  count($_POST['location_tag']) < 3) {
        die(json_encode([
            "status" => false,
            "message" => "Please put location tags."
        ]));
    }

    $query = "INSERT INTO locations (location_name, location_desc, location_type) VALUES (:location_name, :location_desc, :location_type)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':location_name', $_POST['location_name']);
    $stmt->bindParam(':location_desc', $_POST['desc']);
    $stmt->bindParam(':location_type', $_POST['location_type']);
    $stmt->execute();

    $lastInsertId = $conn->lastInsertId();

    foreach ($_FILES['location_img']['name'] as $key => $name) {
        $pathToDb = "./assets/img/location-img/" . basename($name);
        $query2 = "INSERT INTO locations_img (location_id, img) VALUES (:location_id, :img)";
        $stmt2 = $conn->prepare($query2);
        $stmt2->bindParam(':location_id', $lastInsertId);
        $stmt2->bindParam(':img', $pathToDb);
        $stmt2->execute();
    }

    foreach ($_POST['location_tag'] as $tag) {
        $tag_name = trim($tag);
        $query3 = "INSERT INTO locations_tag (location_id, tag_name) VALUES (:location_id, :tag_name)";
        $stmt3 = $conn->prepare($query3);
        $stmt3->bindParam(':location_id', $lastInsertId);
        $stmt3->bindParam(':tag_name', $tag_name);
        $stmt3->execute();
    }

    echo json_encode([
        "status" => true,
    ]);
}