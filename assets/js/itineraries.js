
// ===== Hero Animation on Page Load =====
window.addEventListener('load', () => {
    gsap.fromTo(".hero",
        { scale: 1.1 },
        { scale: 1, duration: 2, ease: "power2.out" }
    );

    // Animate hero text
    gsap.from(".hero-content h1", {
        y: 50,
        opacity: 0,
        duration: 1.5,
        delay: 0.3,
        ease: "power3.out"
    });

    gsap.from(".hero-content p", {
        y: 30,
        opacity: 0,
        duration: 1.5,
        delay: 0.6,
        ease: "power3.out"
    });
});


// ******************************************* FILTER ITEMS CLICK *******************************************



const itinerariesTabs = document.querySelectorAll('.itineraries-tab-btn');
const itinerariesContents = document.querySelectorAll('.itineraries-tab-content');

itinerariesTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        itinerariesTabs.forEach(t => t.classList.remove('itineraries-active'));
        itinerariesContents.forEach(c => c.classList.remove('itineraries-active'));
        tab.classList.add('itineraries-active');
        document.getElementById(tab.dataset.tab).classList.add('itineraries-active');
        itinerariesReveal();
    });
});

function itinerariesReveal() {
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('itineraries-active');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: .35 });

    document.querySelectorAll('.itineraries-reveal').forEach(el => {
        el.classList.remove('itineraries-active');
        observer.observe(el);
    });
}
itinerariesReveal();



// Sticky Shadow Effect
window.addEventListener("scroll", function () {
    const tabs = document.querySelector(".itineraries-tabs-wrapper");

    if (window.scrollY > 300) {
        tabs.classList.add("sticky-active");
    } else {
        tabs.classList.remove("sticky-active");
    }
});

// ================= DESKTOP STICKY SHADOW =================
const tabsWrapper = document.querySelector(".itineraries-tabs-wrapper");

window.addEventListener("scroll", function () {

    if (window.innerWidth >= 992) {

        if (window.scrollY > tabsWrapper.offsetTop) {
            tabsWrapper.classList.add("sticky-active");
        } else {
            tabsWrapper.classList.remove("sticky-active");
        }

    }

});

// ================= MOBILE FILTER TOGGLE =================
const filterToggle = document.querySelector(".mobile-filter-toggle");
const filterTabs = document.querySelector(".itineraries-tabs");

filterToggle.addEventListener("click", () => {
    filterTabs.classList.toggle("active");
});


// ================= AUTO ACTIVATE TAB FROM URL =================
document.addEventListener("DOMContentLoaded", function () {

    const params = new URLSearchParams(window.location.search);
    const category = params.get("category");

    if (category) {

        const allTabs = document.querySelectorAll(".itineraries-tab-btn");
        const allContents = document.querySelectorAll(".itineraries-tab-content");

        allTabs.forEach(tab => tab.classList.remove("itineraries-active"));
        allContents.forEach(content => content.classList.remove("itineraries-active"));

        const targetTab = document.querySelector(`.itineraries-tab-btn[data-tab="${category}"]`);
        const targetContent = document.getElementById(category);

        if (targetTab && targetContent) {
            targetTab.classList.add("itineraries-active");
            targetContent.classList.add("itineraries-active");

            // scroll to section smoothly
            setTimeout(() => {
                targetContent.scrollIntoView({ behavior: "smooth" });
            }, 200);
        }
    }

});
