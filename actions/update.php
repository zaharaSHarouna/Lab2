<?php
header("Content-Type: application/json");
include "../database.php";
$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? null;
$phone = $_POST['phone'] ?? null;
$email = $_POST['email'] ?? null;
if (!$id || !$name || !$phone || !$email) {
    echo json_encode(["success" => false, "error" => "Missing required fields"]);
    exit();
}
$stmt = $conn->prepare("UPDATE students SET name = ?, phone = ?, email = ? WHERE id = ?");
$stmt->bind_param("sssi", $name, $phone, $email, $id);
if ($stmt->execute()) {
    echo json_encode(["success" => true, "data"=>["id" => $id, "name" => $name, "phone" => $phone, "email" => $email]
    ]);
} else {
    echo json_encode(["success" => false, "error" => "Update record failed"
    ]);
}
$conn->close();
?>  