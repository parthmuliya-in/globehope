<?php
require __DIR__ . '../include/config.php';

if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    if ($id > 0) {

        mysqli_query($conn, "DELETE FROM itinerary_days WHERE itinerary_id = $id");
        mysqli_query($conn, "DELETE FROM inclusions WHERE itinerary_id = $id");
        mysqli_query($conn, "DELETE FROM exclusions WHERE itinerary_id = $id");
        mysqli_query($conn, "DELETE FROM related_itineraries WHERE itinerary_id = $id");
        mysqli_query($conn, "DELETE FROM itinerary_categories WHERE itinerary_id = $id");
        mysqli_query($conn, "DELETE FROM itinerary_types WHERE itinerary_id = $id");

        mysqli_query($conn, "DELETE FROM itineraries WHERE id = $id");
    }
}

header("Location: view_itineraries.php");
exit;
?>