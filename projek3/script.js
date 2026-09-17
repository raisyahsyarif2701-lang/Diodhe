/* =========================================
   HERO CAROUSEL
========================================= */

const carouselTrack = document.getElementById("carouselTrack");
const carouselPrev = document.getElementById("carouselPrev");
const carouselNext = document.getElementById("carouselNext");
const carouselDots = document.querySelectorAll(".carousel-dot");

let currentSlide = 0;
const totalSlides = carouselDots.length;

function showSlide(index) {

    if (index >= totalSlides) {
        currentSlide = 0;
    } else if (index < 0) {
        currentSlide = totalSlides - 1;
    } else {
        currentSlide = index;
    }

    carouselTrack.style.transform =
        `translateX(-${currentSlide * 100}%)`;

    carouselDots.forEach((dot, index) => {

        dot.classList.toggle(
            "active",
            index === currentSlide
        );

    });
}


/* Tombol kiri */

carouselPrev.addEventListener("click", function () {
    showSlide(currentSlide - 1);
});


/* Tombol kanan */

carouselNext.addEventListener("click", function () {
    showSlide(currentSlide + 1);
});


/* Indicator */

carouselDots.forEach((dot) => {

    dot.addEventListener("click", function () {

        const slide = parseInt(
            this.dataset.slide
        );

        showSlide(slide);

    });

});


/* Auto slide setiap 4 detik */

setInterval(function () {

    showSlide(currentSlide + 1);

}, 4000);