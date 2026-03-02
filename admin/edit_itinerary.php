<?php
require '../include/config.php';
include "header.php";

if (!isset($_GET['id'])) {
    die("Invalid itinerary ID.");
}

$itinerary_id = intval($_GET['id']);

$itinerary = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM itineraries WHERE id = $itinerary_id")
);

if (!$itinerary) {
    die("Itinerary not found.");
}

/* ================= UPDATE ================= */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $destination_id = intval($_POST['destination_id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $hero_description = mysqli_real_escape_string($conn, $_POST['hero_description']);
    $tour_duration = mysqli_real_escape_string($conn, $_POST['tour_duration']);
    $starting_price = floatval($_POST['starting_price']);

    $overview = "";
    if (!empty($_POST['overview'])) {
        $overview_array = array_filter($_POST['overview']);
        $overview = mysqli_real_escape_string($conn, implode(" | ", $overview_array));
    }

    $image_name = $itinerary['image'];

    if (!empty($_FILES['image']['name'])) {
        $image_name = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "../itineraries/" . $image_name);
    }

    mysqli_query($conn, "
        UPDATE itineraries SET
        destination_id = $destination_id,
        title = '$title',
        hero_description = '$hero_description',
        overview = '$overview',
        tour_duration = '$tour_duration',
        starting_price = $starting_price,
        image = '$image_name'
        WHERE id = $itinerary_id
    ");

    /* DELETE OLD MULTI DATA */
    mysqli_query($conn, "DELETE FROM itinerary_days WHERE itinerary_id = $itinerary_id");
    mysqli_query($conn, "DELETE FROM inclusions WHERE itinerary_id = $itinerary_id");
    mysqli_query($conn, "DELETE FROM exclusions WHERE itinerary_id = $itinerary_id");
    mysqli_query($conn, "DELETE FROM itinerary_categories WHERE itinerary_id = $itinerary_id");
    mysqli_query($conn, "DELETE FROM itinerary_types WHERE itinerary_id = $itinerary_id");
    mysqli_query($conn, "DELETE FROM related_itineraries WHERE itinerary_id = $itinerary_id");

    /* REINSERT DAYS */
    if (!empty($_POST['day_title'])) {
        foreach ($_POST['day_title'] as $key => $day_title) {
            $desc = $_POST['day_description'][$key];
            if (!empty($day_title) && !empty($desc)) {
                mysqli_query($conn, "
                    INSERT INTO itinerary_days (itinerary_id, day_title, description)
                    VALUES ($itinerary_id, '" . mysqli_real_escape_string($conn, $day_title) . "',
                    '" . mysqli_real_escape_string($conn, $desc) . "')
                ");
            }
        }
    }

    /* INCLUSIONS */
    if (!empty($_POST['inclusions'])) {
        foreach ($_POST['inclusions'] as $inc) {
            if (!empty($inc)) {
                mysqli_query($conn, "
                    INSERT INTO inclusions (itinerary_id, inclusion)
                    VALUES ($itinerary_id, '" . mysqli_real_escape_string($conn, $inc) . "')
                ");
            }
        }
    }

    /* EXCLUSIONS */
    if (!empty($_POST['exclusions'])) {
        foreach ($_POST['exclusions'] as $exc) {
            if (!empty($exc)) {
                mysqli_query($conn, "
                    INSERT INTO exclusions (itinerary_id, exclusion)
                    VALUES ($itinerary_id, '" . mysqli_real_escape_string($conn, $exc) . "')
                ");
            }
        }
    }

    /* CATEGORIES */
    if (!empty($_POST['travel_categories'])) {
        foreach ($_POST['travel_categories'] as $cat_id) {
            mysqli_query($conn, "
                INSERT INTO itinerary_categories (itinerary_id, category_id)
                VALUES ($itinerary_id, $cat_id)
            ");
        }
    }

    /* TYPES */
    if (!empty($_POST['travel_types'])) {
        foreach ($_POST['travel_types'] as $type_id) {
            mysqli_query($conn, "
                INSERT INTO itinerary_types (itinerary_id, type_id)
                VALUES ($itinerary_id, $type_id)
            ");
        }
    }
    /*Related itinerary */
    /* RELATED ITINERARIES */
    if (!empty($_POST['related_itineraries'])) {
        foreach ($_POST['related_itineraries'] as $rel_id) {

            $rel_id = intval($rel_id);

            mysqli_query($conn, "
            INSERT INTO related_itineraries 
            (itinerary_id, related_itinerary_id)
            VALUES ($itinerary_id, $rel_id)
        ");
        }
    }

    echo "<script>alert('Itinerary Updated Successfully');window.location='view_itineraries.php';</script>";
    exit;
}
/* ================= FETCH SELECTED RELATED ================= */

$selected_related = []; // IMPORTANT - initialize array

$relSel = mysqli_query(
    $conn,
    "SELECT related_itinerary_id 
     FROM related_itineraries 
     WHERE itinerary_id = $itinerary_id"
);

if ($relSel) {
    while ($r = mysqli_fetch_assoc($relSel)) {
        $selected_related[] = $r['related_itinerary_id'];
    }
}
$selected_categories = [];
$selected_types = [];
// $checked = (!empty($selected_related) &&
//     in_array($rel['id'], $selected_related)) ? "checked" : "";
/* FETCH SELECTED CATEGORIES */
$catSel = mysqli_query(
    $conn,
    "SELECT category_id 
     FROM itinerary_categories 
     WHERE itinerary_id = $itinerary_id"
);

while ($c = mysqli_fetch_assoc($catSel)) {
    $selected_categories[] = $c['category_id'];
}

/* FETCH SELECTED TYPES */
$typeSel = mysqli_query(
    $conn,
    "SELECT type_id 
     FROM itinerary_types 
     WHERE itinerary_id = $itinerary_id"
);

while ($t = mysqli_fetch_assoc($typeSel)) {
    $selected_types[] = $t['type_id'];
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

                    $selected = ($row['id'] == $itinerary['destination_id']) ? "selected" : "";

                    echo "<option value='{$row['id']}' $selected>" .
                        htmlspecialchars($row['title']) .
                        "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Hero Section -->
        <div class="section">
            <div class="section-title">Hero Section</div>

            <input type="text" name="title" placeholder="Hero Title"
                value="<?= htmlspecialchars($itinerary['title']) ?>" required>
            <textarea name="hero_description"
                placeholder="Hero Description"><?= htmlspecialchars($itinerary['hero_description']) ?></textarea>
            <input type="file" name="image" required>

        </div>

        <!-- Quick Overview -->
        <div class="section">
            <div class="section-title">Quick Overview</div>

            <div id="overviewWrapper">
                <?php
                $overview_lines = explode(" | ", $itinerary['overview']);
                foreach ($overview_lines as $line) {
                    echo "<div class='multi-item'>
                    <input type='text' name='overview[]' value='" . htmlspecialchars($line) . "'>
                    <button type='button' onclick='removeItem(this)'>✖</button>
                  </div>";
                }
                ?>
            </div>
            <button type="button" onclick="addOverview()" class="add-btn">+ Add Overview</button>
            <div class="grid-2">
                <input type="text" name="tour_duration" placeholder="Tour Duration (e.g. 5 Days)"
                    value="<?= htmlspecialchars($itinerary['tour_duration']) ?>">

                <input type="number" name="starting_price" placeholder="Starting Price"
                    value="<?= htmlspecialchars($itinerary['starting_price']) ?>">
            </div>
        </div>

        <!-- Day Wise Plan -->
        <div class="section">
            <div class="section-title">Day Wise Plan</div>

            <div id="daysWrapper">
                <?php
                $days = mysqli_query($conn, "SELECT * FROM itinerary_days WHERE itinerary_id = $itinerary_id");
                while ($day = mysqli_fetch_assoc($days)) {
                    echo "<div class='multi-item'>
                    <input type='text' name='day_title[]' value='" . htmlspecialchars($day['day_title']) . "'>
                    <textarea name='day_description[]'>" . htmlspecialchars($day['description']) . "</textarea>
                    <button type='button' onclick='removeItem(this)'>✖</button>
                  </div>";
                }
                ?>
            </div>

            <button type="button" onclick="addDay()" class="add-btn">+ Add Day</button>
        </div>

        <!-- Inclusions -->
        <div class="section">
            <div class="section-title">Inclusions</div>
            <div id="inclusionWrapper">
                <!-- <input type="text" name="inclusions[]" placeholder="Inclusion item"> -->
                <?php
                $incl = mysqli_query($conn, "SELECT * FROM inclusions WHERE itinerary_id = $itinerary_id");
                while ($inc = mysqli_fetch_assoc($incl)) {
                    echo "<div class='multi-item'>
                    <input type='text' name='inclusions[]' value='" . htmlspecialchars($inc['inclusion']) . "'>
                    <button type='button' onclick='removeItem(this)'>✖</button>
                  </div>";
                }
                ?>
            </div>
            <button type="button" class="add-btn" onclick="addInclusion()">+ Add Inclusion</button>
        </div>

        <!-- Exclusions -->
        <div class="section">
            <div class="section-title">Exclusions</div>
            <div id="exclusionWrapper">
                <!-- <input type="text" name="exclusions[]" placeholder="Exclusion item"> -->
                <?php
                $exclu = mysqli_query($conn, "SELECT * FROM exclusions WHERE itinerary_id = $itinerary_id");
                while ($excl = mysqli_fetch_assoc($exclu)) {
                    echo "<div class='multi-item'>
                    <input type='text' name='exclusions[]' value='" . htmlspecialchars($excl['exclusion']) . "'>
                    <button type='button' onclick='removeItem(this)'>✖</button>
                  </div>";
                }
                ?>
            </div>
            <button type="button" class="add-btn" onclick="addExclusion()">+ Add Exclusion</button>
        </div>

        <!-- Related Itineraries -->
        <div class="section">
            <div class="section-title">Related Itineraries</div>
            <label class='related-card'>
                <div id="relatedItineraryWrapper" class="checkbox-grid">
                    <!-- <p style="color:#777;">Select destination first to load itineraries</p> -->
                    <?php
                    $dest_id = $itinerary['destination_id'];

                    $related = mysqli_query(
                        $conn,
                        "SELECT id, title FROM itineraries 
                                WHERE destination_id = $dest_id AND id != $itinerary_id"
                    );
                    while ($rel = mysqli_fetch_assoc($related)) {
                        $checked = in_array($rel['id'], $selected_related) ? "checked" : "";
                        echo "<label class='related-card'>
                                 <input type='checkbox' name='related_itineraries[]'
                                 value='{$rel['id']}' $checked>
                                 " . htmlspecialchars($rel['title']) . "
                                 </label>";
                    }
                    ?>
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

                    $checked = in_array($cat['id'], $selected_categories) ? "checked" : "";

                    echo "<label class='related-card'>
                        <input type='checkbox' name='travel_categories[]'
                        value='{$cat['id']}' $checked>
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

                    $checked = in_array($type['id'], $selected_types) ? "checked" : "";

                    echo "<label class='related-card'>
                          <input type='checkbox' name='travel_types[]'
                          value='{$type['id']}' $checked>
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
<script>
    function removeItem(btn) {
        btn.parentElement.remove();
    }

    function addOverview() {
        let div = document.createElement("div");
        div.className = "multi-item";
        div.innerHTML = `
        <input type="text" name="overview[]" placeholder="Overview line">
        <button type="button" onclick="removeItem(this)">✖</button>
    `;
        document.getElementById("overviewWrapper").appendChild(div);
    }

    function addDay() {
        let div = document.createElement("div");
        div.className = "multi-item";
        div.innerHTML = `
        <input type="text" name="day_title[]" placeholder="Day Title">
        <textarea name="day_description[]" placeholder="Day Description"></textarea>
        <button type="button" onclick="removeItem(this)">✖</button>
    `;
        document.getElementById("daysWrapper").appendChild(div);
    }
</script>