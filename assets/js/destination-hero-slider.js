
const destinationSlides = document.querySelectorAll(".destination-slide");
const destinationTabs = document.querySelectorAll(".destination-slider-tab");
const destinationWrap = document.querySelector(".destination-slides");

let destinationIndex = 0;

function updateDestinationSlider() {
  destinationWrap.style.transform =
    `translateX(-${destinationIndex * 100}%)`;

  destinationSlides.forEach(s => s.classList.remove("active"));
  destinationTabs.forEach(t => t.classList.remove("active"));

  destinationSlides[destinationIndex].classList.add("active");
  destinationTabs[destinationIndex].classList.add("active");
}

// Auto-play
let sliderInterval = setInterval(() => {
  destinationIndex = (destinationIndex + 1) % destinationSlides.length;
  updateDestinationSlider();
}, 4500);

// Click on tabs
destinationTabs.forEach((tab, index) => {
  tab.addEventListener("click", () => {
    destinationIndex = index;
    updateDestinationSlider();
    clearInterval(sliderInterval);
    sliderInterval = setInterval(() => {
      destinationIndex = (destinationIndex + 1) % destinationSlides.length;
      updateDestinationSlider();
    }, 4500);
  });
});


// ***************************************************************** card hidden
document.querySelectorAll(".destination-section").forEach(section => {

  let shown = 0;
  const perClick = 5;

  const grid = section.querySelector(".destination-grid");
  const btn = section.querySelector(".load-more");
  const hiddenCards = grid.querySelectorAll(".destination-card.hidden");

  btn.addEventListener("click", () => {

    for (let i = shown; i < shown + perClick; i++) {
      if (hiddenCards[i]) {
        hiddenCards[i].classList.remove("hidden");
      }
    }

    shown += perClick;

    if (shown >= hiddenCards.length) {
      btn.style.display = "none";
    }

  });

});
