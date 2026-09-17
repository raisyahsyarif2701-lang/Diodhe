<?php
include "config/koneksi.php";

/*
|--------------------------------------------------------------------------
| Ambil kategori
|--------------------------------------------------------------------------
*/
$queryKategori = mysqli_query(
    $conn,
    "SELECT id, nama_kategori
     FROM kategori
     ORDER BY nama_kategori ASC"
);

/*
|--------------------------------------------------------------------------
| Ambil produk + nama kategori
|--------------------------------------------------------------------------
*/
	$queryProduk = mysqli_query(
    $conn,
    "SELECT
        produk.id,
        produk.nama_produk,
        produk.deskripsi,
        produk.kategori_id,
        produk.harga,
        produk.gambar,
        kategori.nama_kategori
     FROM produk
     LEFT JOIN kategori
        ON produk.kategori_id = kategori.id
     ORDER BY produk.id DESC"
);
?>

<!DOCTYPE html>

<html lang="id">

<head>


<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Diodhe Cake and Bakery</title>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Poppins', Arial, sans-serif;
        margin: 0;
        background-color: #f8f8f8;
        color: #333;
    }

    /* ================= HEADER ================= */

    header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        width: 100%;
        height: 70px;

        padding: 10px 45px;

        background-color: #fff;

        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);

        position: sticky;
        top: 0;
        z-index: 100;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .logo img {
        width: 50px;
        height: 50px;
        object-fit: contain;
    }

    .logo h2 {
        margin: 0;
        font-size: 22px;
        color: #ff6f00;
        font-weight: 700;
        letter-spacing: 1px;
    }

    /* ================= NAVBAR ================= */

    nav ul {
        display: flex;
        list-style: none;
        gap: 35px;
        margin: 0;
        padding: 0;
    }

    nav ul li a {
        text-decoration: none;
        color: #333;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s;
    }

    nav ul li a:hover {
        color: #ff6f00;
    }

    /* ================= MAIN ================= */

    .main {
        display: flex;
        align-items: stretch;
        gap: 30px;
        width: 100%;
        padding: 35px 45px;
    }

    /* ================= SIDEBAR ================= */

    .sidebar {
        width: 230px;
        min-width: 230px;

        background-color: #fff;

        border-radius: 15px;

        padding: 25px 20px;

        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.08);

        min-height: 100%;
    }

    .sidebar h3 {
        margin: 0 0 18px;

        padding-bottom: 12px;

        color: #ff6f00;

        font-size: 20px;

        border-bottom: 2px solid #ffe0b2;
    }

    .sidebar ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .sidebar ul li {
        margin-bottom: 5px;
    }

    .sidebar ul li a {
        display: block;

        padding: 10px;

        border-radius: 8px;

        text-decoration: none;

        color: #444;

        font-size: 14px;

        font-weight: 500;

        cursor: pointer;

        transition: 0.3s;
    }

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
        color: #ff6f00;
        background-color: #fff3e0;
        padding-left: 15px;
    }

    /* ================= MENU CONTAINER ================= */

    .menu-container {
        flex: 1;

        display: grid;

        grid-template-columns: repeat(
            3,
            minmax(210px, 1fr)
        );

        gap: 25px;

        align-items: start;
    }

    /* ================= PRODUCT CARD ================= */

    .menu-item {
        display: flex;
        flex-direction: column;

        width: 100%;
        min-height: 400px;

        padding: 18px;

        background-color: #fff;

        border-radius: 16px;

        text-align: center;

        box-shadow:
            0 5px 18px rgba(0, 0, 0, 0.10);

        transition: 0.3s;

        overflow: hidden;
    }

    .menu-item:hover {
        transform: translateY(-6px);

        box-shadow:
            0 12px 25px rgba(0, 0, 0, 0.15);
    }

    /* ================= PRODUCT IMAGE ================= */

    .menu-item img {
        width: 100%;
        height: 230px;

        object-fit: cover;
        object-position: center;

        border-radius: 12px;

        display: block;

        background-color: #f2f2f2;
    }

    /* ================= PRODUCT NAME ================= */

    .menu-item h3 {
        margin: 15px 0 6px;

        color: #333;

        font-size: 17px;

        font-weight: 600;
    }

    /* ================= CATEGORY ================= */

    .category {
        margin: 0 0 7px;

        color: #999;

        font-size: 12px;
    }

    /* ================= DESCRIPTION ================= */

    .description {
        margin: 0 0 10px;

        color: #666;

        font-size: 13px;

        line-height: 1.5;
    }

    /* ================= STOCK ================= */

    .stock {
        margin: 0 0 10px;

        color: #888;

        font-size: 12px;
    }

    /* ================= PRICE ================= */

    .price {
        margin: 0 0 18px;

        color: #e74c3c;

        font-size: 15px;

        font-weight: bold;
    }

    /* ================= BUTTON ================= */

    .button-group {
        display: flex;

        justify-content: center;

        gap: 10px;

        margin-top: auto;
    }

    .btn {
    display: inline-block;
    text-decoration: none;
    border: none;
    padding: 9px 17px;
    border-radius: 8px;
    color: white;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.25s;
}

    .btn:hover {
        transform: translateY(-2px);
        opacity: 0.9;
    }

    .btn.gofood {
        background-color: #ff3d00;
    }

    .btn.grab {
        background-color: #00b140;
    }

    /* ================= EMPTY ================= */

    .empty-product {
        grid-column: 1 / -1;

        text-align: center;

        padding: 60px 20px;

        color: #888;

        background-color: #fff;

        border-radius: 15px;
    }

    /* ================= TABLET ================= */

    @media (max-width: 1100px) {

        .main {
            padding: 30px;
        }

        .menu-container {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }

    /* ================= HP ================= */

    @media (max-width: 700px) {

        header {
            padding: 10px 20px;
        }

        .logo h2 {
            font-size: 18px;
        }

        nav {
            display: none;
        }

        .main {
            flex-direction: column;

            padding: 25px 20px;
        }

        .sidebar {
            width: 100%;

            min-width: unset;
        }

        .menu-container {
            width: 100%;

            grid-template-columns: 1fr;
        }

        .menu-item {
            min-height: 350px;
        }

    }

</style>


</head>

<body>


<!-- ================= HEADER ================= -->

<header>

    <div class="logo">

        <img
            src="assets/image/logo.jpeg"
            alt="Logo Diodhe Bakery"
        >

        <h2>
            Diodhe Bakery
        </h2>

    </div>


    <nav>

        <ul>

            <li>
                <a href="menu.php">
                    Menu
                </a>
            </li>

            <li>
                <a href="home.php">
                    Home
                </a>
            </li>

            <li>
                <a href="#">
                    Promo
                </a>
            </li>

          
        </ul>

    </nav>

</header>


<!-- ================= MAIN ================= -->

<div class="main">


    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <h3>
            Category
        </h3>

        <ul>

            <!-- ALL PRODUCT -->

            <li>

                <a
                    class="category-link active"
                    data-category="all"
                >
                    All Product
                </a>

            </li>


            <!-- KATEGORI DARI DATABASE -->

            <?php if (mysqli_num_rows($queryKategori) > 0): ?>

                <?php while (
                    $kategori = mysqli_fetch_assoc($queryKategori)
                ): ?>

                    <li>

                        <a
                            class="category-link"
                            data-category="<?= (int) $kategori['id']; ?>"
                        >
                            <?= htmlspecialchars(
                                $kategori['nama_kategori']
                            ); ?>
                        </a>

                    </li>

                <?php endwhile; ?>

            <?php endif; ?>

        </ul>

    </aside>


    <!-- ================= MENU ================= -->

    <div class="menu-container" id="menuContainer">


        <?php if (mysqli_num_rows($queryProduk) > 0): ?>


            <?php while (
                $produk = mysqli_fetch_assoc($queryProduk)
            ): ?>


                <div
                    class="menu-item"
                    data-category="<?= (int) $produk['kategori_id']; ?>"
                >


                    <!-- IMAGE -->

                    <?php if (!empty($produk['gambar'])): ?>

                        <img
                            src="Produk/upload/<?= htmlspecialchars(
                                $produk['gambar']
                            ); ?>"
                            alt="<?= htmlspecialchars(
                                $produk['nama_produk']
                            ); ?>"
                        >

                    <?php else: ?>

                        <img
                            src="images/default.jpg"
                            alt="No Image"
                        >

                    <?php endif; ?>


                    <!-- NAME -->

                    <h3>
                        <?= htmlspecialchars(
                            $produk['nama_produk']
                        ); ?>
                    </h3>


                    <!-- CATEGORY -->

                    <p class="category">

                        <?= htmlspecialchars(
                            $produk['nama_kategori']
                            ?? 'Tidak ada kategori'
                        ); ?>

                    </p>


                    <!-- DESCRIPTION -->

                    <?php if (!empty($produk['deskripsi'])): ?>

                        <p class="description">

                            <?= htmlspecialchars(
                                $produk['deskripsi']
                            ); ?>

                        </p>

                    <?php endif; ?>


                    <!-- PRICE -->

                    <p class="price">

                        Rp.
                        <?= number_format(
                            $produk['harga'] ?? 0,
                            0,
                            ',',
                            '.'
                        ); ?>

                    </p>


                   

                    


                    <!-- BUTTON -->

        </div>


            <?php endwhile; ?>


        <?php else: ?>


            <div class="empty-product">

                Belum ada produk yang tersedia.

            </div>


        <?php endif; ?>


    </div>

</div>


<!-- ================= JAVASCRIPT ================= -->

<script>

    const categoryLinks =
        document.querySelectorAll(".category-link");

    const menuItems =
        document.querySelectorAll(".menu-item");


    categoryLinks.forEach(link => {

        link.addEventListener("click", function () {

            /* Hapus active dari semua kategori */

            categoryLinks.forEach(item => {

                item.classList.remove("active");

            });


            /* Tambahkan active */

            this.classList.add("active");


            /* Kategori yang dipilih */

            const selectedCategory =
                this.getAttribute("data-category");


            /* Filter */

            menuItems.forEach(item => {

                const productCategory =
                    item.getAttribute("data-category");


                if (
                    selectedCategory === "all"
                ) {

                    item.style.display = "flex";

                }

                else if (
                    selectedCategory === productCategory
                ) {

                    item.style.display = "flex";

                }

                else {

                    item.style.display = "none";

                }

            });

        });

    });

</script>
```

</body>

</html>
