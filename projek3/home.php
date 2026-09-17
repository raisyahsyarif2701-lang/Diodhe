<?php
include "config/koneksi.php";

$query_cabang = mysqli_query($conn, "SELECT * FROM cabang ORDER BY id ASC");

if (!$query_cabang) {
    die("Query cabang gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Diodhe Cake and Bakery</title>

    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6819d58420c421191001c79c/1iqiek43o';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

    <!-- =========================
         NAVBAR
    ========================== -->

    <header class="navbar">

        <div class="nav-container">

            <a href="home.php" class="logo">
                <span>Diodhe</span>
                <small>Cake and Bakery</small>
            </a>

            <button class="menu-button" id="menuButton">
                ☰
            </button>

            <nav id="navMenu">

                <a href="#home">Home</a>
                <a href="menu.php">Products</a>
                <a href="#about">About</a>
                <a href="#contact">Order</a>

                

                <button class="logout-button" id="logoutButton">
                    Logout
                </button>

            </nav>

        </div>

    </header>


    <!-- =========================
         HERO
    ========================== -->

    <section class="hero" id="home">

        <div class="hero-content">

            <p class="hero-small">
                WELCOME TO DIODHE
            </p>

            <h1>
                Pilihan Di Setiap Waktu
                
            </h1>

            <p>
                Nikmati berbagai pilihan cake, bread, brownies,
                dan accessories berkualitas dari Diodhe Cake and Bakery.
            </p>

            <div class="hero-buttons">

                <a href="#products" class="primary-button">
                    Lihat Produk
                </a>

                <a href="#about" class="secondary-button">
                    Tentang Kami
                </a>

            </div>

        </div>

       <div class="hero-carousel">

    <div class="carousel-track" id="carouselTrack">

        <div class="carousel-slide">
            <img src="images/s.png" alt="Logo Diodge">
        </div>

        <div class="carousel-slide">
            <img src="images/choco lava.jpg" alt="Choco Lava">
        </div>

        <div class="carousel-slide">
            <img src="images/roti keju.jpg" alt="Sifon Redvelvet">
        </div>

    </div>

    <!-- Tombol kiri -->
    <button class="carousel-prev" id="carouselPrev">
        &#10094;
    </button>

    <!-- Tombol kanan -->
    <button class="carousel-next" id="carouselNext">
        &#10095;
    </button>

    <!-- Indicator -->
    <div class="carousel-dots">

        <button class="carousel-dot active" data-slide="0"></button>

        <button class="carousel-dot" data-slide="1"></button>

        <button class="carousel-dot" data-slide="2"></button>

    </div>

</div>

    </section>
    


    <!-- =========================
         WELCOME
    ========================== -->

    <section class="welcome">

        <p class="section-label">
            DIODHE CAKE AND BAKERY
        </p>

        <h2>
            Dibuat dengan bahan pilihan,
            <br>
            disajikan dengan penuh cinta.
        </h2>

        <p>
            Kami menghadirkan berbagai produk bakery yang cocok
            untuk menemani hari-hari kamu maupun berbagai acara spesial.
        </p>

    </section>


    


    <!-- =========================
         PRODUCTS
    ========================== -->

    <section class="products-section" id="products">

        <div class="section-heading">

            <p class="section-label">
                OUR PRODUCTS
            </p>

            <h2>
                Best Seller Diodhe
            </h2>

            <p>
                Pilih produk best seller terfavorit anda dan order <a href="#contact">disini</a>.
            </p>

        </div>


        <div class="product-grid" id="productGrid">


            <!-- CAKE 1 -->

            <div class="product-card" data-category="cakes">

                <div class="product-image">

                    <img
                        src="images/choco lava.jpg"
                        alt="Chocolava"
                    >

                    <span class="product-label">
                        Kue
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Chocolava
                    </h3>

                    <p>
                        Bolu coklat, coklat lava + parutan coklat + taburan gula halus sebagai toping.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 52.000
                        </span>
               


                    </div>

                </div>

            </div>


            <!-- CAKE 2 -->

            <div class="product-card" data-category="cakes">

                <div class="product-image">

                    <img
                        src="images/cakes/cake-2.jpg"
                        alt="Lava Peanut"
                    >

                    <span class="product-label">
                        Bolu
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Lava peanut
                    </h3>

                    <p>
                        Bolu coklat, perpaduan selai coklat + selai kacang menjadi lava di atasnya terdapat selai kacang + kacang almond sebagai toping.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 52.000
                        </span>

                        <div class="product-card">



                    </div>

                </div>

            </div>
            </div>  


            <!-- CAKE 3 -->

            <div class="product-card" data-category="cakes">

                <div class="product-image">

                    <img
                        src="images/cakes/cake-3.jpg"
                        alt="Sifon Redvelvet"
                    >

                    <span class="product-label">
                        Bolu 
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Sifon Redvelvet  
                    </h3>

                    <p>
                        Bolu Redvelvet dengan topping cream manis dari crumble redvelvet.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 48.000
                        </span>
          


                    </div>

                </div>

            </div>


            <!-- BREAD 1 -->

            <div class="product-card" data-category="breads">

                <div class="product-image">

                    <img
                        src="images/breads/bread-1.jpg"
                        alt="Korean Cake Double Coklat"
                    >

                    <span class="product-label">
                        Kue
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Korean Cake Double Coklat 
                    </h3>

                    <p>
                         Bolu coklat terdapat filling cream coklat + siraman coklat di lapisannya dan cream coklat + taburan coklat bubuk sebagai topingnya.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 15.000
                        </span>

                       </div>

                </div>

            </div>


            <!-- BREAD 2 -->

            <div class="product-card" data-category="breads">

                <div class="product-image">

                    <img
                        src="images/breads/bread-2.jpg"
                        alt="Double coklat"
                    >

                    <span class="product-label">
                        Kue
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Double Cokklat 
                    </h3>

                    <p>
                        Cake coklat dengan cream coklat di dalam (full coklat) 
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 164.000
                        </span>

                       

                    </div>

                </div>

            </div>


            <!-- BREAD 3 -->

            <div class="product-card" data-category="breads">

                <div class="product-image">

                    <img
                        src="images/breads/bread-3.jpg"
                        alt="Coklat oreo"
                    >

                    <span class="product-label">
                        kue
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        coklat oreo 
                    </h3>

                    <p>
                        Bolu coklat, terdapat filling cream coklat + crumble oreo di dalamnya. cream + crumble oreo sebagai topping.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 170.000
                        </span>

                      

                    </div>

                </div>

            </div>


            <!-- BROWNIES 1 -->

            <div class="product-card" data-category="brownies">

                <div class="product-image">

                    <img
                        src="images/brownies/brownies-1.jpg"
                        alt="Brownies original"
                    >

                    <span class="product-label">
                        Brownies
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Brownies Original 
                    </h3>

                    <p>
                        Brownies coklat, taburan chocochip + kacang almond + parutan keju sebagai topping.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 64.000
                        </span>

                    </div>

                </div>

            </div>


            <!-- BROWNIES 2 -->

            <div class="product-card" data-category="brownies">

                <div class="product-image">

                    <img
                        src="images/brownies/brownies-2.jpg"
                        alt="Brownies almond cheese"
                    >

                    <span class="product-label">
                        Brownies
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Brownies Almond Cheese 
                    </h3>

                    <p>
                        Brownies coklat, dengan topping slai coklat, kacang almond dan parutan keju.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 70.000
                        </span>

                   </div>

                </div>

            </div>


            <!-- BROWNIES 3 -->

            <div class="product-card" data-category="brownies">

                <div class="product-image">

                    <img
                        src="images/brownies/brownies-3.jpg"
                        alt="Softcake tiramisu"
                    >

                    <span class="product-label">
                        Bolu 
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Softcake Tiramisu 
                    </h3>

                    <p>
                        bolu coklat, cream tiramisu + chocochip sebagai toppingnya
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 52.000
                        </span>

                   

                    </div>

                </div>

            </div>


            <!-- ACCESSORIES 1 -->

            <div class="product-card" data-category="accessories">

                <div class="product-image">

                    <img
                        src="images/accessories/accessories-1.jpg"
                        alt="Abon roll"
                    >

                    <span class="product-label">
                        Roti
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Roti Abon Roll
                    </h3>

                    <p>
                        Roti dengan isian mayones dan taburan abon 
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 14.000
                        </span>

                    

                    </div>

                </div>

            </div>


            <!-- ACCESSORIES 2 -->

            <div class="product-card" data-category="accessories">

                <div class="product-image">

                    <img
                        src="images/accessories/accessories-2.jpg"
                        alt="Bolen coklat keju "
                    >

                    <span class="product-label">
                        Roti
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Bolen Coklat Keju 
                    </h3>

                    <p>
                        Bolen dengan isi 4 pcs 2 pcs isi coklat dan  2 pcs isi keju 
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 27.000
                        </span>
				

                    </div>

                </div>

            </div>


            <!-- ACCESSORIES 3 -->

            <div class="product-card" data-category="accessories">

                <div class="product-image">

                    <img
                        src="images/accessories/accessories-3.jpg"
                        alt="Soes original"
                    >

                    <span class="product-label">
                        Roti
                    </span>

                </div>

                <div class="product-info">

                    <h3>
                        Soes Original
                    </h3>

                    <p>
                        kue soes dengan isian fla vanilla di dalamnya.
                    </p>

                    <div class="product-bottom">

                        <span class="price">
                            Rp 20.000
                        </span>

                      


                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- =========================
         ABOUT
    ========================== -->

    <section class="about-section" id="about">

        <div class="about-content">

            <p class="section-label">
                ABOUT DIODHE
            </p>

            <h2>
                Pilihan di setiap waktu.
            </h2>

            <p>Diodhe Cake & Bakery adalah Bidang usaha yang bergerak di bidang kuliner yang memproduksi berbagai jenis aneka bolu, roti dan juga kue ulang tahun yang cocok untuk memenuhi semua kebutuhan acara konsumen. 
Pertama kali didirikan pada tanggal 11 Januari 2024 oleh Bapak La Ode Hasmadi Ghowe di Duta Harapan Bekasi Utara dan kini sudah memiliki 5 cabang di daerah Bekasi kota dan kabupaten. 

            </p>

            <p>
               Ode cake & bakery berkomitmen untuk selalu memberikan produk terbaik dan pelayanan yg ramah demi tercapainya kepuasan pelanggan. Tidak hanya itu Ode Cake & Bakery juga sudah memiliki izin usaha PIRT dan Sertifikat Halal untuk meningkatkan kepercayaan konsumen terhadap produk yg kami hasilkan.
            </p>

        </div>

        <div class="about-card">
            <span>🍰</span>
            <h3>Fresh Every Day</h3>
            <p>
                Produk dibuat dengan kualitas dan kesegaran yang dijaga.
            </p>
        </div>

    </section>


  <!-- =========================
     CONTACT
========================== -->

<section class="contact-section" id="contact">

    <div class="section-heading">

        <p class="section-label">
           
        </p>

        <h2>
            ORDER DAN TEMUKAN INFORMASI DISINI
        </h2>

        <p>
            Order Diodhe cake & bakery terdekat dari lokasi mu 
        </p>

    </div>


    <div class="contact-container">

        <?php if (mysqli_num_rows($query_cabang) > 0): ?>

            <?php while ($cabang = mysqli_fetch_assoc($query_cabang)): ?>

                <div class="contact-card">

                    <span>📍</span>

                    <h3>
                        <?= htmlspecialchars($cabang['nama_cabang']); ?>
                    </h3>

                    <p>
                        <?= htmlspecialchars($cabang['alamat']); ?>
                    </p>


                    <?php if (!empty($cabang['telepon'])): ?>

                       <a
    						href="https://wa.me/62<?= ltrim($cabang['telepon'], '0'); ?>"
					    	target="_blank"
					    	rel="noopener noreferrer"
					    	class="btn-whatsapp"
						>
					    	💬 Chat WhatsApp
						</a>

                    <?php endif; ?>


                    <div class="contact-links">

                        <?php if (!empty($cabang['link_gofood'])): ?>

                            <a
                                href="<?= htmlspecialchars($cabang['link_gofood']); ?>"
                                target="_blank"
                            >
                                🍴 Pesan di GoFood
                            </a>

                        <?php endif; ?>


                        <?php if (!empty($cabang['link_grabfood'])): ?>

                            <a
                                href="<?= htmlspecialchars($cabang['link_grabfood']); ?>"
                                target="_blank"
                            >
                                🛵 Pesan di GrabFood
                            </a>

                        <?php endif; ?>

                    </div>

                </div>

            <?php endwhile; ?>

        <?php else: ?>

            <div class="contact-card">

                <span>📍</span>

                <h3>
                    Diodhe Cake and Bakery
                </h3>

                <p>
                    Belum ada data cabang.
                </p>

            </div>

        <?php endif; ?>

    </div>

</section>

    <!-- =========================
         CART
    ========================== -->

    <div class="cart-overlay" id="cartOverlay"></div>

    <aside class="cart-sidebar" id="cartSidebar">

        <div class="cart-header">

            <h2>
                Keranjang
            </h2>

            <button id="closeCart">
                ×
            </button>

        </div>

        <div class="cart-items" id="cartItems">

            <p class="empty-cart">
                Keranjang masih kosong.
            </p>

        </div>

        <div class="cart-footer">

            <div class="cart-total">

                <span>Total</span>

                <strong id="cartTotal">
                    Rp 0
                </strong>

            </div>

            <button class="checkout-button" id="checkoutButton">
                Checkout
            </button>

        </div>

    </aside>


    <!-- CART FLOATING BUTTON -->

    <button class="cart-button" id="cartButton">

        🛒

        <span id="cartCount">
            0
        </span>

    </button>


    <!-- =========================
         FOOTER
    ========================== -->

    <footer>

        <div class="footer-content">

            <div>
                <h2>Diodhe</h2>
                <p>
                    Cake and Bakery
                </p>
            </div>

            <div>
                <p>
                    © 2026 Diodhe Cake and Bakery.
                    All rights reserved.
                </p>
            </div>

        </div>

    </footer>


    <script src="script.js"></script>

</body>

</html>