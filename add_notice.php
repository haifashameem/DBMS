<?php
include ("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $sql = "INSERT INTO notices (title, content, date_posted,category_id) VALUES ('$title', '$content', NOW(),$category_id)";
    
    if (mysqli_query($conn, $sql)) {
      header("Location: index.php"); // Redirect to the homepage
      exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>FORM</h2>
<form action= "add_notice.php" method="post">
   <input type="text" name="title" placeholder="Notice Title" required><br><br>
   <textarea name="content" placeholder="Notice Content"></textarea> <br><br>
   <input type="submit" name="add" value="Add Notice"><br><br>
   <label for="category">Select Category:</label>
   <select name="category_id" required>
       <option value="1">General</option>
       <option value="2">Events</option>
       <option value="3">Announcement</option></select>

  </form>
</body>
</html>