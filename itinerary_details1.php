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
// Fetch Related Itineraries
// ==========================
$related = mysqli_query($conn, "
    SELECT ri.related_itinerary_id, i.title, i.image
    FROM related_itineraries ri
    JOIN itineraries i ON ri.related_itinerary_id = i.id
    WHERE ri.itinerary_id = $itinerary_id
");
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo htmlspecialchars($itinerary['title']); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial;
            margin: 40px;
        }

        h2 {
            margin-top: 40px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            position: relative;
            padding-left: 28px;
            margin-bottom: 8px;
        }
    </style>
</head>

<body>

    <h1><?php echo htmlspecialchars($itinerary['title']); ?></h1>

    <p><strong>Destination:</strong>
        <?php echo htmlspecialchars($itinerary['destination_name']); ?>
    </p>

    <!-- Hero Description -->
    <p><?php echo nl2br(htmlspecialchars($itinerary['hero_description'])); ?></p>

    <!-- Duration & Price -->
    <p>
        <strong>Duration:</strong> <?php echo htmlspecialchars($itinerary['tour_duration']); ?> |
        <strong>Starting Price:</strong> $<?php echo htmlspecialchars($itinerary['starting_price']); ?>
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
    <h2>Ideal For</h2>
    <ul>
        <?php while ($cat = mysqli_fetch_assoc($categories)) { ?>
            <li><?php echo htmlspecialchars($cat['name']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Travel Types ================= -->
    <h2>Travel Style</h2>
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
    <ul class="custom-list">
        <?php while ($inc = mysqli_fetch_assoc($inclusions)) { ?>
            <li>✔ <?php echo htmlspecialchars($inc['inclusion']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Exclusions ================= -->
    <h2>Exclusions</h2>
    <ul>
        <?php while ($exc = mysqli_fetch_assoc($exclusions)) { ?>
            <li><?php echo htmlspecialchars($exc['exclusion']); ?></li>
        <?php } ?>
    </ul>

    <!-- ================= Related Itineraries ================= -->
    <h2>Related Itineraries</h2>

    <div style="display:flex; gap:20px; flex-wrap:wrap;">
        <?php while ($rel = mysqli_fetch_assoc($related)) { ?>
            <div style="width:220px; border:1px solid #ddd; padding:10px; text-align:center;">
                <a href="itinerary.php?id=<?php echo $rel['related_itinerary_id']; ?>">
                    <img src="itineraries/<?php echo htmlspecialchars($rel['image']); ?>"
                        style="width:100%; height:150px; object-fit:cover;">
                </a>
                <h4><?php echo htmlspecialchars($rel['title']); ?></h4>
            </div>
        <?php } ?>
    </div>

</body>

</html>