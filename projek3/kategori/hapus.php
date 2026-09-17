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

$cek = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS jumlah
     FROM produk
     WHERE kategori_id='$id'"
);

$data = mysqli_fetch_assoc($cek);

if ($data['jumlah'] > 0) {

    echo "
        <script>
            alert('Kategori tidak bisa dihapus karena masih digunakan oleh produk.');
            window.location='../kategori.php';
        </script>
    ";

    exit;
}

mysqli_query(
    $conn,
    "DELETE FROM kategori WHERE id='$id'"
);

header("Location: ../kategori.php");
exit;