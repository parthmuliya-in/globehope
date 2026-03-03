<?php
include '../include/config.php';
include "header.php";

// Fetch Counts
$total_dest = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM destinations"));
$total_itinerary = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM itineraries"));
$total_category = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM travel_categories"));
$total_types = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM travel_types"));
$total_enquiry = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM contact_enquiries"));

// Latest 5 enquiries
$enquiries = mysqli_query($conn, "SELECT * FROM contact_enquiries ORDER BY id DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* Dashboard Title */
        .dashboard-title {
            text-align: center;
            color: #fff;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        /* Cards */
        .cards {
            padding: 20PX;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            color: #222;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            font-size: 14px;
            margin-bottom: 10px;
            opacity: 0.9;
        }

        .card p {
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <!-- <div class="dashboard-title">Admin Dashboard Overview</div> -->

    <!-- STAT CARDS -->
    <div class="cards">
        <div class="card">
            <h3>Total Destinations</h3>
            <p><?php echo $total_dest; ?></p>
        </div>

        <div class="card">
            <h3>Total Itineraries</h3>
            <p><?php echo $total_itinerary; ?></p>
        </div>

        <div class="card">
            <h3>Travel Categories</h3>
            <p><?php echo $total_category; ?></p>
        </div>

        <div class="card">
            <h3>Travel Types</h3>
            <p><?php echo $total_types; ?></p>
        </div>

        <div class="card">
            <h3>Contact Enquiries</h3>
            <p><?php echo $total_enquiry; ?></p>
        </div>
    </div>

    <!-- ENQUIRY TABLE -->

    <div class="table-container">
        <h2 class="page-title">Contact Enquiries</h2>
        <div class="responsive-table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Category</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($enquiries)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['travel_category']; ?></td>
                            <td><?php echo substr($row['message'], 0, 40); ?>...</td>
                            <td><?php echo date("d M Y", strtotime($row['created_at'])); ?></td>
                            <td>
                                <button class="status-btn delete">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>