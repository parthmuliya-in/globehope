<?php
require '../include/config.php'; // adjust path if needed
include "header.php";
// ===== DELETE SINGLE =====
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM contact_enquiries WHERE id = $id");
    header("Location: admin-contact-enquiries.php");
    exit;
}

// ===== DELETE MULTIPLE =====
if (isset($_POST['delete_selected']) && !empty($_POST['selected_ids'])) {

    $ids = $_POST['selected_ids'];
    $safe_ids = array_map('intval', $ids);
    $id_list = implode(",", $safe_ids);

    mysqli_query($conn, "DELETE FROM contact_enquiries WHERE id IN ($id_list)");

    header("Location: admin-contact-enquiries.php");
    exit;
}

// ===== FETCH DATA =====
$result = mysqli_query($conn, "SELECT * FROM contact_enquiries ORDER BY created_at DESC");
?>
<!-- 
<!DOCTYPE html>
<html> -->

<!-- <head> -->
<title>Contact Enquiries</title>
<link rel="stylesheet" href="assets/css/style.css">
<!-- </head> -->

<!-- <body> -->

<h2 class="page-title">Contact Enquiries</h2>

<div class="table-container">
    <div class="responsive-table">

        <form method="POST">

            <button type="submit" name="delete_selected" class="btn-primary"
                onclick="return confirm('Delete selected records?')">
                Delete Selected
            </button>

            <br><br>

            <table>
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select_all"></th>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Category</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td data-label="Select">
                                <input type="checkbox" name="selected_ids[]" value="<?= $row['id'] ?>">
                            </td>

                            <td data-label="ID">
                                <?= $row['id'] ?>
                            </td>
                            <td data-label="Name">
                                <?= htmlspecialchars($row['full_name']) ?>
                            </td>
                            <td data-label="Email">
                                <?= htmlspecialchars($row['email']) ?>
                            </td>
                            <td data-label="Phone">
                                <?= htmlspecialchars($row['phone']) ?>
                            </td>
                            <td data-label="Category">
                                <?= htmlspecialchars($row['travel_category']) ?>
                            </td>
                            <td data-label="Message">
                                <?= htmlspecialchars($row['message']) ?>
                            </td>
                            <td data-label="Date">
                                <?= $row['created_at'] ?>
                            </td>

                            <td data-label="Action" class="action-cell">
                                <a href="?delete=<?= $row['id'] ?>" class="icon-btn delete-btn"
                                    onclick="return confirm('Delete this record?')">
                                    🗑
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </form>

    </div>
</div>

<script>
    // Select All Checkbox
    document.getElementById("select_all").addEventListener("click", function () {
        let checkboxes = document.querySelectorAll("input[name='selected_ids[]']");
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>

<!-- </body>

</html> -->