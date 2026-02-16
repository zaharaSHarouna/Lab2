<?php
header("Content-Type: application/json");
include "../database.php";
$id = $_POST['id'] ?? null;
if (!$id) {
    echo json_encode(["success" => false, "error" => "Missing required ID"]);
    exit();
}
$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Record deleted successfully"
    ]);
} else {
    echo json_encode(["success" => false, "error" => "Deleting record failed"
    ]);
}
$conn->close();
?>