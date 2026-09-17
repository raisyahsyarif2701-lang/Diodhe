<?php

session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST['simpan'])) {

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
        INSERT INTO cabang
        (
            nama_cabang,
            alamat,
            telepon,
            link_gofood,
            link_grabfood
        )
        VALUES
        (
            '$nama',
            '$alamat',
            '$telepon',
            '$link_gofood',
            '$link_grabfood'
        )
    ");


    header("Location: ../cabang.php");
    exit;
}

?>

<!DOCTYPE html>

<html lang="id">

<head>

```
<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Tambah Cabang - Diodhe Bakery</title>

<link
    rel="stylesheet"
    href="../assets/css/style.css"
>
```

</head>

<body>

<div class="main">

```
<h2>
    Tambah Cabang
</h2>


<form method="POST">


    <!-- NAMA CABANG -->

    <label>
        Nama Cabang
    </label>

    <input
        type="text"
        name="nama_cabang"
        placeholder="Contoh: Diodhe Bekasi"
        required
    >


    <br><br>


    <!-- ALAMAT -->

    <label>
        Alamat
    </label>

    <textarea
        name="alamat"
        rows="4"
        placeholder="Masukkan alamat lengkap cabang"
        required
    ></textarea>


    <br><br>


    <!-- TELEPON -->

    <label>
        No. Telepon
    </label>

    <input
        type="text"
        name="telepon"
        placeholder="Contoh: 081234567890"
        required
    >


    <br><br>


    <!-- GOFOOD -->

    <label>
        Link GoFood
    </label>

    <input
        type="url"
        name="link_gofood"
        placeholder="https://gofood.link/..."
    >


    <br><br>


    <!-- GRABFOOD -->

    <label>
        Link GrabFood
    </label>

    <input
        type="url"
        name="link_grabfood"
        placeholder="https://food.grab.com/..."
    >


    <br><br>


    <!-- BUTTON -->

    <button
        class="btn btn-primary"
        type="submit"
        name="simpan"
    >
        💾 Simpan
    </button>


    <a
        href="../cabang.php"
        class="btn btn-danger"
    >
        Kembali
    </a>

</form>
```

</div>

</body>
</html>
