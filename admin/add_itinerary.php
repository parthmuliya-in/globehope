<?php
//related with destination
require '../include/config.php';
include "header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $destination_id = intval($_POST['destination_id']);
    $title = trim($_POST['title']);

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
        "INSERT INTO itineraries (destination_id, title, overview, image) VALUES (?, ?, ?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "isss", $destination_id, $title, $overview, $image_name);
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

    // Related Destinations
    if (!empty($_POST['related_destinations'])) {
        foreach ($_POST['related_destinations'] as $rel_id) {

            $rel_id = intval($rel_id);

            $stmt = mysqli_prepare(
                $conn,
                "INSERT INTO related_destinations (itinerary_id, related_destination_id) VALUES (?, ?)"
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
<style>
    /* ===== Reset ===== */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    /* ===== Form Container ===== */
    form {
        max-width: 1000px;
        margin: 30px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }

    /* ===== Headings ===== */
    h3 {
        margin: 25px 0 10px;
        font-size: 18px;
        color: #333;
        border-left: 4px solid #007bff;
        padding-left: 8px;
    }

    /* ===== Inputs ===== */
    input[type="text"],
    input[type="file"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    textarea {
        min-height: 90px;
        resize: vertical;
    }

    /* ===== Buttons ===== */
    button {
        padding: 8px 15px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 8px;
        transition: 0.3s;
    }

    button:hover {
        background: #0056b3;
    }

    /* Submit Button */
    button[type="submit"] {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        font-size: 16px;
        background: #28a745;
    }

    button[type="submit"]:hover {
        background: #1e7e34;
    }

    /* ===== Days Section Layout ===== */
    #daysWrapper>div {
        display: flex;
        gap: 15px;
        margin-bottom: 10px;
    }

    #daysWrapper input {
        flex: 1;
    }

    #daysWrapper textarea {
        flex: 2;
    }

    /* ===== Checkbox Sections ===== */
    label {
        display: inline-block;
        margin: 6px 15px 6px 0;
        font-size: 14px;
    }

    input[type="checkbox"] {
        margin-right: 5px;
    }

    /* ===== Grid for Checkbox Groups ===== */
    h3+label {
        width: 48%;
    }

    /* ===== Responsive Design ===== */

    /* Tablet */
    @media (max-width: 768px) {

        form {
            padding: 20px;
        }

        #daysWrapper>div {
            flex-direction: column;
        }

        h3+label {
            width: 100%;
        }
    }

    /* Mobile */
    @media (max-width: 480px) {

        form {
            padding: 15px;
        }

        button {
            width: 100%;
        }

        label {
            display: block;
            width: 100%;
        }
    }
</style>
<form method="POST" enctype="multipart/form-data">

    <select name="destination_id" required>
        <option value="">Select Destination</option>
        <?php
        $result = mysqli_query($conn, "SELECT id, title FROM destinations");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='{$row['id']}'>" . htmlspecialchars($row['title']) . "</option>";
        }
        ?>
    </select><br><br>

    <input type="text" name="title" placeholder="Itinerary Title" required><br><br>

    <h3>Quick Overview</h3>
    <div id="overviewWrapper">
        <input type="text" name="overview[]" placeholder="Overview Detail">
    </div>
    <button type="button" onclick="addOverview()">Add More</button><br><br>

    <input type="file" name="image" required><br><br>

    <h3>Days</h3>
    <div id="daysWrapper">
        <div>
            <input type="text" name="day_title[]" placeholder="Day Title">
            <textarea name="day_description[]" placeholder="Day Description"></textarea>
        </div>
    </div>
    <button type="button" onclick="addDay()">Add More Day</button><br><br>

    <h3>Inclusions</h3>
    <div id="inclusionWrapper">
        <input type="text" name="inclusions[]">
    </div>
    <button type="button" onclick="addInclusion()">Add More</button><br><br>

    <h3>Exclusions</h3>
    <div id="exclusionWrapper">
        <input type="text" name="exclusions[]">
    </div>
    <button type="button" onclick="addExclusion()">Add More</button><br><br>

    <h3>Related Destinations</h3>
    <?php
    $result = mysqli_query($conn, "SELECT id, title FROM destinations");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<label><input type='checkbox' name='related_destinations[]' value='{$row['id']}'> "
            . htmlspecialchars($row['title']) . "</label><br>";
    }
    ?>

    <br>

    <h3>Travel Categories (ideal For)</h3>
    <?php
    $result = mysqli_query($conn, "SELECT id, name FROM travel_categories");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<label><input type='checkbox' name='travel_categories[]' value='{$row['id']}'> "
            . htmlspecialchars($row['name']) . "</label><br>";
    }
    ?>

    <br>

    <h3>Travel Types (Style)</h3>
    <?php
    $result = mysqli_query($conn, "SELECT id, name FROM travel_types");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<label><input type='checkbox' name='travel_types[]' value='{$row['id']}'> "
            . htmlspecialchars($row['name']) . "</label><br>";
    }
    ?>

    <br>
    <button type="submit">Add Itinerary</button>

</form>
<script>
    function addOverview() {
        let input = document.createElement("input");
        input.type = "text";
        input.name = "overview[]";
        input.placeholder = "Overview Detail";
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
        document.getElementById("inclusionWrapper").appendChild(input);
    }

    function addExclusion() {
        let input = document.createElement("input");
        input.type = "text";
        input.name = "exclusions[]";
        document.getElementById("exclusionWrapper").appendChild(input);
    }
</script>