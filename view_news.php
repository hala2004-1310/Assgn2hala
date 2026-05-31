<?php
session_start();
require 'config.php';
include 'menu.php'; 

try {
    $stmt = $conn->prepare("SELECT * FROM news WHERE status = 'active'");
    $stmt->execute();
    $news_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View All News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>All News</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Details</th>
            <th>Image</th>
            <th>Actions</th> 
        </tr>
        <?php foreach($news_list as $row) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['title']); ?></td>
            <td><?php echo htmlspecialchars($row['details']); ?></td>
            <td>
                <img src="<?php echo htmlspecialchars($row['image']); ?>" width="100" height="100" alt="News Image">
            </td>
            <td>
                <a href="edit_news.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                <a href="delete_news.php?id=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>