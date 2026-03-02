<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Our Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Favicon -->
  <link rel="icon" href="assets/images/fav.png" type="image/png">

  <link rel="stylesheet" href="assets/css/service.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

  <!-- ***************************************** HEADER START ***************************************** -->
  <?php
    include "header.php";  
  ?>
  <!-- ***************************************** HEADER  ENDS ***************************************** -->


  <!-- section1 banner -->

  <section class="banner">

    <div class="banner-content">
      <h1>Globe Hop</h1>
      <h3>Explore the World, One Journey at a Time</h3>
      <p>
        From luxury trips to budget adventures, Globe Hop creates unforgettable journeys with guided tours, cultural
        experiences, and the best stays worldwide.
      </p>




    </div>
  </section>
  <!-- section1 banner end -->

  <!-- section2 -->
  <section class="text-section">
    <h2>Your Adventure Starts Here</h2>
    <p>
      With Globe Hop, every journey is crafted to perfection.
      Enjoy guided tours, unique cultural experiences, and handpicked stays.
      Whether it's a solo adventure, a romantic getaway, or a family vacation,
      we make every trip smooth, safe, and unforgettable.
    </p>

  </section>
  <!-- section2end -->

  <!-- ***************************************** OUR SERVICES ***************************************** -->

  <section class="services">
    <div class="services-container">


      <!-- <div class="services-heading-wrapper">
      <h2>Our Services</h2>
      <p class="services-sub">
        Premium travel services crafted with consistency, structure and reliability
      </p>
    </div>  -->
      <div class="why-choose-title">
        <h2>Our Services</h2>
        <div class="animated-border"></div>
        <p> Premium travel services crafted with consistency, structure and reliability
        </p>
      </div>

      <!-- TIMELINE -->
      <div class="services-timeline">

        <!-- 1 -->
        <div class="services-item services-left">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-plane"></i></div>
            <div class="services-text">
              <h3>Flight Booking</h3>
              <p>
                We provide reliable domestic and international flight booking services with transparent pricing,
                multiple airline options, flexible schedules, secure payment gateways and continuous customer
                assistance.
              </p>
            </div>
          </div>
        </div>

        <!-- 2 -->
        <div class="services-item services-right">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-hotel"></i></div>
            <div class="services-text">
              <h3>Hotel Reservations</h3>
              <p>
                Handpicked properties, verified reviews, strategic locations, flexible check-in options and dedicated
                support
                to ensure a comfortable stay.
              </p>
            </div>
          </div>
        </div>

        <!-- 3 -->
        <div class="services-item services-left">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-route"></i></div>
            <div class="services-text">
              <h3>Tour Packages</h3>
              <p>
                Personalized tour packages including sightseeing, accommodation, transport, guided experiences and
                curated itineraries.
              </p>
            </div>
          </div>
        </div>

        <!-- 4 -->
        <div class="services-item services-right">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-passport"></i></div>
            <div class="services-text">
              <h3>Visa Assistance</h3>
              <p>
                End-to-end visa guidance including documentation, appointment scheduling, application review and
                compliance checks.
              </p>
            </div>
          </div>
        </div>

        <!-- 5 -->
        <div class="services-item services-left">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-car"></i></div>
            <div class="services-text">
              <h3>Car Rentals</h3>
              <p>
                Wide range of vehicles with professional drivers, flexible rental durations and transparent pricing.
              </p>
            </div>
          </div>
        </div>

        <!-- 6 -->
        <div class="services-item services-right">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-ship"></i></div>
            <div class="services-text">
              <h3>Cruise Bookings</h3>
              <p>
                Luxury cruise experiences with premium liners, dining options, entertainment and scenic routes.
              </p>
            </div>
          </div>
        </div>

        <!-- 7 -->
        <div class="services-item services-left">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-mountain"></i></div>
            <div class="services-text">
              <h3>Adventure Travel</h3>
              <p>
                Trekking, camping, water sports and adventure activities with complete safety arrangements.
              </p>
            </div>
          </div>
        </div>

        <!-- 8 -->
        <div class="services-item services-right">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-umbrella-beach"></i></div>
            <div class="services-text">
              <h3>Beach Holidays</h3>
              <p>
                Relaxing beach holiday packages with premium resorts and curated leisure experiences.
              </p>
            </div>
          </div>
        </div>

        <!-- 9 -->
        <div class="services-item services-left">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-person-hiking"></i></div>
            <div class="services-text">
              <h3>Solo Travel</h3>
              <p>
                Safe and comfortable solo travel solutions with verified accommodations and community support.
              </p>
            </div>
          </div>
        </div>

        <!-- 10 -->
        <div class="services-item services-right">
          <div class="services-card">
            <div class="services-icon"><i class="fa-solid fa-headset"></i></div>
            <div class="services-text">
              <h3>24/7 Support</h3>
              <p>
                Round-the-clock travel assistance covering emergency support, itinerary changes and coordination.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



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
  <script src="assets/js/service.js"></script>
</body>

</html>