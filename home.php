<?php
include 'db_connection.php'; // Include the database connection

// Fetch all categories
$query = "SELECT * FROM Categories";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$categories = [];
while ($row = $result->fetch_assoc()) {
    $categories[] = $row; // Add each category to the array
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Categories</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Business Categories</h1>
    <ul>
        <?php foreach ($categories as $category): ?>
            <li>
                <a href="categories.php?category_id=<?php echo $category['id']; ?>">
                    <?php echo htmlspecialchars($category['name']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
