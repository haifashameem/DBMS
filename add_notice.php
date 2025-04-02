<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $category_name = $_POST['category'] ?? '';
    $date = $_POST['date'] ?? null;

    $sql = "INSERT INTO notices (title, content, category, date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        echo "Prepare failed: " . $conn->error;
        exit;
    }

    $stmt->bind_param("ssss", $title, $content, $category_name, $date);

    if ($stmt->execute()) {
        echo "Notice submitted successfully!";
    } else {
        echo "Error inserting: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>

