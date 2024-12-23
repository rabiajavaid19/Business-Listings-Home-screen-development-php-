<?php
include 'db_connection.php';

$business_id = intval($_GET['business_id']);
$query = "SELECT * FROM Businesses WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $business_id);
$stmt->execute();

$result = $stmt->get_result();
$business = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Business Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($business['name']); ?></h1>
    <p>Address: <?php echo htmlspecialchars($business['address']); ?></p>
    <p>Contact: <?php echo htmlspecialchars($business['contact_number']); ?></p>
    <p>Services: <?php echo htmlspecialchars($business['services']); ?></p>
    <p>Price Range: <?php echo htmlspecialchars($business['price_range']); ?></p>
</body>
</html>
