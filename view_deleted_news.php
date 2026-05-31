<?php
session_start();
require 'config.php'; 
include 'menu.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
try {
    $stmt = $conn->prepare("SELECT * FROM news WHERE status = 'deleted'");
    $stmt->execute();
    $news_list = $stmt->fetchAll(PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deleted News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Deleted News</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Details</th>
            </tr>
            <?php 
          
            foreach ($news_list as $row) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['title']); ?></td>
                    <td><?php echo htmlspecialchars($row['details']); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>