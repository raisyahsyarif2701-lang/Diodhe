<?php

session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

if ($_SESSION['role'] != 'admin') {
    header("Location: ../kategori.php");
    exit;
}

$id = $_GET['id'] ?? '';

$query = mysqli_query(
    $conn,
    "SELECT * FROM kategori WHERE id='$id'"
);

$kategori = mysqli_fetch_assoc($query);

if (!$kategori) {
    die("Kategori tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $nama_kategori = $_POST['nama_kategori'];

    mysqli_query($conn, "
        UPDATE kategori
        SET nama_kategori='$nama_kategori'
        WHERE id='$id'
    ");

    header("Location: ../kategori.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Edit Kategori - Diodhe Bakery</title>

    <link
        rel="stylesheet"
        href="../assets/css/style.css"
    >

</head>

<body>

<div class="sidebar">

    <h2>Diodhe Bakery</h2>

    <a href="../index.php">
        🏠 Dashboard
    </a>

    <a href="../produk.php">
        🍰 Produk
    </a>

    <a href="../kategori.php" class="active">
        📂 Kategori
    </a>

    <a href="../cabang.php">
        🏪 Cabang
    </a>

    <a href="../user.php">
        👤 User
    </a>

    <a href="../logout.php">
        🚪 Logout
    </a>

</div>


<div class="content">

    <div class="topbar">

        <h1>Edit Kategori</h1>

    </div>


    <div class="crud-page">

        <form method="POST">

            <label>
                Nama Kategori
            </label>

            <input
                type="text"
                name="nama_kategori"
                value="<?= htmlspecialchars(
                    $kategori['nama_kategori']
                ); ?>"
                required
            >

            <br><br>

            <button
                type="submit"
                name="update"
                class="btn btn-primary"
            >
                💾 Simpan Perubahan
            </button>

            <a
                href="../kategori.php"
                class="btn btn-danger"
            >
                Kembali
            </a>

        </form>

    </div>

</div>

</body>
</html>