// ================================
// DIODHE CAKE & BAKERY
// DASHBOARD SCRIPT
// ================================

// Menampilkan tanggal dan jam
function updateDateTime() {

    const now = new Date();

    const options = {
        weekday: "long",
        year: "numeric",
        month: "long",
        day: "numeric"
    };

    const tanggal = now.toLocaleDateString("id-ID", options);

    const jam = now.toLocaleTimeString("id-ID");

    const tanggalElement = document.getElementById("tanggal");
    const jamElement = document.getElementById("jam");

    if (tanggalElement) {
        tanggalElement.innerHTML = tanggal;
    }

    if (jamElement) {
        jamElement.innerHTML = jam;
    }

}

setInterval(updateDateTime, 1000);

updateDateTime();


// Animasi Card
const cards = document.querySelectorAll(".card");

cards.forEach((card, index) => {

    card.style.opacity = "0";
    card.style.transform = "translateY(30px)";

    setTimeout(() => {

        card.style.transition = ".5s";

        card.style.opacity = "1";

        card.style.transform = "translateY(0px)";

    }, index * 200);

});