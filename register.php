<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);
        echo "<div style='color:green;'>تم إنشاء الحساب بنجاح!</div>";
    } catch(PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "<div style='color:red;'>هذا البريد الإلكتروني مسجل مسبقاً!</div>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
   
    header("Location: login.php?msg=success"); 
    exit();
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="POST" action="">
            <h2>Create New Account</h2>
            <input type="text" name="name" placeholder="Enter name" required>
            <input type="email" name="email" placeholder="Enter email" required>
            <input type="password" name="password" placeholder="Enter password" required>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>