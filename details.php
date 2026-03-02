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


<!--use design in d drive detail.html--->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo htmlspecialchars($itinerary['title']); ?>
  </title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <link rel="stylesheet" href="assets/css/details.css">
  <link rel="stylesheet" href="assets/css/style.css">



  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

  <!-- Favicon -->
  <link rel="icon" href="assets/images/fav.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">


  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
</head>

<body>
  <?php include "header.php"; ?>



  <!-- *************************************** HERO SECTION **************************************** -->

  <!-- HERO SECTION -->
  <section class="hero" style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
    url('itineraries/<?php echo htmlspecialchars($itinerary['image']); ?>') center/cover no-repeat;">

    <div class="hero-content">
      <h1><?php echo htmlspecialchars($itinerary['title']); ?></h1>
      <p><?php echo nl2br(htmlspecialchars($itinerary['hero_description'])); ?></p>
      <a href="#" class="hero-btn">View Packages</a>
    </div>

  </section>


  <!-- *************************************** QUICK OVERVIEW SECTION **************************************** -->
  <section class="trip-overview">
    <div class="container">

      <div class="overview-left">

        <div class="why-choose-title-details">
          <h2>Quick Overview</h2>
          <div class="animated-border-details"></div>

        </div>

        <ul class="overview-features">
          <!-- <li><span>✔</span>--->
          <?php
          $overview_points = explode(" | ", $itinerary['overview']);
          echo "<ul>";
          foreach ($overview_points as $point) {
            echo "<li> <span>✔</span>" . htmlspecialchars($point) . "</li>";
          }
          echo "</ul>";
          ?>
          </li>
        </ul>
      </div>

      <div class="overview-right">
        <div class="info-box-wrapper">
          <div class="info-box">
            <div class="info-icon">
              <i class="fa-solid fa-clock"></i>
            </div>
            <h4>Tour Duration</h4>
            <p>
              <?php echo htmlspecialchars($itinerary['tour_duration']); ?>
            </p>
          </div>
        </div>

        <div class="info-box-wrapper">
          <div class="info-box">
            <div class="info-icon">
              <i class="fa-solid fa-users"></i>
            </div>
            <h4>Ideal For</h4>
            <p>
              <?php
              $typeArray = [];

              while ($type = mysqli_fetch_assoc($categories)) {

                $name = $type['name'];

                // Convert singular to display format
                switch ($name) {
                  case 'Solo':
                    $typeArray[] = 'Solo Trips';
                    break;
                  case 'Couple':
                    $typeArray[] = 'Couples';
                    break;
                  case 'Group':
                    $typeArray[] = 'Friends';
                    break;
                  case 'Family':
                    $typeArray[] = 'Families';
                    break;
                  case 'Corporate':
                    $typeArray[] = 'Corporate Trips';
                    break;
                  default:
                    $typeArray[] = $name;
                }
              }
              ?>
              <?php
              $total = count($typeArray);

              if ($total > 1) {
                $last = array_pop($typeArray);
                echo implode(', ', $typeArray) . ' & ' . $last;
              } else {
                echo $typeArray[0] ?? '';
              }
              ?>
            </p>
          </div>
        </div>

        <div class="info-box-wrapper">
          <div class="info-box">
            <div class="info-icon">
              <i class="fa-solid fa-compass"></i>
            </div>
            <h4>Travel Style</h4>
            <p>
              <?php
              $styleArray = [];

              while ($type = mysqli_fetch_assoc($types)) {
                $name = $type['name'];

                // Optional: Format display names if needed
                switch ($name) {
                  case 'Leisure & Vacation':
                    $styleArray[] = 'Leisure & Vacation';
                    break;
                  case 'Business & MICE':
                    $styleArray[] = 'Business & MICE';
                    break;
                  case 'Adventure Travel':
                    $styleArray[] = 'Adventure Travel';
                    break;
                  case 'Cultural & Heritage Tourism':
                    $styleArray[] = 'Cultural & Heritage Tourism';
                    break;
                  case 'Eco & Sustainable Travel':
                    $styleArray[] = 'Eco & Sustainable Travel';
                    break;
                  case 'Wellness Tourism':
                    $styleArray[] = 'Wellness Tourism';
                    break;
                  case 'Dark Tourism':
                    $styleArray[] = 'Dark Tourism';
                    break;
                  case 'Specialized Travel':
                    $styleArray[] = 'Specialized Travel';
                    break;
                  default:
                    $styleArray[] = $name;
                }
              }

              $total = count($styleArray);

              if ($total > 1) {
                $last = array_pop($styleArray);
                echo implode(', ', $styleArray) . ' & ' . $last;
              } else {
                echo $styleArray[0] ?? '';
              }
              ?>
            </p>
          </div>
        </div>

        <div class="info-box-wrapper">
          <div class="info-box">
            <div class="info-icon">
              <i class="fa-solid fa-indian-rupee-sign"></i>
            </div>
            <h4>Starting Price</h4>
            <p>₹
              <?php echo htmlspecialchars($itinerary['starting_price']); ?>
            </p>
          </div>
        </div>
      </div>

    </div>
  </section>



  <!-- *************************************** DAY WISE PLAN SECTION **************************************** -->
  <section class="itinerary">
    <div class="itinerary-container">


      <div class="why-choose-title">
        <h2>Day Wise Plan</h2>
        <div class="animated-border"></div>
        <p> We turn your travel ideas into perfectly planned journeys with expert guidance at every step.
          From planning to your return, we ensure a smooth and stress-free experience.
        </p>
      </div>


      <!-- <div class="timeline"> -->

      <?php while ($day = mysqli_fetch_assoc($days)) { ?>
        <div class="timeline-item">
          <div class="timeline-content">
            <h3><?php echo htmlspecialchars($day['day_title']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($day['description'])); ?></p>
          </div>
        </div>
      <?php } ?>

    </div>

    </div>
  </section>

  <!-- *************************************** INCLUSION EXCLUSION SECTION **************************************** -->

  <section class="include-exclude">

    <div class="why-choose-title">
      <h2>Inclusive / Exclusive</h2>
      <div class="animated-border"></div>
    </div>

    <div class="include-exclude-container">

      <div class="include-box reveal">

        <div class="badge green-badge">
          <i class="fa-solid fa-check"></i>
        </div>

        <h2>✔ Package Inclusions</h2>
        <ul>
          <?php while ($inc = mysqli_fetch_assoc($inclusions)) { ?>
            <li><?php echo htmlspecialchars($inc['inclusion']); ?></li>
          <?php } ?>
        </ul>
      </div>

      <div class="divider-line"></div>

      <div class="exclude-box reveal">

        <div class="badge red-badge">
          <i class="fa-solid fa-xmark"></i>
        </div>

        <h2>✖ Package Exclusions</h2>
        <ul>
          <?php while ($exc = mysqli_fetch_assoc($exclusions)) { ?>
            <li><?php echo htmlspecialchars($exc['exclusion']); ?></li>
          <?php } ?>
        </ul>
      </div>

    </div>
  </section>



  <!-- *************************************** HORIZONTAL SCROLL SECTION *******************************************************  -->
  <section class="horizontal-section-wrapper-outer">
    <div class="why-choose-title">
      <h2>Relatede Itinraries</h2>
      <div class="animated-border"></div>
      <p>Handpicked journeys designed to inspire, explore, and experience the world in a truly meaningful way.</p>
    </div>

    <section class="horizontal-section-wrapper">

      <!-- LEFT ARROW -->
      <button class="hs-arrow left">&#10094;</button>


      <section class="horizontal-section">

        <div class="scroll-wrapper">

          <!-- RIGHT SCROLLABLE DIVS -->
          <?php while ($rel = mysqli_fetch_assoc($related)) { ?>
            <div class="h-s-card h-s-image-card">
              <img src="itineraries/<?php echo htmlspecialchars($rel['image']); ?>">
              <div class="h-s-card-content">
                <h3>
                  <?php echo htmlspecialchars($rel['title']); ?>
                </h3>
                <p><?php echo nl2br(htmlspecialchars($itinerary['hero_description'])); ?></p>
                <a href="details.php?id=<?php echo $rel['related_itinerary_id']; ?>">Explore Trip</a>
              </div>
            </div>
          <?php } ?>
          <div class="h-s-card h-s-destination-card">
            <a href="itineraries.php">EXPLORE ITINRARIES</a>
          </div>
        </div>
      </section>



      <!-- RIGHT ARROW -->
      <button class="hs-arrow right">&#10095;</button>

    </section>
  </section>

  <!-- *************************************** HORIZONTAL SCROLL SECTION ENDS *******************************************************  -->
  <?php include "footer.php"; ?>

  <script src="assets/js/details.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>