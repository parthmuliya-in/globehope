// ***************************************** HEADER START *****************************************
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

// ***************************************** HEADER ENDS *****************************************

//   <!-- ***************************************** SECTION 3 ***************************************** -->
// <!-- ***************************************** HERO SLIDER ***************************************** -->

document.addEventListener("DOMContentLoaded", () => {
  const slides = document.querySelectorAll(".slide");
  const dotsContainer = document.querySelector(".slider-dots");

  let currentIndex = 0;
  let interval;

  // CREATE DOTS DYNAMICALLY
  slides.forEach((_, i) => {
    const dot = document.createElement("span");
    dot.addEventListener("click", () => {
      goToSlide(i);
      resetAutoSlide();
    });
    dotsContainer.appendChild(dot);
  });

  const dots = dotsContainer.querySelectorAll("span");

  function goToSlide(index) {
    slides.forEach(s => s.classList.remove("active"));
    dots.forEach(d => d.classList.remove("active"));

    slides[index].classList.add("active");
    dots[index].classList.add("active");

    currentIndex = index;
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    goToSlide(currentIndex);
  }

  function startAutoSlide() {
    interval = setInterval(nextSlide, 4000); // change slide every 4s
  }

  function resetAutoSlide() {
    clearInterval(interval);
    startAutoSlide();
  }

  // START SLIDER FROM FIRST SLIDE
  goToSlide(0);
  startAutoSlide();
});



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



// <!-- ***************************************** SECTION 4 ***************************************** -->

gsap.registerPlugin(ScrollTrigger);

gsap.fromTo(".premium-icon-card",
  { opacity: 0, y: 50 },
  {
    opacity: 1,
    y: 0,
    duration: 0.8,
    stagger: 0.15,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".premium-icon-section",
      start: "top 80%",
      once: true
    }
  }
);

// <!-- ***************************************** SECTION 5 ***************************************** -->

gsap.registerPlugin(ScrollTrigger);

// LEFT SIDE TEXT & Features Animation
gsap.from(".travel-left > *", {
  scrollTrigger: {
    trigger: ".travel-section",
    start: "top 80%",
    toggleActions: "play none none none"
  },
  y: 40,
  opacity: 0,
  stagger: 0.15,
  duration: 1,
  ease: "power3.out"
});

// BIG IMAGE Animation
gsap.from(".big-img", {
  scrollTrigger: {
    trigger: ".travel-section",
    start: "top 80%",
    toggleActions: "play none none none"
  },
  scale: 1.1,
  opacity: 0,
  duration: 1.2
});

// SMALL IMAGE Animation
gsap.from(".small-img", {
  scrollTrigger: {
    trigger: ".travel-section",
    start: "top 80%",
    toggleActions: "play none none none"
  },
  x: 30,
  opacity: 0,
  duration: 1,
  ease: "power3.out"
});

//  ***************************************** EXPLORE YOUR JOURNEY ***************************************** 

(function () {
  // Slider function
  function initSlider(sliderSelector, nextSelector, prevSelector) {
    const slider = document.querySelector(sliderSelector);
    const nextBtn = document.querySelector(nextSelector);
    const prevBtn = document.querySelector(prevSelector);

    if (!slider) return;

    function getSlideWidth() {
      const slide = slider.querySelector(".img-box");
      if (!slide) return 0;
      const style = window.getComputedStyle(slide);
      const gap = parseInt(getComputedStyle(slider).gap) || 0;
      return slide.offsetWidth + gap;
    }

    // Buttons
    nextBtn?.addEventListener("click", () => {
      slider.scrollBy({ left: getSlideWidth(), behavior: "smooth" });
    });
    prevBtn?.addEventListener("click", () => {
      slider.scrollBy({ left: -getSlideWidth(), behavior: "smooth" });
    });

    // Drag
    let isDown = false, startX = 0, scrollLeft = 0;
    slider.addEventListener("pointerdown", (e) => {
      isDown = true;
      startX = e.pageX;
      scrollLeft = slider.scrollLeft;
      slider.setPointerCapture(e.pointerId);
    });
    slider.addEventListener("pointermove", (e) => {
      if (!isDown) return;
      slider.scrollLeft = scrollLeft - (e.pageX - startX);
    });
    slider.addEventListener("pointerup", () => { isDown = false; });
    slider.addEventListener("pointerleave", () => { isDown = false; });
  }

  // Initialize slider
  document.addEventListener("DOMContentLoaded", () => {
    initSlider(".images-row", ".next-btn", ".prev-btn");
  });
})();

//  ***************************************** SECTION 7 ***************************************** 

// *************************************** HORIZONTAL SCROLL SECTION ******************************************************* 

const horslider = document.querySelector('.horizontal-section');

if (horslider) {
  let isDown = false;
  let startX;
  let scrollLeft;

  horslider.addEventListener('mousedown', (e) => {

    /* 🔴 agar arrow pe click hua ho toh drag mat chalao */
    if (e.target.closest('.hs-arrow')) return;

    isDown = true;
    startX = e.pageX - horslider.offsetLeft;
    scrollLeft = horslider.scrollLeft;
  });

  horslider.addEventListener('mouseleave', () => {
    isDown = false;
  });

  horslider.addEventListener('mouseup', () => {
    isDown = false;
  });

  horslider.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - horslider.offsetLeft;
    const walk = (x - startX) * 1.5;
    horslider.scrollLeft = scrollLeft - walk;
  });

}

// **************************** left right arrow *****************************

const scrollContainer = document.querySelector('.horizontal-section');

document.querySelector('.hs-arrow.right').addEventListener('click', () => {
  scrollContainer.scrollBy({ left: 350, behavior: 'smooth' });
});

document.querySelector('.hs-arrow.left').addEventListener('click', () => {
  scrollContainer.scrollBy({ left: -350, behavior: 'smooth' });
});



//  *************************************** HORIZONTAL SCROLL SECTION ENDS *******************************************************

//  ***************************************** SECTION 8 *****************************************


const row3 = document.querySelector(".row-3");
const slider = document.querySelector(".row-3-slider");
const slides = document.querySelectorAll(".row-3-slide");
const prev = document.querySelector(".row-3-prev");
const next = document.querySelector(".row-3-next");

let index = 0;

function move() {
  const gap = parseInt(getComputedStyle(slider).gap) || 0;
  const w = slides[0].offsetWidth + gap;
  const max = slides.length * w - row3.offsetWidth;
  let x = index * w;
  if (x < 0) x = 0;
  if (x > max) x = max;
  slider.style.transform = `translateX(-${x}px)`;
}

// next.onclick = () => { index++; move(); };
// prev.onclick = () => { index--; if (index < 0) index = 0; move(); };
// window.addEventListener("resize", move);
// move();

if (row3 && slider && slides.length && prev && next) {

  next.onclick = () => { index++; move(); };
  prev.onclick = () => { index--; if (index < 0) index = 0; move(); };
  window.addEventListener("resize", move);
  move();

}

//  ***************************************** SECTION 9 *****************************************
//  ***************************************** OUR PROCESS *****************************************

const timeline = document.querySelector('.timeline');
const steps = document.querySelectorAll('.step');

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      timeline.classList.add('show-line');

      steps.forEach((step, index) => {
        setTimeout(() => {
          step.classList.add('show');
        }, index * 180);
      });

      observer.disconnect();
    }
  });
}, { threshold: 0.3 });

// observer.observe(timeline);
if (timeline) {
  observer.observe(timeline);
}



//  ***************************************** SECTION 10 
// section 10
// change

var wrapper = document.querySelector(".icons-section-wraper");

if (wrapper) {

  var slide = wrapper.querySelector(".icons-section");
  var leftBtn = wrapper.querySelector(".hs-arrow.left");
  var rightBtn = wrapper.querySelector(".hs-arrow.right");

  if (slide && leftBtn && rightBtn) {

    var card = slide.querySelector(".icon-card");

    if (card) {
      var style = getComputedStyle(card);
      var gap = parseInt(style.marginRight) || 20;
      var cardWidth = card.offsetWidth + gap;

      rightBtn.onclick = function () {
        slide.scrollLeft += cardWidth * 2;
      };

      leftBtn.onclick = function () {
        slide.scrollLeft -= cardWidth * 2;
      };
    }

  }

}

// var wrapper = document.querySelector(".icons-section-wraper");
// var slide = wrapper.querySelector(".icons-section");

// var leftBtn = wrapper.querySelector(".hs-arrow.left");
// var rightBtn = wrapper.querySelector(".hs-arrow.right");

// // Calculate card width including gap
// var card = slide.querySelector(".icon-card");
// var style = getComputedStyle(card);
// var gap = parseInt(style.marginRight) || 20; // gap from CSS
// var cardWidth = card.offsetWidth + gap;       // card width + gap

// rightBtn.onclick = function () {
//   slide.scrollLeft += cardWidth * 2;   // scroll exact 2 cards
// };

// leftBtn.onclick = function () {
//   slide.scrollLeft -= cardWidth * 2;   // scroll exact 2 cards
// };



// chane end
// *****************************************
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