<?php

$host = "sql305.infinityfree.com";
$user = "if0_42701808";
$password = "S6z1EJ2SWMVvwn0";
$database = "if0_42701808_diodhe_bakery";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal : " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>