<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Destination</title>

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Favicon -->
  <link rel="icon" href="assets/images/fav.png" type="image/png">
  <link rel="stylesheet" href="assets/css/destination-slider.css">
  <link rel="stylesheet" href="assets/css/destination.image-card.css">
  <link rel="stylesheet" href="assets/css/style.css">


</head>

<body>
  <!------------------------------------------------ HEADER (SECTION-1)---------------------------------------------------------------------------->
  <?php
   include "header.php";
  ?>

  <!------------------------------------------------END HEADER---------------------------------------------------------------------------->



  <!------------------------------------------------ DESTINATION SLIDER(SECTION-2)---------------------------------------------------------------------------->

  <div class="destination-slider">

    <div class="destination-slides">

      <div class="destination-slide active">
        <img src="assets/images/destination-imgs/Bali.png">
        <div class="destination-slide-title">
          <h2>Bali</h2>
        </div>
      </div>

      <div class="destination-slide">
        <img src="assets/images/destination-imgs/switzerland.jpg">
        <div class="destination-slide-title">
          <h2>Switzerland</h2>
        </div>
      </div>

      <div class="destination-slide">
        <img src="assets/images/destination-imgs/himalay.jpg">
        <div class="destination-slide-title">
          <h2>Himalaya</h2>
        </div>
      </div>

      <div class="destination-slide">
        <img src="assets/images/destination-imgs/maldives.jpg">
        <div class="destination-slide-title">
          <h2>Maldives</h2>
        </div>
      </div>

      <div class="destination-slide">
        <img src="assets/images/destination-imgs/Paris.png">
        <div class="destination-slide-title">
          <h2>Paris</h2>
        </div>
      </div>

    </div>

    <!-- BOTTOM NAMES -->
    <div class="destination-slider-tabs">
      <div class="destination-slider-tab active">Bali</div>
      <div class="destination-slider-tab">Switzerland</div>
      <div class="destination-slider-tab">himalaya</div>
      <div class="destination-slider-tab">Maldives</div>
      <div class="destination-slider-tab">paris</div>
    </div>

  </div>


  <!------------------------------------------------ END DESTINATION SLIDER---------------------------------------------------------------------------->

  <!------------------------------------------------ POPULAR DESTINATION (SECTION-3)---------------------------------------------------------------------------->

  <!-- ================= DESTINATION SECTION (REUSABLE) ================= -->
  <div class="destination-section">

    <!-- TITLE -->
    <div class="why-choose-title">
      <h2>Popular Destinations</h2>
      <div class="animated-border"></div>
    </div>

    <!-- GRID -->
    <div class="destination-grid">

      <!-- FIRST 5 (VISIBLE) -->
      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div>
        <a class="destination-heading">Bali</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div>
        <a class="destination-heading">Thailand</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div>
        <a class="destination-heading">Dubai</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div>
        <a class="destination-heading">Maldives</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div>
        <a class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

    </div>

    <!-- BUTTON -->
    <div class="destination-btn-wrap">
      <button class="destination-btn load-more">View More Destinations</button>
    </div>

  </div>
  <!-- ================= END SECTION ================= -->


  <!------------------------------------------------ END POPULAR  SECTION---------------------------------------------------------------------------->

  <!--======================================== ALL DESTINATION (SECTION-4) ============================================================================-->


  <div class="destination-section" style="background-color: #1953831b; padding: 30px;">

    <!-- TITLE -->
    <div class="why-choose-title">
      <h2>All Destinations</h2>
      <div class="animated-border"></div>
    </div>

    <!-- GRID -->
    <div class="destination-grid">

      <!-- FIRST 5 (VISIBLE) -->
      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div>
        <a class="destination-heading">Bali</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div>
        <a class="destination-heading">Thailand</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div>
        <a class="destination-heading">Dubai</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div>
        <a class="destination-heading">Maldives</a>
      </div>

      <div class="destination-card">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div>
        <a class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Bali.png"></div><a
          class="destination-heading">Bali</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Thailand.png"></div><a
          class="destination-heading">Thailand</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/Dubai.png"></div><a
          class="destination-heading">Dubai</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/maldives.jpg"></div><a
          class="destination-heading">Maldives</a>
      </div>
      <div class="destination-card hidden">
        <div class="destination-img"><img src="assets/images/destination-imgs/coolberg.jpg"></div><a
          class="destination-heading">Coolberg</a>
      </div>

    </div>

    <!-- BUTTON -->
    <div class="destination-btn-wrap">
      <button class="destination-btn load-more">View More Destinations</button>
    </div>

  </div>

  <!--===================== POPULAR & ALL DESTINATION IMAGES JS(SAME JS FOR POPULAR & DESTINATION) ================================================-->


  <script>


  </script>

  <!--========================================= END ALL DESTINATION (SECTION-4) ============================================================-->


  <!-- ***************************************** SECTION 10 ***************************************** -->
  <!-- ***************************************** WHY US SECTION ***************************************** -->
  <?php
    include "footer.php";
  ?>

  <script>
    var wrapper = document.querySelector(".icons-section-wraper");
  var slide = wrapper.querySelector(".icons-section");

  var leftBtn = wrapper.querySelector(".hs-arrow.left");
  var rightBtn = wrapper.querySelector(".hs-arrow.right");

  // Calculate card width including gap
  var card = slide.querySelector(".icon-card");
  var style = getComputedStyle(card);
  var gap = parseInt(style.marginRight) || 20; // gap from CSS
  var cardWidth = card.offsetWidth + gap;       // card width + gap

  rightBtn.onclick = function () {
    slide.scrollLeft += cardWidth * 2;   // scroll exact 2 cards
  };

  leftBtn.onclick = function () {
    slide.scrollLeft -= cardWidth * 2;   // scroll exact 2 cards
  };
  </script>
  

  
  <script src="assets/js/travel-header.js"></script>
  <script src="assets/js/destination-hero-slider.js"></script>

</body>

</html>