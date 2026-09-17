<?php

session_start();

include "config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM cabang WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

$_SESSION['id_cabang']=$data['id'];

$_SESSION['nama_cabang']=$data['nama_cabang'];

header("Location:index.php");

?>