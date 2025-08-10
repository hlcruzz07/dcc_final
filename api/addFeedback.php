<?php
header('Content-Type: application/json');
include "../lib/conn.php";


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    try {
        $email = $_POST['email'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $message = $_POST['message'];

        $query = "INSERT INTO feedback (email,fname,lname,message) VALUES (:email,:fname,:lname,:message);";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":fname", $fname);
        $stmt->bindParam(":lname", $lname);
        $stmt->bindParam(":message", $message);
        $stmt->execute();


        echo json_encode([
            "status" => true,
        ]);
    } catch (PDOException $e) {
        echo json_encode([
            "status" => false,
            "message" => "Something went wrong: " . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        "status" => false,
        "message" => "Invalid HTTP Request"
    ]);
}
