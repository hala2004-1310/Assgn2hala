<?php
session_start();
require 'config.php';
include 'menu.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $details = $_POST['details'];
    
    $sql_update = "UPDATE news SET title='$title', details='$details' WHERE id='$id'";
    mysqli_query($conn, $sql_update);
    header("Location: view_news.php"); 
}
?>


<form method="POST">
    <input type="text" name="title" value="<?php echo $row['title']; ?>">
    <textarea name="details"><?php echo $row['details']; ?></textarea>
    <button type="submit" name="update">Update News</button>
</form>