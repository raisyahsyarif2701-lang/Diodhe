// ==============================
// SHOW / HIDE PASSWORD
// ==============================

const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("click", function () {

    if (password.type === "password") {

        password.type = "text";
        togglePassword.innerHTML = "🙈";

    } else {

        password.type = "password";
        togglePassword.innerHTML = "👁";

    }

});

// ==============================
// VALIDASI FORM
// ==============================

const form = document.querySelector("form");

form.addEventListener("submit", function (e) {

    const username = document.querySelector("input[name='username']").value.trim();
    const pass = password.value.trim();

    if (username === "" || pass === "") {

        e.preventDefault();

        alert("Username dan Password wajib diisi!");

        return;

    }

    // Efek loading pada tombol login
    const tombol = document.querySelector(".login-btn");

    tombol.disabled = true;
    tombol.innerHTML = "Memproses...";

});