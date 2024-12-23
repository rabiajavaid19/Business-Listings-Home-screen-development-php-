<?php
include 'db_connection.php';

$category_id = intval($_GET['category_id']); // Get category ID from URL
$query = "SELECT * FROM SubCategories WHERE category_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $category_id);
$stmt->execute();

$result = $stmt->get_result();
$subcategories = [];
while ($row = $result->fetch_assoc()) {
    $subcategories[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Subcategories</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Subcategories</h1>
    <ul>
        <?php foreach ($subcategories as $subcategory): ?>
            <li>
                <a href="businesses.php?sub_category_id=<?php echo $subcategory['id']; ?>">
                    <?php echo htmlspecialchars($subcategory['name']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
