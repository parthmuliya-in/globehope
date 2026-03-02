<?php
// based on related Itineraries
require '../include/config.php';
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $destination_id = intval($_POST['destination_id']);
    $title = trim($_POST['title']);
    $hero_description = $_POST['hero_description'] ?? null;
    $tour_duration = $_POST['tour_duration'] ?? null;
    $starting_price = $_POST['starting_price'] ?? null;

    if (empty($destination_id) || empty($title)) {
        die("Required fields missing.");
    }

    // Multiple Overview
    $overview_array = array_filter($_POST['overview']);
    $overview = implode(" | ", $overview_array);

    // Upload Image
    if (empty($_FILES['image']['name'])) {
        die("Image required.");
    }

    $image_name = basename($_FILES['image']['name']);
    $target_dir = "../itineraries/";
    $target_file = $target_dir . $image_name;

    $allowed = ['jpg', 'jpeg', 'png', 'webp'];
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        die("Invalid image type.");
    }

    if (file_exists($target_file)) {
        die("Image already exists.");
    }

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        die("Image upload failed.");
    }

    // Insert Main Itinerary
    $stmt = mysqli_prepare(
        $conn,
        "INSERT INTO itineraries 
    (destination_id, title, hero_description, overview, tour_duration, starting_price, image) 
    VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "issssds",
        $destination_id,
        $title,
        $hero_description,
        $overview,
        $tour_duration,
        $starting_price,
        $image_name
    );

    mysqli_stmt_execute($stmt);

    $itinerary_id = mysqli_insert_id($conn);

    // Multiple Days
    if (!empty($_POST['day_title'])) {
        foreach ($_POST['day_title'] as $key => $day_title) {

            if (!empty($day_title) && !empty($_POST['day_description'][$key])) {

                $desc = $_POST['day_description'][$key];

                $stmt = mysqli_prepare(
                    $conn,
                    "INSERT INTO itinerary_days (itinerary_id, day_title, description) VALUES (?, ?, ?)"
                );
                mysqli_stmt_bind_param($stmt, "iss", $itinerary_id, $day_title, $desc);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    // Inclusions
    if (!empty($_POST['inclusions'])) {
        foreach ($_POST['inclusions'] as $inc) {
            if (!empty($inc)) {
                $stmt = mysqli_prepare(
                    $conn,
                    "INSERT INTO inclusions (itinerary_id, inclusion) VALUES (?, ?)"
                );
                mysqli_stmt_bind_param($stmt, "is", $itinerary_id, $inc);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    // Exclusions
    if (!empty($_POST['exclusions'])) {
        foreach ($_POST['exclusions'] as $exc) {
            if (!empty($exc)) {
                $stmt = mysqli_prepare(
                    $conn,
                    "INSERT INTO exclusions (itinerary_id, exclusion) VALUES (?, ?)"
                );
                mysqli_stmt_bind_param($stmt, "is", $itinerary_id, $exc);
                mysqli_stmt_execute($stmt);
            }
        }
    }

    // Related Itineraries
    if (!empty($_POST['related_itineraries'])) {
        foreach ($_POST['related_itineraries'] as $rel_id) {

            $rel_id = intval($rel_id);

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO related_itineraries 
             (itinerary_id, related_itinerary_id) 
             VALUES (?, ?)"
            );
            mysqli_stmt_bind_param($stmt, "ii", $itinerary_id, $rel_id);
            mysqli_stmt_execute($stmt);
        }
    }

    // Travel Categories
    if (!empty($_POST['travel_categories'])) {
        foreach ($_POST['travel_categories'] as $cat_id) {

            $cat_id = intval($cat_id);

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO itinerary_categories (itinerary_id, category_id) VALUES (?, ?)"
            );
            mysqli_stmt_bind_param($stmt, "ii", $itinerary_id, $cat_id);
            mysqli_stmt_execute($stmt);
        }
    }

    // Travel Types
    if (!empty($_POST['travel_types'])) {
        foreach ($_POST['travel_types'] as $type_id) {

            $type_id = intval($type_id);

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO itinerary_types (itinerary_id, type_id) VALUES (?, ?)"
            );
            mysqli_stmt_bind_param($stmt, "ii", $itinerary_id, $type_id);
            mysqli_stmt_execute($stmt);
        }
    }

    echo "Itinerary added successfully!";
}
?>
<link rel="stylesheet" href="assets/css/style.css">
<div class="form-container">
    <form method="POST" enctype="multipart/form-data">

        <!-- Destination -->
        <div class="section">
            <div class="section-title">Destination</div>

            <select name="destination_id" required>
                <option value="">Select Destination</option>
                <?php
                $result = mysqli_query($conn, "SELECT id,title FROM destinations");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='{$row['id']}'>" . htmlspecialchars($row['title']) . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Hero Section -->
        <div class="section">
            <div class="section-title">Hero Section</div>

            <input type="text" name="title" placeholder="Hero Title" required>
            <textarea name="hero_description" placeholder="Hero Description"></textarea>
            <input type="file" name="image" required>

        </div>

        <!-- Quick Overview -->
        <div class="section">
            <div class="section-title">Quick Overview</div>

            <div id="overviewWrapper">
                <input type="text" name="overview[]" placeholder="Overview line">
            </div>
            <button type="button" class="add-btn" onclick="addOverview()">+ Add Overview</button>

            <div class="grid-2">
                <input type="text" name="tour_duration" placeholder="Tour Duration (e.g. 5 Days)">
                <input type="number" name="starting_price" placeholder="Starting Price">
            </div>

        </div>

        <!-- Day Wise Plan -->
        <div class="section">
            <div class="section-title">Day Wise Plan</div>

            <div id="daysWrapper">
                <div>
                    <input type="text" name="day_title[]" placeholder="Day Title">
                    <textarea name="day_description[]" placeholder="Day Description"></textarea>
                </div>
            </div>

            <button type="button" class="add-btn" onclick="addDay()">+ Add Day</button>
        </div>

        <!-- Inclusions -->
        <div class="section">
            <div class="section-title">Inclusions</div>
            <div id="inclusionWrapper">
                <input type="text" name="inclusions[]" placeholder="Inclusion item">
            </div>
            <button type="button" class="add-btn" onclick="addInclusion()">+ Add Inclusion</button>
        </div>

        <!-- Exclusions -->
        <div class="section">
            <div class="section-title">Exclusions</div>
            <div id="exclusionWrapper">
                <input type="text" name="exclusions[]" placeholder="Exclusion item">
            </div>
            <button type="button" class="add-btn" onclick="addExclusion()">+ Add Exclusion</button>
        </div>

        <!-- Related Itineraries -->
        <div class="section">
            <div class="section-title">Related Itineraries</div>
            <label class='related-card'>
                <div id="relatedItineraryWrapper" class="checkbox-grid">
                    <p style="color:#777;">Select destination first to load itineraries</p>
                </div>
            </label>
        </div>
        <!-- Travel Categories (Ideal For) -->
        <div class="section">
            <div class="section-title">Travel Categories (Ideal For)</div>
            <div class="checkbox-grid">
                <?php
                $cat_result = mysqli_query($conn, "SELECT id, name FROM travel_categories");
                while ($cat = mysqli_fetch_assoc($cat_result)) {
                    echo "<label class='related-card'>
                    <input type='checkbox' name='travel_categories[]' value='{$cat['id']}'>
                    " . htmlspecialchars($cat['name']) . "
                  </label>";
                }
                ?>
            </div>
        </div>

        <!-- Travel Types (Style) -->
        <div class="section">
            <div class="section-title">Travel Types (Style)</div>
            <div class="checkbox-grid">
                <?php
                $type_result = mysqli_query($conn, "SELECT id, name FROM travel_types");
                while ($type = mysqli_fetch_assoc($type_result)) {
                    echo "<label class='related-card'>
                    <input type='checkbox' name='travel_types[]' value='{$type['id']}'>
                    " . htmlspecialchars($type['name']) . "
                  </label>";
                }
                ?>
            </div>
        </div>

        <button type="submit" class="submit-btn">Add Itinerary</button>

    </form>
</div>
<script>
    function addOverview() {
        let input = document.createElement("input");
        input.type = "text";
        input.name = "overview[]";
        input.placeholder = "Overview line";
        document.getElementById("overviewWrapper").appendChild(input);
    }

    function addDay() {
        let div = document.createElement("div");
        div.innerHTML = `
<input type="text" name="day_title[]" placeholder="Day Title">
<textarea name="day_description[]" placeholder="Day Description"></textarea>
`;
        document.getElementById("daysWrapper").appendChild(div);
    }

    function addInclusion() {
        let input = document.createElement("input");
        input.type = "text";
        input.name = "inclusions[]";
        input.placeholder = "Inclusion item";
        document.getElementById("inclusionWrapper").appendChild(input);
    }

    function addExclusion() {
        let input = document.createElement("input");
        input.type = "text";
        input.name = "exclusions[]";
        input.placeholder = "Exclusion item";
        document.getElementById("exclusionWrapper").appendChild(input);
    }

    document.querySelector("select[name='destination_id']")
        .addEventListener("change", function () {

            let destinationId = this.value;
            let wrapper = document.getElementById("relatedItineraryWrapper");

            if (destinationId === "") {
                wrapper.innerHTML = "<p>Select destination first</p>";
                return;
            }

            fetch("api/get_itineraries.php?destination_id=" + destinationId)
                .then(response => response.text())
                .then(data => {
                    wrapper.innerHTML = data;
                });
        });
</script>