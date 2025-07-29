<?php
header('Content-Type: application/json');
include "../lib/conn.php";
include "../lib/key.php";
require_once __DIR__ . '/../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        //GENERATE TOKEN FOR VISITED USER
        // JWT payload
        $payload = [
            "iss" => "", //domain
            "aud" => "", //domain
            "iat" => time(),
            "exp" =>  time() + 1800, // 30 minutes expiration
            "data" => [
                "isVisited" => true,
            ]
        ];

        // Encode the token
        $jwt = JWT::encode($payload, $key, 'HS256');

        // Set JWT as HTTP-only cookie
        setcookie(
            "visit_token",       // cookie name
            $jwt,                 // JWT token
            //time() + 1800,   30 minutes expiration
            time() + 3600,
            "/",                  // path
            "",                   // domain (current)
            false,                // secure (true if using HTTPS)
            true                  // httponly
        );


        //INSERT VISITOR
        $decoded = JWT::decode($_COOKIE['token'], new Key($key, 'HS256'));
        $location_id = $_POST['location_id'];
        $visit_purpose = $_POST['visit_purpose'];
        $destination = $_POST['destination'];
        $fname = $decoded->data->fname;
        $lname = $decoded->data->lname;
        $phone_num = $decoded->data->phoneNum;
        $province = $decoded->data->province;
        $city = $decoded->data->city;
        $brgy = $decoded->data->brgy;
        $street = $decoded->data->street;

        $query = "INSERT INTO visitors 
        (location_id, destination, visit_purpose, fname, lname, phone_num, province, city, brgy, street)
        VALUES 
        (:location_id, :destination, :visit_purpose, :fname, :lname, :phone_num, :province, :city, :brgy, :street)
        ;";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':location_id', $location_id);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':visit_purpose', $visit_purpose);
        $stmt->bindParam(':fname', $fname);
        $stmt->bindParam(':lname', $lname);
        $stmt->bindParam(':phone_num', $phone_num);
        $stmt->bindParam(':province', $province);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':brgy', $brgy);
        $stmt->bindParam(':street', $street);
        $stmt->execute();

        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => $e->getMessage()
        ]);
    }
}
