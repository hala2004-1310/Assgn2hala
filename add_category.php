<?php
session_start();
require 'config.php';
include 'menu.php';

if (isset($_POST['add'])) {
    $cat_name = $_POST['cat_name']; 
    
    $sql = "INSERT INTO categories (category_name) VALUES ('$cat_name')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<p style='text-align:center; color:green;'>Category added successfully!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css"> 
    <title>Add Category</title>
</head>
<body>

    <div class="container">
        <form method="POST">
            <h2>Add New Category</h2>
            <input type="text" name="cat_name" placeholder="Category Name" required>
            <button type="submit" name="add">Save Category</button>
        </form>
    </div>

</body>
</html>