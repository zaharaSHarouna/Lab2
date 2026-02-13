<?php
header("Content-Type: application/json");
include "../database.php";
$name = $_POST['name'] ?? null;
$phone = $_POST['phone'] ?? null;
$email = $_POST['email'] ?? null;
if (!$name || !$phone || !$email) {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit();
}
$sql = "INSERT INTO students (name, phone, email) VALUES ('$name', '$phone', '$email')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $name, $phone);
if ($stmt->execute()) {
    echo json_encode(["success" => true, "data"=>["id" => $conn->insert_id, "name" => $name, "phone" => $phone, "email" => $email]
    ]);

} else {
    echo json_encode(["success" => false, "error" => "Insertion failed"
    ]);
}
$conn->close();
?>