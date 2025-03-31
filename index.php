<?php 
  include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Campus Notice Board</title>
</head>
<body>
  <h1>NOTICE BOARD</h1>
  <a href="add_notice.php"><button>Add Notice</button></a><br><br>
  <form method="GET" action="index.php">
    <input type="text" name="search" placeholder="Search Notice">
    <input type="submit" value="Search">
    <select name="category">
       <option value="0">Select Category</option>
       <option value="1">General</option>
       <option value="2">Events</option>
       <option value="3">Announcement</option></select>
  </form>


</body>
</html>
<?php
include("db.php");
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";
$cat_filter = isset($_GET['category'])? intval($_GET['category']):0;
$sql = "SELECT n.*,c.category as category 
        FROM notices n join categories c on n.category_id=c.category_id";
$conditions = [];

if (!empty($search)) {
    $conditions[] = "(title LIKE '%$search%' OR content LIKE '%$search%')";
}

if ($cat_filter > 0) {
    $conditions[] = "n.category_id = $cat_filter";
}

// Add WHERE clause only if there are conditions
if (!empty($conditions)) {
  $sql .= " WHERE " . implode(" AND ", $conditions);
}
$sql.=" ORDER BY date_posted DESC";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='notice'>";
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<p>" . $row['content'] . "</p>";
    echo "<small>Posted on " . $row['date_posted'] . "</small>";
    echo "</div>";
}
?>
