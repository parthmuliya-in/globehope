<?php
session_start();
require 'include/config.php'; // your DB connection

if (isset($_POST['submit_contact'])) {

  // Sanitize Inputs
  $full_name = trim($_POST['full_name']);
  $email = trim($_POST['email']);
  $phone = trim($_POST['phone']);
  $travel_category = trim($_POST['travel_category']);
  $message = trim($_POST['message']);
  $captcha_input = trim($_POST['captcha_input']);

  // Basic Validation
  $errors = [];

  if (empty($full_name) || strlen($full_name) < 3) {
    $errors[] = "Full name must be at least 3 characters.";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
  }

  if (!preg_match('/^[0-9]{10}$/', $phone)) {
    $errors[] = "Phone number must be 10 digits.";
  }

  if (empty($travel_category)) {
    $errors[] = "Please select travel category.";
  }

  if (strlen($message) < 10) {
    $errors[] = "Message must be at least 10 characters.";
  }

  if (!hash_equals($_SESSION['captcha'], strtoupper(trim($captcha_input)))) {
    $errors[] = "Invalid Captcha.";
  }

  if (!empty($errors)) {
    echo "<script>alert('" . implode("\\n", $errors) . "');</script>";
  } else {

    $stmt = mysqli_prepare($conn, "INSERT INTO contact_enquiries 
        (full_name, email, phone, travel_category, message) 
        VALUES (?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param(
      $stmt,
      "sssss",
      $full_name,
      $email,
      $phone,
      $travel_category,
      $message
    );

    if (mysqli_stmt_execute($stmt)) {

      unset($_SESSION['captcha']);

      echo "<script>
        alert('Thank you! We will contact you soon.');
        window.location='contact.php';
        </script>";

    } else {
      echo "<script>alert('Something went wrong.');</script>";
    }
    mysqli_stmt_close($stmt);

    // mysqli_stmt_close($stmt);
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/images/fav.png" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/contact.css">


  <!-- Favicon -->
  <link rel="icon" href="assets/images/fav.jpeg" type="image/png">


</head>

<body>

  <!-- ***************************************** HEADER START ***************************************** -->
  <?php
  include "header.php";
  ?>
  <!-- ***************************************** HEADER START ENDS ***************************************** -->

  <main>

    <!-- banner -->
    <section class="contact-banner">
      <img src="assets/images/aa.jpg" alt="Contact Banner">
      <div class="banner-text">
        <h1>Let's get in touch</h1>
        <p>Our team is here to help</p>
      </div>
    </section>
    <!-- banner end -->

    <!-- <div class="contact-section-title">
      <h2>Get in Touch</h2>
      <div class="animated-border"></div>
      <p class="get">Planning your next journey? Get in touch with us and let our travel experts craft a personalized
        experience just for you. Whether you are looking for a relaxing getaway, a family holiday, or an
        adventurous escape, we are here to help you.</p>

    </div> -->

    <div class="why-choose-title">
      <h2>Get in Touch</h2>
      <div class="animated-border"></div>
      <p>Planning your next journey? Get in touch with us and let our travel experts craft a personalized
        experience just for you. Whether you are looking for a relaxing getaway, a family holiday, or an
        adventurous escape, we are here to help you.</p>
    </div>

    <section class="contact-section">
      <div class="contact-row">

        <!-- LEFT FORM -->
        <!-- <div class="contact-form">
          <h2>Globe Hop</h2>
          <input type="text" placeholder="Full Name">
          <input type="email" placeholder="Email">
          <input type="tel" placeholder="Contact No"> -->

        <!-- DROPDOWN -->
        <!-- <div class="dropdown-row">
            <div class="custom-dropdown">
              <div class="dropdown-input">
                <span>Travel Categories</span>
                <i class="fa-solid fa-chevron-down"></i>
              </div>
              <ul class="dropdown-options">
                <li>Solo</li>
                <li>Couple</li>
                <li>Groups</li>
                <li>Family</li>
                <li>Corporate</li>
              </ul>
            </div>
          </div>

          <textarea placeholder="Write your requirements"></textarea> -->

        <!-- CAPTCHA -->
        <!-- <div class="captcha-wrap">
            <div class="captcha-row">
              <div class="captcha-code" id="captchaCode"></div>
              <button type="button" id="refreshCaptcha"><i class="fa-solid fa-arrows-rotate"></i></button>
              <input type="text" id="captchaInput" placeholder="Enter Captcha">
            </div>
          </div>

          <button type="submit" class="submit-btn">Submit</button>
        </div> -->

        <div class="contact-form">
          <h2>Globe Hop</h2>

          <form method="POST" action="" autocomplete="off">

            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Contact No" required>

            <!-- Hidden field for dropdown -->
            <input type="hidden" name="travel_category" id="travelCategory">

            <!-- DROPDOWN -->
            <div class="dropdown-row">
              <div class="custom-dropdown">
                <div class="dropdown-input">
                  <span id="selectedCategory">Travel Categories</span>
                  <i class="fa-solid fa-chevron-down"></i>
                </div>
                <ul class="dropdown-options">
                  <li>Solo</li>
                  <li>Couple</li>
                  <li>Groups</li>
                  <li>Family</li>
                  <li>Corporate</li>
                </ul>
              </div>
            </div>

            <textarea name="message" placeholder="Write your requirements" required></textarea>

            <!-- CAPTCHA -->
            <div class="captcha-wrap">
              <div class="captcha-row">
                <div class="captcha-code" id="captchaCode">
                  <?php echo $_SESSION['captcha']; ?>
                </div>
                <button type="button" id="refreshCaptcha"><i class="fa-solid fa-arrows-rotate"></i></button>
                <input type="text" name="captcha_input" placeholder="Enter Captcha" required>
              </div>
            </div>

            <button type="submit" name="submit_contact" class="submit-btn">Submit</button>
          </form>
        </div>
        <!-- RIGHT CARDS -->
        <div class="contact-card-column">
          <div class="service-wrapper">
            <div class="serviceBox text-center">
              <div class="icon"><i class="fa-solid fa-phone"></i></div>
              <p>+91 9948069800</p>
            </div>
            <div class="serviceBox text-center">
              <div class="icon"><i class="fa-solid fa-envelope"></i></div>
              <p>hello@globehop365.com</p>
            </div>
          </div>
          <div class="service-wrapper">
            <div class="serviceBox text-center">
              <div class="icon"><i class="fa-solid fa-location-dot"></i></div>
              <p>3-133/1/G-3A, Virat Residency, Dulapally Road, Kompally, Hyderabad 500100, India</p>
            </div>
            <div class="serviceBox text-center">
              <div class="icon"><i class="fa-solid fa-house-circle-check"></i></div>
              <p>Mon – Sat: 10:00 AM – 7:00 PM<br>Sun: Closed</p>
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

    <script>
      // ********************************header******************************************
      const toggle = document.querySelector(".menu-toggle");
      const menu = document.querySelector(".menu");
      const dropdowns = document.querySelectorAll(".has-dropdown");

      toggle.addEventListener("click", () => {
        menu.classList.toggle("active");
      });

      dropdowns.forEach(dropdown => {
        const link = dropdown.querySelector(".nav-link");

        link.addEventListener("click", (e) => {
          if (window.innerWidth <= 992) {
            e.preventDefault();
            dropdown.classList.toggle("active");
          }
        });
      });




      //  ***************************************** SECTION 10 *****************************************
      //  ***************************************** WHY US SECTION ***************************************** 

      document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".whyTravel-section");

        if (!sections.length) return;

        const observer = new IntersectionObserver(
          (entries, obs) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                entry.target.classList.add("whyTravel-show");
                obs.unobserve(entry.target);
              }
            });
          },
          { threshold: 0.35 }
        );

        sections.forEach(section => observer.observe(section));
      });


      //  ***************************************** SECTION 11 *****************************************
      // ***************************************** GET IN TOUCH HOME ***************************************** 

      document.addEventListener("DOMContentLoaded", () => {
        const section = document.querySelector(".travelContact-section");
        const textBox = document.getElementById("travelContactText");
        const image = document.querySelector(".travelContact-image img");

        const observer = new IntersectionObserver(
          (entries, obs) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                textBox.classList.add("travelContact-show");
                textBox.querySelector("p").classList.add("travelContact-subShow");
                image.style.transform = "scale(1)";

                obs.unobserve(entry.target);
              }
            });
          },
          {
            threshold: 0.4
          }
        );

        observer.observe(section);
      });
      document.getElementById("refreshCaptcha").addEventListener("click", function () {

        fetch("refresh_captcha.php")
          .then(response => response.text())
          .then(data => {
            document.getElementById("captchaCode").textContent = data;
          });

      });
    </script>


    <script src="assets/js/travel-header.js"></script>
    <script src="assets/js/contact.js"></script>

</body>

</html>