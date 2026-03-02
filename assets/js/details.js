document.addEventListener("DOMContentLoaded", function () {

  /* QUICK OVERVIEW */
  const quickElements = document.querySelectorAll(".trip-overview, .overview-left, .info-box-wrapper");

  if (quickElements.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.2 });

    quickElements.forEach(el => observer.observe(el));
  }


  /* DAY WISE PLAN */
  const timelineItems = document.querySelectorAll(".timeline-item");

  if (timelineItems.length) {
    const timelineObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        }
      });
    }, { threshold: 0.2 });

    timelineItems.forEach(el => timelineObserver.observe(el));
  }


  /* TIMELINE LINE */
  const timeline = document.querySelector(".timeline");

  if (timeline) {
    const lineObserver = new IntersectionObserver((entries) => {
      if (entries[0].isIntersecting) {
        timeline.classList.add("show-line");
      }
    }, { threshold: 0.3 });

    lineObserver.observe(timeline);
  }


  /* INCLUSION EXCLUSION */
  const revealElements = document.querySelectorAll(".reveal");
  const dividerLine = document.querySelector(".divider-line");

  if (revealElements.length) {
    const revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
          if (dividerLine) dividerLine.classList.add("show");
        }
      });
    }, { threshold: 0.3 });

    revealElements.forEach(el => revealObserver.observe(el));
  }


  /* HORIZONTAL SCROLL (SAFE) */
  const horslider = document.querySelector('.horizontal-section');

  if (horslider) {
    let isDown = false;
    let startX;
    let scrollLeft;

    horslider.addEventListener('mousedown', (e) => {
      if (e.target.closest('.hs-arrow')) return;
      isDown = true;
      startX = e.pageX - horslider.offsetLeft;
      scrollLeft = horslider.scrollLeft;
    });

    horslider.addEventListener('mouseleave', () => isDown = false);
    horslider.addEventListener('mouseup', () => isDown = false);

    horslider.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - horslider.offsetLeft;
      const walk = (x - startX) * 1.5;
      horslider.scrollLeft = scrollLeft - walk;
    });

    const rightArrow = document.querySelector('.hs-arrow.right');
    const leftArrow = document.querySelector('.hs-arrow.left');

    if (rightArrow) {
      rightArrow.addEventListener('click', () => {
        horslider.scrollBy({ left: 350, behavior: 'smooth' });
      });
    }

    if (leftArrow) {
      leftArrow.addEventListener('click', () => {
        horslider.scrollBy({ left: -350, behavior: 'smooth' });
      });
    }
  }

});