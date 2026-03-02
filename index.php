<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Globe Hop</title>

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

  <?php
    include "header.php";
  ?>
  <!-- ***************************************** HEADER  ENDS ***************************************** -->

  <main>

    <!-- ***************************************** SECTION 3 ***************************************** -->
    <!-- ***************************************** HERO SLIDER ***************************************** -->

   

 <section class="hero-slider">

  <!-- SLIDE 1 (UNCHANGED) -->
  <div class="slide" style="background-image:url('assets/images/hero-banner-imgs/background1.png')">
    <div class="overlay"></div>
    <div class="content">
      <h1>Explore the World with Globe Hop</h1>
      <p>Discover breathtaking destinations & unforgettable journeys</p>
      <div class="btn-group">
        <a href="destination.php" class="hero-btn hero-btn1">Explore Destinations</a>
        <a href="signup.html" class="hero-btn hero-btn2">Plan Your Trip</a>
      </div>
    </div>
  </div>

  <!-- SLIDE 2 -->
  <div class="slide" style="background-image:url('assets/images/hero-banner-imgs/background2.png')">
    <div class="overlay"></div>
    <div class="content">

      <!-- Desktop Heading -->
      <h1 class="desktop-heading">Travel Your Way</h1>

      <!-- Mobile Heading -->
      <h1 class="mobile-heading">Choose Your Travel Style</h1>

      <!-- Mobile Content -->
      <div class="mobile-content">
        <p>Find the perfect travel experience tailored for you.</p>
        <a href="destination.php" class="hero-btn hero-btn1">Explore Now</a>
      </div>

      <!-- Desktop Grid -->
      <div class="grid image-grid">
        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/solo.png" alt="Solo">
          <h3>Solo Travelers</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Couples.png" alt="Couple">
          <h3>Couples</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Families.png" alt="Family">
          <h3>Families</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Group Tours.png" alt="Group">
          <h3>Group Tours</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Adventure.png" alt="Adventure">
          <h3>Adventure</h3>
        </div>
      </div>

    </div>
  </div>

  <!-- SLIDE 3 -->
  <div class="slide" style="background-image:url('assets/images/hero-banner-imgs/background3.png')">
    <div class="overlay"></div>
    <div class="content">

      <h1 class="desktop-heading">Top Destinations</h1>
      <h1 class="mobile-heading">Explore Popular Places</h1>

      <div class="mobile-content">
        <p>Discover the most loved destinations around the world.</p>
        <a href="destination.php" class="hero-btn hero-btn1">View Destinations</a>
      </div>

      <div class="grid image-grid">
        <div class="img-card destination">
          <img src="assets/images/hero-banner-imgs/Paris.png">
          <h3>Paris</h3>
        </div>

        <div class="img-card destination">
          <img src="assets/images/hero-banner-imgs/Bali.png">
          <h3>Bali</h3>
        </div>

        <div class="img-card destination">
          <img src="assets/images/hero-banner-imgs/Dubai.png">
          <h3>Dubai</h3>
        </div>

        <div class="img-card destination">
          <img src="assets/images/hero-banner-imgs/Switzerland.png">
          <h3>Switzerland</h3>
        </div>

        <div class="img-card destination">
          <img src="assets/images/hero-banner-imgs/Thailand.png">
          <h3>Thailand</h3>
        </div>
      </div>

    </div>
  </div>

  <!-- SLIDE 4 -->
  <div class="slide" style="background-image:url('assets/images/hero-banner-imgs/background4.png')">
    <div class="overlay"></div>
    <div class="content">

      <h1 class="desktop-heading">Perfect Itineraries</h1>
      <h1 class="mobile-heading">Plan Your Perfect Trip</h1>

      <div class="mobile-content">
        <p>Choose a ready-made plan or create your own journey.</p>
        <a href="signup.html" class="hero-btn hero-btn1">Start Planning</a>
      </div>

      <div class="grid image-grid">
        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/3 Days Getaway.png">
          <h3>3 Days Getaway</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/5 Days Explorer.png">
          <h3>5 Days Explorer</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/7 Days Classic.png">
          <h3>7 Days Classic</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/10 Days Luxury.png">
          <h3>10 Days Luxury</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Custom Plan.png">
          <h3>Custom Plan</h3>
        </div>
      </div>

    </div>
  </div>

  <!-- SLIDE 5 -->
  <div class="slide" style="background-image:url('assets/images/hero-banner-imgs/background5.png')">
    <div class="overlay"></div>
    <div class="content">

      <h1 class="desktop-heading">Complete Travel Services</h1>
      <h1 class="mobile-heading">All Travel Services in One Place</h1>

      <div class="mobile-content">
        <p>Flights, hotels, visa & everything handled for you.</p>
        <a href="signup.html" class="hero-btn hero-btn1">Get Started</a>
      </div>

      <div class="grid image-grid services">
        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Flights.png">
          <h3>Flights</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Hotels.png">
          <h3>Hotels</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Transport.png">
          <h3>Transport</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Guide.png">
          <h3>Guide</h3>
        </div>

        <div class="img-card">
          <img src="assets/images/hero-banner-imgs/Visa.png">
          <h3>Visa</h3>
        </div>
      </div>

    </div>
  </div>

  <div class="slider-dots"></div>

</section>
    <!-- ***************************************** SECTION 4 ***************************************** -->

    <div class="icon-slider-wrapper">

  <!-- Right Side Arrows -->
  <div class="slider-arrows">
    <button class="arrow-btn left">&#10094;</button>
    <button class="arrow-btn right">&#10095;</button>
  </div>

    <section class="premium-icon-section">

      <div class="premium-icon-card">
        <div class="premium-icon-circle">
          <i class="fas fa-plane"></i>
        </div>
        <h4>Luxury Flights</h4>
      </div>

      <div class="premium-icon-card">
        <div class="premium-icon-circle">
          <i class="fas fa-hotel"></i>
        </div>
        <h4>Premium Hotels</h4>
      </div>

      <div class="premium-icon-card">
        <div class="premium-icon-circle">
          <i class="fas fa-route"></i>
        </div>
        <h4>Smart Planning</h4>
      </div>

      <div class="premium-icon-card">
        <div class="premium-icon-circle">
          <i class="fas fa-ship"></i>
        </div>
        <h4>Exclusive Cruises</h4>
      </div>

      <div class="premium-icon-card">
        <div class="premium-icon-circle">
          <i class="fas fa-user-tie"></i>
        </div>
        <h4>Guided Tours</h4>
      </div>

    </section>


    <!-- ***************************************** SECTION 5 ***************************************** -->

    <section class="travel-section">

      <!-- LEFT -->
      <div class="travel-left">
        <div class="mini-title">Dream Your Next Trip</div>
        <h2>Discover When Even<br>You Want To Go</h2>
        <p class="text">
          Whether you’re looking for a romantic getaway, family-friendly solo journey
          to explore the world, a travel agency can provide tailored itinerary.
        </p>

        <div class="feature">
          <img src="assets/images/trophy.png">
          <div>
            <h3>Best Travel Agency</h3>
            <p>Step out of your comfort and explore the world</p>
          </div>
        </div>

        <div class="feature">
          <img src="assets/images/flying.png">
          <div>
            <h3>Secure Journey With Us</h3>
            <p>Trusted and reliable travel solutions</p>
          </div>
        </div>

        <a href="about.php" class="travel-btn">ABOUT US →</a>

      </div>


      <!-- RIGHT -->
      <div class="travel-right">
        <div class="travel-text">TRAVEL</div>
        <img src="assets/images/hero-banner-imgs/Dubai.png" class="big-img">
        <img src="assets/images/hero-banner-imgs/Paris.png" class="small-img">
      </div>

    </section>


   <!-- ***************************************** SECTION 6 ***************************************** -->
    
   <!-- *************************************** EXPLORE THE WORLD ******************************************************* -->

    <div class="why-choose-title">
      <h2>Explore The World</h2>
      <div class="animated-border"></div>
      <p>Discover unforgettable experiences and adventures that suit every traveler.
        From family trips to solo journeys, explore the world your way.</p>
    </div>


    <section class="image-section">

     <div class="slider-controls">
      <button class="prev-btn">&#10094;</button>
      <button class="next-btn">&#10095;</button>
    </div>

      <!-- ROW 2 : IMAGES -->
      <div class="row images-row">

        <a href="#" class="img-box">
          <img src="assets/images/nature5.png" alt="">
          <span>SOLO</span>
        </a>

        <a href="#" class="img-box">
          <img src="assets/images/nature2.png" alt="">
          <span>COUPLES</span>
        </a>

        <a href="#" class="img-box">
          <img src="assets/images/nature1.png" alt="">
          <span>FAMILY</span>
        </a>

        <a href="#" class="img-box">
          <img src="assets/images/nature3.png" alt="">
          <span>GROUPS</span>
        </a>


        <a href="#" class="img-box">
          <img src="assets/images/nature4.png" alt="">
          <span>CORPORATE</span>
        </a>

      </div>

    </section>

    <!-- *************************************** IMAGES Start your Journey ENDS ******************************************************* -->


    <!-- ***************************************** SECTION 7 ***************************************** -->

    <!-- *************************************** HORIZONTAL SCROLL SECTION *******************************************************  -->
    <section class="horizontal-section-wrapper-outer">
      <div class="why-choose-title">
        <h2>Explore Destinations</h2>
        <div class="animated-border"></div>
        <p>Handpicked journeys designed to inspire, explore, and experience the world in a truly meaningful way.</p>
      </div>

      <section class="horizontal-section-wrapper">

        <!-- LEFT ARROW -->
        <button class="hs-arrow left">&#10094;</button>


        <section class="horizontal-section">

          <div class="scroll-wrapper">

            <!-- RIGHT SCROLLABLE DIVS -->
            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature1.png">
              <div class="h-s-card-content">
                <h3>
                  Rome, Florence & Puglia: A Luxury Family Italy Holiday
                </h3>
                <p>Roman gladiators, handmade gelato and vintage Vespas, this nine-night adventure through...
                  From £8,550 per person excl. flights
                </p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <!-- DUPLICATE CARD (10 TOTAL) -->
            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature2.png">
              <div class="h-s-card-content">
                <h3>A journey into Japan</h3>
                <p>Japan – with its 3,000 tightly-packed islands – can easily exceed...
                  From £16,500 per person excl. flights
                  Explore Trip
                </p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature3.png">
              <div class="h-s-card-content">
                <h3>An adventure through Costa Rica</h3>
                <p>Lodged between the Caribbean Sea and the Pacific Ocean, Costa Rica...
                  From £13,000 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature4.png">
              <div class="h-s-card-content">
                <h3>Athens, Mykonos and Crete: A Luxury Family Discovery in Greece</h3>
                <p>
                  Ancient ruins are the backdrop to venturesome days and peaceful evenings...
                  From £8,500 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature5.png">
              <div class="h-s-card-content">
                <h3>Iceland: A Luxury Trip Chasing the Northern Lights</h3>
                <p>Our expert guides are some of Iceland's best Borealis hunters Come winter,...
                  From £8,400 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>
            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature6.png">
              <div class="h-s-card-content">
                <h3>Tokyo & Kyoto: A Japan family holiday</h3>
                <p>The ultimate family tour of Japan Konnichiwa.. Here at Black Tomato our...
                  From £13,750 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <!-- DUPLICATE CARD (10 TOTAL) -->
            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature7.png">
              <div class="h-s-card-content">
                <h3>Wyoming: A Family Adventure in Yellowstone & Grand Teton</h3>
                <p>River rafting, hiking and horseback exploration through the heart of the...
                  From £6,700 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature8.png">
              <div class="h-s-card-content">
                <h3>Ladakh: Mountain Monasteries & Untouched Landscapes</h3>
                <p>The Himalayan Kingdom of Ladakh is one of the few places...
                  From £7,950 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature9.png">
              <div class="h-s-card-content">
                <h3>Kenya: The Ultimate Family Safari</h3>
                <p>The first safari is one of those long anticipated moments in...
                  From £8,000 per person excl. flights</p>
                <a href="#">Explore Trip</a>
              </div>
            </div>

            <div class="h-s-card h-s-image-card">
              <img src="assets/images/nature10.png">
              <div class="h-s-card-content">
                <h3>Create your own itinerary</h3>
                <p>
                  Our Travel Experts will help you create a completely bespoke itinerary. Just tell us what you want.
                  We'll
                  make it happen.
                </p>
                <a href="#">Create trip</a>

              </div>
            </div>

            <div class="h-s-card h-s-destination-card">
              <a href="destination.php">EXPLORE DESTINATIONS</a>
            </div>

          </div>


        </section>



        <!-- RIGHT ARROW -->
        <button class="hs-arrow right">&#10095;</button>

      </section>
    </section>

    <!-- *************************************** HORIZONTAL SCROLL SECTION ENDS *******************************************************  -->






    <!-- ***************************************** SECTION 8 ***************************************** -->

    <div class="why-choose-title">
      <h2>Our Itineraries</h2>
      <div class="animated-border"></div>
      <p>
        Discover thoughtfully crafted itineraries designed to match your travel style, pace, and interests.
        Each journey blends comfort, experiences, and unforgettable destinations.
      </p>
    </div>


    <section class="row-3">

      <!-- SLIDER CONTAINER -->
      <div class="row-3-slider-container">
        <button class="row-3-nav row-3-prev">&#10094;</button>

        <div class="row-3-slider">
          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide6.png')">
            <h3>Maldives</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide3.png')">
            <h3>Kenya – Tanzania – Rwanda</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide4.png')">
            <h3>India</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide5.png')">
            <h3>Thailand</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide6.png')">
            <h3>Maldives</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide2.png')">
            <h3>Egypt</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide" style="background-image:url('assets/images/slider/slide7.png')">
            <h3>Dubai</h3><a href="#">Read More</a>
          </div>

          <div class="row-3-slide more-itineraries">
            <a href="itineraries.php">MORE ITINERARIES</a>
          </div>


        </div>

        <button class="row-3-nav row-3-next">&#10095;</button>
      </div>
    </section>


    <!-- ***************************************** SECTION 9 ***************************************** -->

    <!-- ***************************************** OUR PROCESS ***************************************** -->





    <section class="process-section">

      <div class="why-choose-title">
        <h2>Our Process</h2>
        <div class="animated-border"></div>
        <p> We turn your travel ideas into perfectly planned journeys with expert guidance at every step.
          From planning to your return, we ensure a smooth and stress-free experience.
        </p>
      </div>


      <div class="timeline">

        <div class="step left">
          <div class="step-number">1</div>
          <div class="step-content">
            <div class="step-title">Get in Touch with us.</div>
          </div>
        </div>

        <div class="step right">
          <div class="step-number">2</div>
          <div class="step-content">
            <div class="step-title">Share with us your Travel Idea.</div>
          </div>
        </div>

        <div class="step left">
          <div class="step-number">3</div>
          <div class="step-content">
            <div class="step-title">Get your itineraries design with us</div>
          </div>
        </div>

        <div class="step right">
          <div class="step-number">4</div>
          <div class="step-content">
            <div class="step-title">Book your holiday.</div>
          </div>
        </div>

        <div class="step left">
          <div class="step-number">5</div>
          <div class="step-content">
            <div class="step-title">Continuous support throughout your trip.</div>
          </div>
        </div>

        <div class="step right">
          <div class="step-number">6</div>
          <div class="step-content">
            <div class="step-title">You are back with great memories and maintaining relationship with us.</div>
          </div>
        </div>

      </div>
    </section>






    <!-- ***************************************** SECTION 10 ***************************************** -->
  <?php
   include "footer.php";
  ?>
  <script>
  
  // <!-- *****************************************  HERO SLIDER KE NICHE KE ICONS  ***************************************** -->


document.addEventListener("DOMContentLoaded", function () {

  const slider = document.querySelector('.premium-icon-section');
  const nextBtn = document.querySelector('.arrow-btn.right');
  const prevBtn = document.querySelector('.arrow-btn.left');

  if (!slider) return; // agar section nahi mila to code stop

  let isDragging = false;
  let startX = 0;
  let scrollLeft = 0;

  /* ================= MOUSE DRAG ================= */

  slider.addEventListener('mousedown', function (e) {
    isDragging = true;
    startX = e.pageX;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('mouseup', function () {
    isDragging = false;
  });

  slider.addEventListener('mouseleave', function () {
    isDragging = false;
  });

  slider.addEventListener('mousemove', function (e) {
    if (!isDragging) return;
    e.preventDefault();
    const walk = (e.pageX - startX) * 1.5;
    slider.scrollLeft = scrollLeft - walk;
  });

  /* ================= TOUCH SWIPE ================= */

  slider.addEventListener('touchstart', function (e) {
    startX = e.touches[0].pageX;
    scrollLeft = slider.scrollLeft;
  });

  slider.addEventListener('touchmove', function (e) {
    const walk = (e.touches[0].pageX - startX) * 1.5;
    slider.scrollLeft = scrollLeft - walk;
  });

  /* ================= ARROWS ================= */

  if (nextBtn) {
    nextBtn.addEventListener('click', function () {
      slider.scrollBy({
        left: slider.clientWidth,
        behavior: 'smooth'
      });
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener('click', function () {
      slider.scrollBy({
        left: -slider.clientWidth,
        behavior: 'smooth'
      });
    });
  }

});
//  ***************************************** EXPLORE YOUR JOURNEY ***************************************** 

 (function(){
  // Slider function
  function initSlider(sliderSelector, nextSelector, prevSelector) {
    const slider = document.querySelector(sliderSelector);
    const nextBtn = document.querySelector(nextSelector);
    const prevBtn = document.querySelector(prevSelector);

    if(!slider) return;

    function getSlideWidth() {
      const slide = slider.querySelector(".img-box");
      if(!slide) return 0;
      const style = window.getComputedStyle(slide);
      const gap = parseInt(getComputedStyle(slider).gap) || 0;
      return slide.offsetWidth + gap;
    }

    // Buttons
    nextBtn?.addEventListener("click", ()=> {
      slider.scrollBy({ left: getSlideWidth(), behavior:"smooth" });
    });
    prevBtn?.addEventListener("click", ()=> {
      slider.scrollBy({ left: -getSlideWidth(), behavior:"smooth" });
    });

    // Drag
    let isDown=false, startX=0, scrollLeft=0;
    slider.addEventListener("pointerdown",(e)=>{
      isDown=true;
      startX=e.pageX;
      scrollLeft=slider.scrollLeft;
      slider.setPointerCapture(e.pointerId);
    });
    slider.addEventListener("pointermove",(e)=>{
      if(!isDown) return;
      slider.scrollLeft = scrollLeft - (e.pageX - startX);
    });
    slider.addEventListener("pointerup",()=>{ isDown=false; });
    slider.addEventListener("pointerleave",()=>{ isDown=false; });
  }

  // Initialize slider
  document.addEventListener("DOMContentLoaded", ()=>{
    initSlider(".images-row", ".next-btn", ".prev-btn");
  });
})();

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
  

  <script src="assets/js/script.js"></script>
</body>

</html>