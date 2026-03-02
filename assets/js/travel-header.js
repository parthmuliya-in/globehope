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


// ***************************************** SECTION 10 and 11 middle logo slider ***************************************** 
//  Duplicate logos for smooth infinite scroll 
const track = document.getElementById("logoTrack");
track.innerHTML += track.innerHTML;


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