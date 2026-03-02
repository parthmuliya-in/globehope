//   <!-- *****************************************  SECTION 1 ***************************************** -->

    const observershow = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.3 });

    document.querySelectorAll('.about-images, .about-content')
      .forEach(el => observershow.observe(el));

//   <!-- *****************************************  SECTION 2 ***************************************** -->

//    <!-- *****************************************  SECTION 3 ***************************************** -->

const paragraphs = document.querySelectorAll("#typingWrapper p");
let current = 0;

function showNextLine() {
    if (current < paragraphs.length) {
        paragraphs[current].classList.add("visible");
        current++;
        setTimeout(showNextLine, 100); // Delay between lines (ms)
    }
}

/* Trigger on scroll */
const observer = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
        showNextLine();
        observer.disconnect();
    }
}, { threshold: 0 });

observer.observe(document.querySelector(".about-typing-section"));


//     <!-- *****************************************  SECTION 4 ***************************************** -->




//   <!-- *****************************************  SECTION 5 ***************************************** -->

// const r5Container = document.querySelector(".r5flex");

// // Tilt effect
// r5Container.addEventListener("mousemove", (e) => {
//     const box = r5Container.getBoundingClientRect();
//     const x = e.clientX - box.left;
//     const y = e.clientY - box.top;

//     const cx = box.width / 2;
//     const cy = box.height / 2;

//     const rotateY = ((x - cx) / cx) * 10;
//     const rotateX = ((cy - y) / cy) * 10;

//     r5Container.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
// });

// // Reset tilt
// r5Container.addEventListener("mouseleave", () => {
//     r5Container.style.transform = "rotateX(0deg) rotateY(0deg)";
// });

// // Border hover effect
// r5Container.addEventListener("mousemove", (e) => {
//     const r = r5Container.getBoundingClientRect();
//     const x = e.clientX - r.left;
//     const y = e.clientY - r.top;

//     const w = r.width;
//     const h = r.height;

//     const left = x < w * 0.33;
//     const right = x > w * 0.66;
//     const top = y < h * 0.33;
//     const bottom = y > h * 0.66;

//     r5Container.style.borderTopColor = "transparent";
//     r5Container.style.borderBottomColor = "transparent";
//     r5Container.style.borderLeftColor = "transparent";
//     r5Container.style.borderRightColor = "transparent";

//     if (left) r5Container.style.borderLeftColor = "#c8a24d";
//     if (right) r5Container.style.borderRightColor = "#c8a24d";
//     if (top) r5Container.style.borderTopColor = "#c8a24d";
//     if (bottom) r5Container.style.borderBottomColor = "#c8a24d";


// });

// // Reset borders
// r5Container.addEventListener("mouseleave", () => {
//     r5Container.style.borderTopColor = "transparent";
//     r5Container.style.borderBottomColor = "transparent";
//     r5Container.style.borderLeftColor = "transparent";
//     r5Container.style.borderRightColor = "transparent";
// });

// const container = document.querySelector(".scroll-content");
// let delay = 3000;
// let slideDuration = 700;

// function slideNext() {

//     const first = container.children[0];

//     // Slide first box UP
//     first.style.transition = `transform ${slideDuration}ms ease, opacity ${slideDuration}ms ease`;
//     first.style.transform = "translateY(-100%)";
//     first.style.opacity = "0";

//     setTimeout(() => {

//         // Move first box to bottom
//         container.appendChild(first);

//         // Reset style so it appears normal again
//         first.style.transition = "none";
//         first.style.transform = "translateY(0)";
//         first.style.opacity = "1";

//         // Continue loop
//         setTimeout(slideNext, delay);

//     }, slideDuration);
// }

// slideNext();
// // 
// change js
const r5Container = document.querySelector(".r5flex");
const container = document.querySelector(".scroll-content");
 
let delay = 3000;
let slideDuration = 700;
 
 
 
 
 
/* =========================
   TILT EFFECT
========================= */
 
r5Container.addEventListener("mousemove", (e) => {
  const box = r5Container.getBoundingClientRect();
  const x = e.clientX - box.left;
  const y = e.clientY - box.top;
 
  const cx = box.width / 2;
  const cy = box.height / 2;
 
  const rotateY = ((x - cx) / cx) * 10;
  const rotateX = ((cy - y) / cy) * 10;
 
  r5Container.style.transform =
    `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
});
 
r5Container.addEventListener("mouseleave", () => {
  r5Container.style.transform = "rotateX(0deg) rotateY(0deg)";
});
 
 
 
 
 
/* =========================
   BORDER COLOR EFFECT
========================= */
 
r5Container.addEventListener("mousemove", (e) => {
  const r = r5Container.getBoundingClientRect();
  const x = e.clientX - r.left;
  const y = e.clientY - r.top;
 
  const w = r.width;
  const h = r.height;
 
  r5Container.style.borderTopColor = "transparent";
  r5Container.style.borderBottomColor = "transparent";
  r5Container.style.borderLeftColor = "transparent";
  r5Container.style.borderRightColor = "transparent";
 
  if (x < w * 0.33) r5Container.style.borderLeftColor = "#c8a24d";
  if (x > w * 0.66) r5Container.style.borderRightColor = "#c8a24d";
  if (y < h * 0.33) r5Container.style.borderTopColor = "#c8a24d";
  if (y > h * 0.66) r5Container.style.borderBottomColor = "#c8a24d";
});
 
r5Container.addEventListener("mouseleave", () => {
  r5Container.style.borderTopColor = "transparent";
  r5Container.style.borderBottomColor = "transparent";
  r5Container.style.borderLeftColor = "transparent";
  r5Container.style.borderRightColor = "transparent";
});
 
 
 
 
 
/* =========================
   SLIDER SYSTEM
========================= */
 
function desktopSlider() {
  const first = container.children[0];
 
  first.style.transition = `transform ${slideDuration}ms ease`;
  first.style.transform = "translateY(-100%)";
 
  setTimeout(() => {
    container.appendChild(first);
    first.style.transition = "none";
    first.style.transform = "translateY(0)";
  }, slideDuration);
}
 
function mobileSlider() {
  const first = container.children[0];
  const second = container.children[1];
 
  if (!second) return;
 
  first.style.transition = `transform ${slideDuration}ms ease`;
  second.style.transition = `transform ${slideDuration}ms ease`;
 
  first.style.transform = "translateY(-100%)";
  second.style.transform = "translateY(-100%)";
 
  setTimeout(() => {
    container.appendChild(first);
    container.appendChild(second);
 
    first.style.transition = "none";
    second.style.transition = "none";
 
    first.style.transform = "translateY(0)";
    second.style.transform = "translateY(0)";
  }, slideDuration);
}
 
function runSlider() {
  if (window.innerWidth <= 768) {
    mobileSlider();
  } else {
    desktopSlider();
  }
}
 
setInterval(runSlider, delay);
 
// change js end