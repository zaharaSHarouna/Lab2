<?php
header("Content-Type: application/json");
include "../database.php";
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode(["success" => true, "data" => $data
]);
$conn->close();
?>