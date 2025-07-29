<?php
header("Content-type: application/json");
include "../lib/conn.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $id = $_POST['edit_location_id'];
        $img = "";
        $location_name = $_POST['edit_location_name'];
        $location_desc = $_POST['edit_location_desc'];
        $location_type = $_POST['edit_location_type'];


        $query = "UPDATE
        locations
        SET 
        location_name = :location_name,
        location_desc = :location_desc,
        location_type = :location_type
        WHERE
        id = :id
        ;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(":location_name", $location_name);
        $stmt->bindParam(":location_desc", $location_desc);
        $stmt->bindParam(":location_type", $location_type);
        $stmt->bindParam(":id", $id);
        if (!$stmt->execute()) {
            die(json_encode([
                "status" => false,
                "message" => "Updating Location Failed."
            ]));
        }

        if (!empty($_FILES['edit_location_img']['name'][0])) {
            foreach ($_FILES['edit_location_img']['name'] as $key => $name) {
                $tmp_name = $_FILES['edit_location_img']['tmp_name'][$key];
                $file_size = $_FILES['edit_location_img']['size'][$key];
                $file_type = $_FILES['edit_location_img']['type'][$key];
                $pathToFolder = "../assets/img/location-img/" . basename($name);
                $pathToDb = "./assets/img/location-img/" . basename($name);

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

                $query2 = "INSERT INTO locations_img (location_id, img) VALUES (:location_id, :img)";
                $stmt2 = $conn->prepare($query2);
                $stmt2->bindParam(':location_id', $id);
                $stmt2->bindParam(':img', $pathToDb);
                if (!$stmt2->execute()) {
                    die(json_encode([
                        "status" => false,
                        "message" => "Uploading New Images Failed."
                    ]));
                }
            }
        }

        if (!empty($_POST['edit_location_tag'][0])) {
            foreach ($_POST['edit_location_tag'] as $tag) {
                $tag_name = trim($tag);
                $query3 = "INSERT INTO locations_tag (location_id, tag_name) VALUES (:location_id, :tag_name)";
                $stmt3 = $conn->prepare($query3);
                $stmt3->bindParam(':location_id', $id);
                $stmt3->bindParam(':tag_name', $tag_name);
                if (!$stmt3->execute()) {
                    die(json_encode([
                        "status" => false,
                        "message" => "Adding Location Tag Failed"
                    ]));
                }
            }
        }
        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
}