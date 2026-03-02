<?php
require '../include/config.php';

if(isset($_GET['id'])) {

    $id = intval($_GET['id']);

    // Get image name first
    $result = mysqli_query($conn, "SELECT image FROM destinations WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    if($row) {

        $image_path = "../destination/" . $row['image'];

        if(file_exists($image_path)) {
            unlink($image_path);
        }

        mysqli_query($conn, "DELETE FROM destinations WHERE id=$id");
    }

    header("Location: view-destination.php");
}
?>