<?php
require '../include/config.php';
include "header.php";

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Destination ID");
}

$id = intval($_GET['id']);

/* =========================
   FETCH EXISTING DATA
========================= */
$result = mysqli_query($conn, "SELECT * FROM destinations WHERE id = $id");

if (mysqli_num_rows($result) == 0) {
    die("Destination not found");
}

$row = mysqli_fetch_assoc($result);

/* =========================
   UPDATE DATA
========================= */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title   = trim($_POST['title']);
    $alt_tag = trim($_POST['alt_tag']);

    if (empty($title) || empty($alt_tag)) {
        die("All fields are required.");
    }

    $image_name = $row['image']; // default old image

    /* Check if new image uploaded */
    if (!empty($_FILES['image']['name'])) {

        $new_image = basename($_FILES['image']['name']);
        $target_dir = "../destination/";
        $target_file = $target_dir . $new_image;

        $allowed = ['jpg','jpeg','png','webp'];
        $ext = strtolower(pathinfo($new_image, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            die("Only JPG, JPEG, PNG, WEBP allowed.");
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {

            // Delete old image
            $old_path = $target_dir . $row['image'];
            if (file_exists($old_path)) {
                unlink($old_path);
            }

            $image_name = $new_image;
        }
    }

    $stmt = mysqli_prepare($conn, 
        "UPDATE destinations SET title=?, image=?, alt_tag=? WHERE id=?"
    );
    mysqli_stmt_bind_param($stmt, "sssi", $title, $image_name, $alt_tag, $id);
    mysqli_stmt_execute($stmt);

    echo "<script>
            alert('Destination Updated Successfully!');
            window.location.href='view-destination.php';
          </script>";
}
?>

<link rel="stylesheet" href="assets/css/style.css">

<div class="destination-wrapper">

    <h2 class="page-title">Edit Destination</h2>

    <form class="destination-form" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label>Destination Title</label>
            <input type="text" name="title" 
                   value="<?php echo htmlspecialchars($row['title']); ?>" required>
        </div>

        <div class="form-group">
            <label>Alt Tag</label>
            <input type="text" name="alt_tag" 
                   value="<?php echo htmlspecialchars($row['alt_tag']); ?>" required>
        </div>

        <div class="form-group">
            <label>Current Image</label><br>
            <img src="../destination/<?php echo $row['image']; ?>" 
                 style="width:120px; height:90px; object-fit:cover; border-radius:6px; border:2px solid #cb5626;">
        </div>

        <div class="form-group">
            <label>Change Image (Optional)</label>
            <input type="file" name="image">
        </div>

        <button type="submit" class="btn-primary">
            Update Destination
        </button>

    </form>
</div>
