<?php
require 'db.php';

$sql = "SELECT * FROM notices ORDER BY id DESC";
$result = $conn->query($sql);

$notices = [];

while ($row = $result->fetch_assoc()) {
    $notices[] = $row;
}

header('Content-Type: application/json');
echo json_encode($notices);
?>