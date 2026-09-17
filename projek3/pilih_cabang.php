<?php

session_start();

include "config/koneksi.php";

if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit;
}

$query = mysqli_query($conn,"SELECT * FROM cabang");

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pilih Cabang</title>

<link rel="stylesheet" href="assets/css/cabang.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="container">

<h1>Pilih Cabang</h1>

<p>Selamat Datang,
<b><?php echo $_SESSION['nama']; ?></b>

</p>

<div class="card-container">

<?php

while($row=mysqli_fetch_assoc($query)){

?>

<div class="card">

<h2><?php echo $row['nama_cabang']; ?></h2>

<p><?php echo $row['alamat']; ?></p>

<p><?php echo $row['telepon']; ?></p>

<a href="set_cabang.php?id=<?php echo $row['id']; ?>">

<button>Pilih Cabang</button>

</a>

</div>

<?php

}

?>

</div>

</div>

</body>

</html>