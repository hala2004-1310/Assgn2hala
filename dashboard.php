<?php
session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Welcome to Dashboard, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
        <p>This is your control panel.</p>
        
        <div class="dashboard-info">
            <p>You can manage your categories and news from the menu above.</p>
        </div>
    </div>

</body>
</html>