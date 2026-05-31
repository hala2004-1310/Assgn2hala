<?php
require 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE news SET status = 'deleted' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: view_news.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>