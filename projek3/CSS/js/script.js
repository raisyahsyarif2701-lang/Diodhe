// ========================================
// DIODHE CAKE AND BAKERY
// SCRIPT.JS
// ========================================

document.addEventListener("DOMContentLoaded", function () {


    // ========================================
    // ELEMENT
    // ========================================

    const menuButton = document.getElementById("menuButton");
    const navMenu = document.getElementById("navMenu");

    const loginButton = document.getElementById("loginButton");
    const logoutButton = document.getElementById("logoutButton");

    const categoryButtons =
        document.querySelectorAll(".category-button");

    const productCards =
        document.querySelectorAll(".product-card");

    const cartButton =
        document.getElementById("cartButton");

    const cartSidebar =
        document.getElementById("cartSidebar");

    const cartOverlay =
        document.getElementById("cartOverlay");

    const closeCart =
        document.getElementById("closeCart");

    const cartItems =
        document.getElementById("cartItems");

    const cartCount =
        document.getElementById("cartCount");

    const cartTotal =
        document.getElementById("cartTotal");

    const checkoutButton =
        document.getElementById("checkoutButton");


    // ========================================
    // LOGIN STATUS
    // ========================================

    const isLoggedIn =
        localStorage.getItem("isLoggedIn");

    const username =
        localStorage.getItem("username");


    if (isLoggedIn === "true") {

        if (loginButton) {
            loginButton.style.display = "none";
        }

        if (logoutButton) {
            logoutButton.style.display = "inline-block";
        }

    } else {

        if (logoutButton) {
            logoutButton.style.display = "none";
        }

    }


    // ========================================
    // LOGOUT
    // ========================================

    if (logoutButton) {

        logoutButton.addEventListener("click", function () {

            localStorage.removeItem("isLoggedIn");
            localStorage.removeItem("username");

            alert("Kamu berhasil logout.");

            window.location.reload();

        });

    }


    // ========================================
    // MOBILE MENU
    // ========================================

    if (menuButton && navMenu) {

        menuButton.addEventListener("click", function () {

            navMenu.classList.toggle("active");

        });

    }


    // ========================================
    // CLOSE MOBILE MENU
    // ========================================

    const navLinks =
        document.querySelectorAll("#navMenu a");

    navLinks.forEach(function (link) {

        link.addEventListener("click", function () {

            if (navMenu) {
                navMenu.classList.remove("active");
            }

        });

    });


    // ========================================
    // CATEGORY FILTER
    // ========================================

    categoryButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            categoryButtons.forEach(function (btn) {

                btn.classList.remove("active");

            });

            button.classList.add("active");


            const selectedCategory =
                button.getAttribute("data-category");


            productCards.forEach(function (card) {

                const cardCategory =
                    card.getAttribute("data-category");


                if (
                    selectedCategory === "all" ||
                    selectedCategory === cardCategory
                ) {

                    card.classList.remove("hidden");

                } else {

                    card.classList.add("hidden");

                }

            });

        });

    });


    // ========================================
    // CART DATA
    // ========================================

    let cart = JSON.parse(
        localStorage.getItem("diodheCart")
    ) || [];


    // ========================================
    // FORMAT PRICE
    // ========================================

    function formatPrice(price) {

        return "Rp " + Number(price).toLocaleString("id-ID");

    }


    // ========================================
    // ADD TO CART
    // ========================================

    const addCartButtons =
        document.querySelectorAll(".add-cart");


    addCartButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const name =
                button.getAttribute("data-name");

            const price =
                Number(button.getAttribute("data-price"));


            const existingProduct =
                cart.find(function (item) {

                    return item.name === name;

                });


            if (existingProduct) {

                existingProduct.quantity++;

            } else {

                cart.push({

                    name: name,

                    price: price,

                    quantity: 1

                });

            }


            saveCart();

            updateCart();

            openCart();

        });

    });


    // ========================================
    // SAVE CART
    // ========================================

    function saveCart() {

        localStorage.setItem(
            "diodheCart",
            JSON.stringify(cart)
        );

    }


    // ========================================
    // UPDATE CART
    // ========================================

    function updateCart() {

        cartItems.innerHTML = "";


        if (cart.length === 0) {

            cartItems.innerHTML = `
                <p class="empty-cart">
                    Keranjang masih kosong.
                </p>
            `;

            cartCount.textContent = "0";

            cartTotal.textContent = "Rp 0";

            return;

        }


        let total = 0;

        let totalQuantity = 0;


        cart.forEach(function (item, index) {

            const itemTotal =
                item.price * item.quantity;


            total += itemTotal;

            totalQuantity += item.quantity;


            const cartItem =
                document.createElement("div");

            cartItem.className = "cart-item";


            cartItem.innerHTML = `

                <div>

                    <h4>
                        ${item.name}
                    </h4>

                    <p>
                        ${formatPrice(item.price)}
                        × ${item.quantity}
                    </p>

                </div>

                <button
                    class="remove-item"
                    data-index="${index}"
                >
                    Hapus
                </button>

            `;


            cartItems.appendChild(cartItem);

        });


        cartCount.textContent =
            totalQuantity;

        cartTotal.textContent =
            formatPrice(total);


        // REMOVE ITEM

        const removeButtons =
            document.querySelectorAll(".remove-item");


        removeButtons.forEach(function (button) {

            button.addEventListener("click", function () {

                const index =
                    Number(button.getAttribute("data-index"));


                cart.splice(index, 1);

                saveCart();

                updateCart();

            });

        });

    }


    // ========================================
    // OPEN CART
    // ========================================

    function openCart() {

        cartSidebar.classList.add("active");

        cartOverlay.classList.add("active");

    }


    // ========================================
    // CLOSE CART
    // ========================================

    function closeCartSidebar() {

        cartSidebar.classList.remove("active");

        cartOverlay.classList.remove("active");

    }


    cartButton.addEventListener(
        "click",
        openCart
    );


    closeCart.addEventListener(
        "click",
        closeCartSidebar
    );


    cartOverlay.addEventListener(
        "click",
        closeCartSidebar
    );


    // ========================================
    // CHECKOUT
    // ========================================

    checkoutButton.addEventListener(
        "click",
        function () {

            if (cart.length === 0) {

                alert(
                    "Keranjang kamu masih kosong."
                );

                return;

            }


            if (isLoggedIn !== "true") {

                alert(
                    "Silakan login terlebih dahulu untuk melakukan checkout."
                );

                window.location.href =
                    "login.html";

                return;

            }


            alert(
                "Checkout berhasil dibuat!\n\n" +
                "Untuk sementara fitur pembayaran masih dalam tahap pengembangan."
            );

        }
    );


    // ========================================
    // IMAGE FALLBACK
    // ========================================

    const productImages =
        document.querySelectorAll(".product-image img");


    productImages.forEach(function (image) {

        image.addEventListener("error", function () {

            image.style.display = "none";

            image.parentElement.style.display = "flex";
            image.parentElement.style.alignItems = "center";
            image.parentElement.style.justifyContent = "center";

            image.parentElement.innerHTML += `
                <span style="
                    font-size: 60px;
                    opacity: 0.6;
                ">
                    🍰
                </span>
            `;

        });

    });


    // ========================================
    // INITIAL CART
    // ========================================

    updateCart();

});