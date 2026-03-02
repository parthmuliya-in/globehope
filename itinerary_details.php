<?php
require 'include/config.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid itinerary.");
}

$itinerary_id = intval($_GET['id']);


// ==========================
// Fetch Main Itinerary
// ==========================
$stmt = mysqli_prepare($conn, "
    SELECT i.*, d.title AS destination_name
    FROM itineraries i
    JOIN destinations d ON i.destination_id = d.id
    WHERE i.id = ?
");
mysqli_stmt_bind_param($stmt, "i", $itinerary_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$itinerary = mysqli_fetch_assoc($result);

if (!$itinerary) {
    die("Itinerary not found.");
}


// ==========================
// Fetch Days
// ==========================
$days = mysqli_query($conn, "
    SELECT * FROM itinerary_days 
    WHERE itinerary_id = $itinerary_id
    ORDER BY id ASC
");


// ==========================
// Fetch Inclusions
// ==========================
$inclusions = mysqli_query($conn, "
    SELECT * FROM inclusions 
    WHERE itinerary_id = $itinerary_id
");


// ==========================
// Fetch Exclusions
// ==========================
$exclusions = mysqli_query($conn, "
    SELECT * FROM exclusions 
    WHERE itinerary_id = $itinerary_id
");


// ==========================
// Fetch Categories
// ==========================
$categories = mysqli_query($conn, "
    SELECT tc.name 
    FROM itinerary_categories ic
    JOIN travel_categories tc ON ic.category_id = tc.id
    WHERE ic.itinerary_id = $itinerary_id
");


// ==========================
// Fetch Types
// ==========================
$types = mysqli_query($conn, "
    SELECT tt.name 
    FROM itinerary_types it
    JOIN travel_types tt ON it.type_id = tt.id
    WHERE it.itinerary_id = $itinerary_id
");


// ==========================
// Fetch Related Destinations
// ==========================
// $related = mysqli_query($conn, "
//     SELECT d.title 
//     FROM related_destinations rd
//     JOIN destinations d ON rd.related_destination_id = d.id
//     WHERE rd.itinerary_id = $itinerary_id
// ");
$related = mysqli_query($conn, "
    SELECT d.id, d.title, d.image 
    FROM related_destinations rd
    JOIN destinations d ON rd.related_destination_id = d.id
    WHERE rd.itinerary_id = $itinerary_id
");
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($itinerary['title']); ?></title>
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        h2 {
            margin-top: 40px;
        }

        ul {
            padding-left: 20px;
        }

        img {
            max-width: 500px;
        }
    </style>
</head>

<body>

    <h1><?php echo htmlspecialchars($itinerary['title']); ?></h1>

    <p><strong>Destination:</strong>
        <?php echo htmlspecialchars($itinerary['destination_name']); ?>
    </p>

    <img src="itineraries/<?php echo htmlspecialchars($itinerary['image']); ?>" alt="Itinerary Image">

    <!-- ================= Overview ================= -->
    <h2>Overview</h2>
    <?php
    $overview_points = explode(" | ", $itinerary['overview']);
    echo "<ul>";
    foreach ($overview_points as $point) {
        echo "<li>" . htmlspecialchars($point) . "</li>";
    }
    echo "</ul>";
    ?>

    <!-- ================= Travel Categories ================= -->
    <h2>Travel Categories</h2>
    <ul>
        <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
            <li><?php echo htmlspecialchars($cat['name']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Travel Types ================= -->
    <h2>Travel Types</h2>
    <ul>
        <?php while ($type = mysqli_fetch_assoc($types)) { ?>
            <li><?php echo htmlspecialchars($type['name']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Days ================= -->
    <h2>Itinerary Details</h2>
    <?php while ($day = mysqli_fetch_assoc($days)) { ?>
        <h3><?php echo htmlspecialchars($day['day_title']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($day['description'])); ?></p>
    <?php } ?>

    <!-- ================= Inclusions ================= -->
    <h2>Inclusions</h2>
    <ul>
        <?php while ($inc = mysqli_fetch_assoc($inclusions)) { ?>
            <li><span>✔</span><?php echo htmlspecialchars($inc['inclusion']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Exclusions ================= -->
    <h2>Exclusions</h2>
    <ul>
        <?php while ($exc = mysqli_fetch_assoc($exclusions)) { ?>
            <li><?php echo htmlspecialchars($exc['exclusion']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Related Destinations ================= -->
    <h2>Related Destinations</h2>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">
        <?php while ($rel = mysqli_fetch_assoc($related)) { ?>

            <div style="width:200px; border:1px solid #ddd; padding:10px; text-align:center;">

                <a href="destination.php?id=<?php echo $rel['id']; ?>">
                    <img src="destination/<?php echo htmlspecialchars($rel['image']); ?>"
                        alt="<?php echo htmlspecialchars($rel['title']); ?>"
                        style="width:100%; height:150px; object-fit:cover;">
                </a>

                <h4 style="margin-top:10px;">
                    <?php echo htmlspecialchars($rel['title']); ?>
                </h4>

            </div>

        <?php } ?>
    </div>
</body>

</html>