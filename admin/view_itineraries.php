<?php
require '../include/config.php';
include "header.php";

$query = "
SELECT i.*, d.title AS destination_name 
FROM itineraries i
LEFT JOIN destinations d ON i.destination_id = d.id
ORDER BY i.id DESC
";

$result = mysqli_query($conn, $query);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/style.css">

<div style="display:flex; justify-content:space-between; align-items:center; width:95%; margin:30px auto 27px;">
    <h2 class="page-title" style="margin:0;">View Itineraries</h2>

    <!-- ADD DESTINATION BUTTON -->
    <a href="add_itinerary1.php"
        style="background:#cb5626; color:#fff; padding:10px 18px; border-radius:6px; text-decoration:none; font-weight:600; transition:0.3s;">
        <i class="fa-solid fa-plus"></i> Add Itineraries
    </a>
</div>
<div class="table-container">

    <div class="responsive-table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Destination</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td data-label="ID"><?php echo $row['id']; ?></td>

                        <td data-label="Destination">
                            <?php echo htmlspecialchars($row['destination_name']); ?>
                        </td>

                        <td data-label="Image">
                            <img src="../itineraries/<?php echo $row['image']; ?>" class="table-img">
                        </td>

                        <td data-label="Title">
                            <?php echo htmlspecialchars($row['title']); ?>
                        </td>

                        <td data-label="Duration">
                            <?php echo htmlspecialchars($row['tour_duration']); ?>
                        </td>

                        <td data-label="Price">
                            ₹ <?php echo number_format($row['starting_price'], 2); ?>
                        </td>

                        <td data-label="Action" class="action-cell">

                            <a href="edit_itinerary.php?id=<?php echo urlencode($row['id']); ?>" class="icon-btn edit-btn"
                                title="Edit">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="delete_itinerary.php?id=<?php echo urlencode($row['id']); ?>"
                                class="icon-btn delete-btn" title="Delete"
                                onclick="return confirm('Are you sure you want to delete this itinerary?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>