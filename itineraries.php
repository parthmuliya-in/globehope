<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Itineraries</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/css/itineraries.css">
    <link rel="stylesheet" href="assets/css/itineraries-1.css">
    <link rel="stylesheet" href="assets/css/style.css">


    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    <!-- Favicon -->
    <link rel="icon" href="assets/images/fav.png" type="image/png">

    <!-- Add this in your <head> before </head> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>


</head>

<body>
    <?php
    include "header.php";
    ?>

    <!-- ***************************************** HEADER START ENDS ***************************************** -->

    <!-- ***************************************** HERO ***************************************** -->

    <section class="hero">
        <div class="hero-content">
            <h1>Explore Our Itineraries</h1>
            <p>Carefully curated journeys for unforgettable experiences</p>
        </div>
    </section>


    <!-- ***************************************** RECOMMENDED JOURNEYS TABS ***************************************** -->

    <!-- JOURNEYS -->

    <div class="why-choose-title">
        <h2>Recommended Journeys</h2>
        <div class="animated-border"></div>
    </div>

    <div class="itineraries-tabs-wrapper">
        <!-- MOBILE FILTER TOGGLE -->
        <div class="mobile-filter-toggle">
            <span>Filter Journeys</span>
            <i class="fa-solid fa-filter"></i>
        </div>

        <div class="itineraries-tabs">
            <button class="itineraries-tab-btn itineraries-active" data-tab="culture">ALL</button>
            <button class="itineraries-tab-btn" data-tab="solo">SOLO</button>
            <button class="itineraries-tab-btn" data-tab="couple">COUPLE</button>
            <button class="itineraries-tab-btn" data-tab="groups">GROUPS</button>
            <button class="itineraries-tab-btn" data-tab="family">FAMILY</button>
            <button class="itineraries-tab-btn" data-tab="corporate">CORPORATE</button>

        </div>
    </div>

    <!-- ===== ALL ===== -->
    <div class="itineraries-tab-content itineraries-active" id="culture">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c1"></div>
                <div class="itineraries-card-body">
                    <h3>Heritage Walk</h3>
                    <p>Explore ancient streets, historic monuments, and cultural landmarks that reflect centuries of
                        tradition, architecture, and local heritage.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c2"></div>
                <div class="itineraries-card-body">
                    <h3>Museum Trails</h3>
                    <p>Discover curated museums showcasing art, history, artifacts, and stories that define regional
                        culture and timeless civilization.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c3"></div>
                <div class="itineraries-card-body">
                    <h3>Traditional Arts</h3>
                    <p>Witness music, dance and handicrafts passed through generations.</p><a href="#"
                        class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c4"></div>
                <div class="itineraries-card-body">
                    <h3>Architectural Wonders</h3>
                    <p>Witness local music, dance, handicrafts, and creative expressions passed down through
                        generations.

                    </p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c5"></div>
                <div class="itineraries-card-body">
                    <h3>Cultural Festivals</h3>
                    <p>Experience forts, palaces, temples, and historical structures showcasing remarkable
                        craftsmanship.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?c6"></div>
                <div class="itineraries-card-body">
                    <h3>Local Cuisine</h3>
                    <p>Celebrate vibrant festivals filled with colors, rituals, performances, and joyful traditions.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>

        </div>
    </div>

    <!-- ===== SOLO ===== -->
    <div class="itineraries-tab-content" id="solo">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a1"></div>
                <div class="itineraries-card-body">
                    <h3>Mountain Trekking</h3>
                    <p>Experience thrilling mountain treks through rugged trails, scenic valleys, and breathtaking
                        landscapes designed for adventure lovers.</p><a href="#" class="itineraries-btn">View More
                        Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a2"></div>
                <div class="itineraries-card-body">
                    <h3>River Rafting</h3>
                    <p>Enjoy high-energy river rafting adventures through powerful rapids and stunning natural
                        surroundings.</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a3"></div>
                <div class="itineraries-card-body">
                    <h3>Jungle Camping</h3>
                    <p>Stay deep in the jungle with guided nature walks, bonfire nights, and unforgettable outdoor
                        experiences.</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a4"></div>
                <div class="itineraries-card-body">
                    <h3>Desert Safari</h3>
                    <p>Explore vast deserts with dune bashing, camel rides, cultural performances, and sunset views.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a5"></div>
                <div class="itineraries-card-body">
                    <h3>Snow Adventures</h3>
                    <p>Indulge in snow sports like skiing, snowboarding, and winter trekking in snowy landscapes.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a6"></div>
                <div class="itineraries-card-body">
                    <h3>Extreme Sports</h3>
                    <p>Push your limits with bungee jumping, paragliding, and high-adrenaline sports experiences.</p><a
                        href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>

        </div>
    </div>
    <!----family---->
    <div class="itineraries-tab-content" id="family">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f1"></div>
                <div class="itineraries-card-body">
                    <h3>Theme Parks</h3>
                    <p>Enjoy exciting theme parks, fun rides, and family-friendly attractions suitable for all age
                        groups.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f2"></div>
                <div class="itineraries-card-body">
                    <h3>Beach Holidays</h3>
                    <p>Relax at family-friendly beaches with calm waters, resorts, and safe activities.</p>
                    <a href="#" class="itineraries-btn">View Plan</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f3"></div>
                <div class="itineraries-card-body">
                    <h3>Hill Stations</h3>
                    <p>Spend quality time in scenic hill stations offering pleasant weather and peaceful surroundings.
                    </p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f4"></div>
                <div class="itineraries-card-body">
                    <h3>Resort Stays</h3>
                    <p>Enjoy comfortable resort stays with entertainment, pools, and kids activities.</p><a href="#"
                        class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f5"></div>
                <div class="itineraries-card-body">
                    <h3>Zoo Visits</h3>
                    <p>Explore wildlife parks and zoos for educational and fun family experiences.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>


                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?f6"></div>
                <div class="itineraries-card-body">
                    <h3>City Tours</h3>
                    <p>Discover major city attractions with guided tours and convenient travel plans.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>

        </div>
    </div>

    <!-- ===== COUPLE ===== -->
    <div class="itineraries-tab-content" id="couple">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a1"></div>
                <div class="itineraries-card-body">
                    <h3>Mountain Trekking</h3>
                    <p>Experience thrilling mountain treks through rugged trails, scenic valleys, and breathtaking
                        landscapes designed for adventure lovers.</p><a href="#" class="itineraries-btn">View More
                        Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a2"></div>
                <div class="itineraries-card-body">
                    <h3>River Rafting</h3>
                    <p>Enjoy high-energy river rafting adventures through powerful rapids and stunning natural
                        surroundings.</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a3"></div>
                <div class="itineraries-card-body">
                    <h3>Jungle Camping</h3>
                    <p>Stay deep in the jungle with guided nature walks, bonfire nights, and unforgettable outdoor
                        experiences.</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a4"></div>
                <div class="itineraries-card-body">
                    <h3>Desert Safari</h3>
                    <p>Explore vast deserts with dune bashing, camel rides, cultural performances, and sunset views.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a5"></div>
                <div class="itineraries-card-body">
                    <h3>Snow Adventures</h3>
                    <p>Indulge in snow sports like skiing, snowboarding, and winter trekking in snowy landscapes.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?a6"></div>
                <div class="itineraries-card-body">
                    <h3>Extreme Sports</h3>
                    <p>Push your limits with bungee jumping, paragliding, and high-adrenaline sports experiences.</p><a
                        href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== GROUPS ===== -->
    <div class="itineraries-tab-content" id="groups">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h1"></div>
                <div class="itineraries-card-body">
                    <h3>Beach Romance</h3>
                    <p>Enjoy private beaches, candlelight dinners, and romantic sunsets for unforgettable moments.</p><a
                        href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h2"></div>
                <div class="itineraries-card-body">
                    <h3>Hill Retreats</h3>
                    <p>Relax in serene hill resorts surrounded by misty views and peaceful nature.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h3"></div>
                <div class="itineraries-card-body">
                    <h3>Luxury Cruises</h3>
                    <p>Sail together on luxury cruises with premium amenities and scenic ocean views.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h4"></div>
                <div class="itineraries-card-body">
                    <h3>Island Escapes</h3>
                    <p>Discover exotic islands offering privacy, crystal waters, and tropical beauty.</p><a href="#"
                        class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h5"></div>
                <div class="itineraries-card-body">
                    <h3>Romantic Cities</h3>
                    <p>Explore charming cities known for romance and culture.</p><a href="#"
                        class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?h6"></div>
                <div class="itineraries-card-body">
                    <h3>Private Villas</h3>
                    <p>Stay in exclusive villas with privacy, comfort, and premium services.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>

        </div>
    </div>

    <!-- ===== FAMILY ===== -->
    <div class="itineraries-tab-content" id="corporate">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w1"></div>
                <div class="itineraries-card-body">
                    <h3>Safari Tours</h3>
                    <p>Experience thrilling safaris through national parks and wildlife reserves.
                    <p>Walk through lush rainforests filled with diverse flora and fauna.</p>
                    </p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w2"></div>
                <div class="itineraries-card-body">
                    <h3>Bird Watching</h3>
                    <p>Observe exotic birds in their natural habitats with expert-guided tours.Walk through lush
                        rainforests filled with diverse flora and fauna.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w3"></div>
                <div class="itineraries-card-body">
                    <h3>Rainforest Trails</h3>
                    <p>Walk through lush rainforests filled with diverse flora and fauna.Walk through lush rainforests
                        filled with diverse flora and fauna.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w4"></div>
                <div class="itineraries-card-body">
                    <h3>Nature Photography</h3>
                    <p>Capture stunning wildlife moments guided by professional photographersCapture stunning wildlife
                        moments guided by professional photographers.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w5"></div>
                <div class="itineraries-card-body">
                    <h3>Eco Lodges</h3>
                    <p>Stay in eco-friendly lodges surrounded by wilderness Stay in eco-friendly lodges surrounded by
                        pristine wilderness.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?w6"></div>
                <div class="itineraries-card-body">
                    <h3>Wildlife Conservation</h3>
                    <p>Learn about conservation efforts and wildlife protection Learn about conservation efforts and
                        wildlife protection</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>

        </div>
    </div>

    <!-- ===== CORPORATE ===== -->
    <div class="itineraries-tab-content" id="spiritual">
        <div class="itineraries-cards-grid">

            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s1"></div>
                <div class="itineraries-card-body">
                    <h3>Pilgrimage Tours</h3>
                    <p>Visit sacred temples, shrines, and holy destinations across regions Visit sacred temples,
                        shrines, and holy destinations across regions.</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s2"></div>
                <div class="itineraries-card-body">
                    <h3>Meditation Retreats</h3>
                    <p>Rejuvenate your mind and soul with meditation retreats.</p><a href="#"
                        class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s3"></div>
                <div class="itineraries-card-body">
                    <h3>Ashram Stays</h3>
                    <p>Rejuvenate your mind and soul with guided meditation and yoga retreats with guided meditation and
                        yoga retreats</p><a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s4"></div>
                <div class="itineraries-card-body">
                    <h3>Sacred Rivers</h3>
                    <p>Witness spiritual rituals along sacred rivers Witness spiritual rituals along sacred rivers</p>
                    <a href="#" class="itineraries-btn">View More Details</a>

                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s5"></div>
                <div class="itineraries-card-body">
                    <h3>Temple Architecture</h3>
                    <p>Explore spiritual architecture reflecting ancient beliefs Explore spiritual architecture
                        reflecting ancient beliefs</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>
            <div class="itineraries-card itineraries-reveal">
                <div class="itineraries-card-img"><img src="https://picsum.photos/600/500?s6"></div>
                <div class="itineraries-card-body">
                    <h3>Spiritual Festivals</h3>
                    <p>Participate in festivals filled with devotion and rituals Participate in festivals filled with
                        devotion and rituals</p>
                    <a href="#" class="itineraries-btn">View More Details</a>
                </div>
            </div>

        </div>
    </div>




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
    <script src="assets/js/itineraries.js"></script>
</body>

</html>