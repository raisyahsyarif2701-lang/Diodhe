// ========================================
// DIODHE CAKE AND BAKERY
// LOGIN.JS
// ========================================

document.addEventListener("DOMContentLoaded", function () {


    // ========================================
    // ELEMENT
    // ========================================

    const loginForm =
        document.getElementById("loginForm");

    const usernameInput =
        document.getElementById("username");

    const passwordInput =
        document.getElementById("password");

    const showPasswordButton =
        document.getElementById("showPassword");

    const rememberCheckbox =
        document.getElementById("remember");


    // ========================================
    // SHOW / HIDE PASSWORD
    // ========================================

    if (showPasswordButton) {

        showPasswordButton.addEventListener(
            "click",
            function () {

                if (
                    passwordInput.type === "password"
                ) {

                    passwordInput.type = "text";

                    showPasswordButton.textContent =
                        "🙈";

                } else {

                    passwordInput.type = "password";

                    showPasswordButton.textContent =
                        "👁";

                }

            }
        );

    }


    // ========================================
    // LOGIN FORM
    // ========================================

    if (loginForm) {

        loginForm.addEventListener(
            "submit",
            function (event) {

                event.preventDefault();


                const email =
                    usernameInput.value.trim();

                const password =
                    passwordInput.value;


                // ========================================
                // DEMO ACCOUNT
                // ========================================

                const correctEmail =
                    "admin@diodhe.com";

                const correctPassword =
                    "admin123";


                // ========================================
                // CHECK LOGIN
                // ========================================

                if (
                    email === correctEmail &&
                    password === correctPassword
                ) {


                    // Simpan status login

                    localStorage.setItem(
                        "isLoggedIn",
                        "true"
                    );


                    localStorage.setItem(
                        "username",
                        email
                    );


                    // Remember Me

                    if (
                        rememberCheckbox &&
                        rememberCheckbox.checked
                    ) {

                        localStorage.setItem(
                            "rememberLogin",
                            "true"
                        );

                    }


                    alert(
                        "Login berhasil!\n\n" +
                        "Selamat datang di Diodhe Cake and Bakery."
                    );


                    window.location.href =
                        "index.html";


                } else {


                    alert(
                        "Login gagal!\n\n" +
                        "Email atau password salah."
                    );


                    passwordInput.value = "";

                }

            }
        );

    }


    // ========================================
    // AUTO FILL REMEMBER LOGIN
    // ========================================

    const rememberedLogin =
        localStorage.getItem("rememberLogin");


    if (rememberedLogin === "true") {

        const savedUsername =
            localStorage.getItem("username");


        if (savedUsername) {

            usernameInput.value =
                savedUsername;

            if (rememberCheckbox) {
                rememberCheckbox.checked = true;
            }

        }

    }

});