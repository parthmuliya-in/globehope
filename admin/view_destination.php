<?php
require '../include/config.php';
include "header.php";

$result = mysqli_query($conn, "SELECT * FROM destinations ORDER BY id DESC");
/* ======================
   SEARCH FUNCTIONALITY
====================== */

$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $search_safe = mysqli_real_escape_string($conn, $search);

    $query = "SELECT * FROM destinations 
              WHERE title LIKE '%$search_safe%' 
              OR alt_tag LIKE '%$search_safe%' 
              ORDER BY id DESC";
} else {
    $query = "SELECT * FROM destinations ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<div style="display:flex; justify-content:space-between; align-items:center; width:95%; margin:30px auto 27px;">
    <h2 class="page-title" style="margin:0;">View Destinations</h2>

    <!-- ADD DESTINATION BUTTON -->
    <a href="add_destination.php" 
       style="background:#cb5626; color:#fff; padding:10px 18px; border-radius:6px; text-decoration:none; font-weight:600; transition:0.3s;">
        <i class="fa-solid fa-plus"></i> Add Destination
    </a>
</div>


<div class="table-container">
    <div class="responsive-table">

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Alt Tag</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if(mysqli_num_rows($result) > 0) { ?>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td data-label="ID"><?php echo $row['id']; ?></td>

                            <td data-label="Image">
                                <img src="../destination/<?php echo $row['image']; ?>" 
                                     alt="<?php echo htmlspecialchars($row['alt_tag']); ?>" 
                                     class="table-img">
                            </td>

                            <td data-label="Title">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </td>

                            <td data-label="Alt Tag">
                                <?php echo htmlspecialchars($row['alt_tag']); ?>
                            </td>

                            <td data-label="Action" class="action-cell">
                                <a href="edit_destination.php?id=<?php echo $row['id']; ?>" 
                                   class="icon-btn edit-btn">
                                   <i class="fa-solid fa-pen"></i>
                                </a>

                                <a href="delete-destination.php?id=<?php echo $row['id']; ?>" 
                                   class="icon-btn delete-btn"
                                   onclick="return confirm('Are you sure you want to delete this destination?');">
                                   <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No Destinations Found</td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    </div>
</div>
