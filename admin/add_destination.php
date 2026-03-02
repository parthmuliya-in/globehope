<?php
require '../include/config.php';
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title   = trim($_POST['title']);
    $alt_tag = trim($_POST['alt_tag']);

    if (empty($title) || empty($alt_tag) || empty($_FILES['image']['name'])) {
        die("All fields are required.");
    }

    $image_name = basename($_FILES['image']['name']); // Keep original name
    $target_dir = "../destination/";
    $target_file = $target_dir . $image_name;

    // Validate extension
    $allowed = ['jpg','jpeg','png','webp'];
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Only JPG, JPEG, PNG, WEBP allowed.");
    }

    // Check file already exists
    if (file_exists($target_file)) {
        die("Image already exists. Rename manually before upload.");
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

        $stmt = mysqli_prepare($conn, 
            "INSERT INTO destinations (title, image, alt_tag) VALUES (?, ?, ?)"
        );
        mysqli_stmt_bind_param($stmt, "sss", $title, $image_name, $alt_tag);
        mysqli_stmt_execute($stmt);

        echo "Destination added successfully!";
    } else {
        echo "Upload failed.";
    }
}
?>

<!-- <form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Destination Title" required><br><br>
    <input type="text" name="alt_tag" placeholder="Alt Tag" required><br><br>
    <input type="file" name="image" required><br><br>
    <button type="submit">Add Destination</button>
</form>  -->
<link rel="stylesheet" href="assets/css/style.css">

<div class="destination-wrapper">

    <h2 class="page-title">Add Destination</h2>

    <form class="destination-form" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Destination Title</label>
            <input type="text" name="title" required>
        </div>

        <div class="form-group">
            <label>Alt Tag</label>
            <input type="text" name="alt_tag" required>
        </div>

        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="image" required>
        </div>

        <button type="submit" class="btn-primary">Add Destination</button>

    </form>
</div>