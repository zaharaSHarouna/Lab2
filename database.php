<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "student_api";

$conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        echo json_encode(["success" => false, 
        "error" => "Database Connection failed: "
        ]);
        exit();
    }
    ?>
