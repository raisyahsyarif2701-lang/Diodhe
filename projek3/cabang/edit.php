<?php

session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM cabang WHERE id='$id'");
$cabang = mysqli_fetch_assoc($data);

if (!$cabang) {
    die("Data cabang tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $nama = mysqli_real_escape_string(
        $conn,
        $_POST['nama_cabang']
    );

    $alamat = mysqli_real_escape_string(
        $conn,
        $_POST['alamat']
    );

    $telepon = mysqli_real_escape_string(
        $conn,
        $_POST['telepon']
    );

    $link_gofood = mysqli_real_escape_string(
        $conn,
        $_POST['link_gofood']
    );

    $link_grabfood = mysqli_real_escape_string(
        $conn,
        $_POST['link_grabfood']
    );


    mysqli_query($conn, "
        UPDATE cabang
        SET
            nama_cabang='$nama',
            alamat='$alamat',
            telepon='$telepon',
            link_gofood='$link_gofood',
            link_grabfood='$link_grabfood'
        WHERE id='$id'
    ");


    header("Location: ../cabang.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Cabang</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="main">

<h2>Edit Cabang</h2>


<form method="POST">


<label>Nama Cabang</label>

<input
    type="text"
    name="nama_cabang"
    value="<?= htmlspecialchars($cabang['nama_cabang']); ?>"
    required
>


<br><br>


<label>Alamat</label>

<textarea
    name="alamat"
    rows="4"
><?= htmlspecialchars($cabang['alamat']); ?></textarea>


<br><br>


<label>Telepon</label>

<input
    type="text"
    name="telepon"
    value="<?= htmlspecialchars($cabang['telepon']); ?>"
    required
>


<br><br>


<label>Link GoFood</label>

<input
    type="url"
    name="link_gofood"
    value="<?= htmlspecialchars($cabang['link_gofood'] ?? ''); ?>"
    placeholder="https://gofood.co.id/..."
>


<br><br>


<label>Link GrabFood</label>

<input
    type="url"
    name="link_grabfood"
    value="<?= htmlspecialchars($cabang['link_grabfood'] ?? ''); ?>"
    placeholder="https://food.grab.com/..."
>


<br><br>


<button
    class="btn btn-warning"
    type="submit"
    name="update"
>
    Update
</button>


<a
    href="../cabang.php"
    class="btn btn-danger"
>
    Kembali
</a>


</form>

</div>

</body>
</html>