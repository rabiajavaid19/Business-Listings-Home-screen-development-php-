<?php
include 'db_connection.php';

$sub_category_id = intval($_GET['sub_category_id']);
$query = "SELECT * FROM Businesses WHERE sub_category_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $sub_category_id);
$stmt->execute();

$result = $stmt->get_result();
$businesses = [];
while ($row = $result->fetch_assoc()) {
    $businesses[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Businesses</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Businesses</h1>
    <ul>
        <?php foreach ($businesses as $business): ?>
            <li>
                <a href="business_detail.php?business_id=<?php echo $business['id']; ?>">
                    <h3><?php echo htmlspecialchars($business['name']); ?></h3>
                    <p><?php echo htmlspecialchars($business['description']); ?></p>
                    <p>Price Range: <?php echo htmlspecialchars($business['price_range']); ?></p>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
