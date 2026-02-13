<?php
header("Content-Type: application/json");
include "../database.php";
$id = $_GET['id'] ?? null;
if (!$id) {
    echo json_encode(["success" => false, "error" => "Missing required ID"]);
    exit();
}
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode(["success" => true, "data" => $data
    ]);
} else {
    echo json_encode(["success" => false, "error" => "Record not found"
    ]);
}
$conn->close();
?>