<?php
include "cek_akses.php";
include "config/koneksi.php";

// Ambil jumlah data
$produk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM produk"));
$kategori = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kategori"));
$cabang = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM cabang"));
$user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));

// Ambil role user yang sedang login
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - Diodhe Bakery</title>

    <link rel="stylesheet" href="assets/css/style.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <h2>Diodhe Bakery</h2>

        <!-- Dashboard -->
        <a href="index.php" class="active">
            🏠 Dashboard
        </a>

        <!-- Produk -->
        <a href="produk.php">
            🍰 Produk
        </a>

        <?php if ($role == 'admin' || $role == 'owner'): ?>

            <!-- Kategori -->
            <a href="kategori.php">
                📂 Kategori
            </a>

            <!-- Cabang -->
            <a href="cabang.php">
                🏪 Cabang
            </a>

            <!-- User -->
            <a href="user.php">
                👤 User
            </a>

        <?php endif; ?>

        <!-- Logout -->
        <a href="logout.php">
            🚪 Logout
        </a>

    </div>


    <!-- CONTENT -->
    <div class="content">

        <!-- TOPBAR -->
        <div class="topbar">

            <h1>Dashboard</h1>

            <div>
                Selamat Datang,
                <b><?= htmlspecialchars($_SESSION['nama']); ?></b>

                <small style="display:block;">
                    Role: <?= htmlspecialchars(ucfirst($role)); ?>
                </small>
            </div>

        </div>


        <!-- CARDS -->
        <div class="cards">

            <!-- Produk -->
            <div class="card">
                <h3>🍰 Produk</h3>
                <h1><?= $produk; ?></h1>
            </div>


            <!-- Kategori -->
            <div class="card">
                <h3>📂 Kategori</h3>
                <h1><?= $kategori; ?></h1>
            </div>


            <!-- Cabang -->
            <div class="card">
                <h3>🏪 Cabang</h3>
                <h1><?= $cabang; ?></h1>
            </div>


            <!-- User -->
            <div class="card">
                <h3>👤 User</h3>
                <h1><?= $user; ?></h1>
            </div>

        </div>


        <!-- WELCOME -->
        <div class="welcome">

            <h2>Selamat Datang di Sistem Informasi</h2>

            <p>
                Diodhe Cake & Bakery
            </p>

            <p>
                Anda login sebagai aaa
                <strong><?= htmlspecialchars(ucfirst($role)); ?></strong>.
            </p>

        </div>

    </div>

</body>
</html>