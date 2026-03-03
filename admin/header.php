<?php
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globe Hop</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/image/fav.png" type="image/png">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <header class="header">
        <div class="container">

            <div class="logo">
                Globe Hop
            </div>

            <ul class="menu" id="menu">
                <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i> Dashboard</a></li>
                <li><a href="#"><i class="fa-solid fa-circle-question"></i> Enquiry</a></li>

                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa-solid fa-location-dot"></i> Destination
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu"> -->
                <li><a href="view_destination.php"><i class="fa-solid fa-location-dot"></i> Destination</a></li>
                <!-- </ul>
                </li> -->
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa-solid fa-arrows-turn-to-dots"></i> Itinerary
                        <i class="fa-solid fa-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu"> -->
                <li><a href="view_itineraries.php"><i class="fa-solid fa-arrows-turn-to-dots"></i> Itinerary</a></li>
                <!-- </ul>
                </li> -->

                <li><a href="contact_enquiries.php"><i class="fa-solid fa-envelope"></i> Contact</a></li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a></li>

            </ul>

            <div class="menu-toggle" id="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </div>

        </div>
    </header>

    <script>
        document.addEventListener("DOMContentLoaded", function () {

            const menuToggle = document.getElementById("menu-toggle");
            const menu = document.getElementById("menu");

            menuToggle.addEventListener("click", function () {
                menu.classList.toggle("active");

                if (menu.classList.contains("active")) {
                    menuToggle.innerHTML = '<i class="fa-solid fa-xmark"></i>';
                } else {
                    menuToggle.innerHTML = '<i class="fa-solid fa-bars"></i>';
                }
            });

            const dropdownToggles = document.querySelectorAll(".dropdown-toggle");

            dropdownToggles.forEach(function (toggle) {
                toggle.addEventListener("click", function (e) {
                    e.preventDefault();
                    this.parentElement.classList.toggle("active");
                });
            });

        });
    </script>

</body>

</html>