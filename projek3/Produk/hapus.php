<?php

session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

// Ambil nama gambar
$query = mysqli_query($conn, "SELECT gambar FROM produk WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

// Hapus file gambar jika ada
if (!empty($data['gambar']) && file_exists("upload/" . $data['gambar'])) {
    unlink("upload/" . $data['gambar']);
}

// Hapus data dari database
mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

header("Location: ../produk.php");
exit;

?>