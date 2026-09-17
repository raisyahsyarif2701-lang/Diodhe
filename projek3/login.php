<?php
session_start();

if(isset($_SESSION['username'])){
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Diodhe Cake & Bakery</title>

<link rel="stylesheet" href="assets/css/login.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="login-box">

<img src="assets/image/Logo.jpeg" alt="Logo Diodhe Cake & Bakery" class="logo" style="
    width: 180px;
    height: 180px;
    object-fit: contain;
    display: block;
    margin: 0 auto 20px;">

<h1>Diodhe Cake &<br>Bakery</h1>

<p class="subtitle">Sistem Informasi Bakery</p>

<form action="login_proses.php" method="POST">

<div class="input-group">
<input
type="text"
name="username"
placeholder="Masukkan Username"
required>
</div>

<div class="input-group">
<input
type="password"
name="password"
placeholder="Masukkan Password"
required>
</div>

<button type="submit" name="login">

Login

</button>

</form>

<div class="footer">

© 2026 Diodhe Cake & Bakery

</div>

</div>

</body>

</html>