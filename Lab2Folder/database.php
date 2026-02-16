<?php
$host = "localhost";
$username = "zahara.harouna";
$password = "student2026";
$database = "mobileapps_2026B_zahara_harouna";

$conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        echo json_encode(["success" => false, 
        "error" => "Database Connection failed: "
        ]);
        exit();
    }
?>
