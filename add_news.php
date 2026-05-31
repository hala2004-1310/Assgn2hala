<?php
session_start();
require 'config.php';
include 'menu.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}


$stmt = $conn->query("SELECT * FROM categories");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $details = $_POST['details'];
    $cat_id = (int)$_POST['category_id'];
    $user_id = $_SESSION['user_id']; 

    
    $image_name = $_FILES['news_image']['name'];
    $image_tmp = $_FILES['news_image']['tmp_name'];
    $upload_dir = "الصور";
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
    
    $image_path = $upload_dir . time() . "_" . preg_replace("/[^a-zA-Z0-9.]/", "", $image_name);

    if (move_uploaded_file($image_tmp, $image_path)) {
        $sql = "INSERT INTO news (title, details, category_id, user_id, image, status) 
                VALUES (:title, :details, :cat_id, :user_id, :image, 'active')";
        
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([
            ':title' => $title,
            ':details' => $details,
            ':cat_id' => $cat_id,
            ':user_id' => $user_id,
            ':image' => $image_path
        ])) {
            echo "<p style='color:green; text-align:center;'>News added successfully!</p>";
        } else {
            echo "<p style='color:red;'>Error saving to database.</p>";
        }
    } else {
        echo "<p style='color:red;'>Failed to upload image.</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add News</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Add New News</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <label>News Title:</label><br>
        <input type="text" name="title" required><br><br>
        
        <label>Select Category:</label><br>
        <select name="category_id" required>
            <?php foreach($categories as $cat) { ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label>Image:</label><br>
        <input type="file" name="news_image" accept="image/*" required><br><br>

        <label>Details:</label><br>
        <textarea name="details" rows="5" required></textarea><br><br>
        
        <button type="submit" name="submit">Add News</button>
    </form>
</div>
<script>
    const imageInput = document.querySelector('input[name="news_image"]');
    const preview = document.createElement('img');
    preview.style.maxWidth = '200px';
    preview.style.marginTop = '10px';
    imageInput.parentNode.appendChild(preview);

    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) { preview.src = e.target.result; }
            reader.readAsDataURL(file);
        }
    });
</script>
</body>
</html>