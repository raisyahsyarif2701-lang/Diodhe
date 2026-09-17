<?php
session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$kategori = mysqli_query($conn, "SELECT * FROM kategori");

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];
    
    $gambar = "";

    if (isset($_FILES['gambar']) && $_FILES['gambar']['name'] != "") {

        $gambar = time() . "_" . basename($_FILES['gambar']['name']);

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "upload/" . $gambar
        );
    }

mysqli_query($conn, "
    INSERT INTO produk
    (
        nama_produk,
        deskripsi,
        kategori_id,
        harga,
        gambar
    )
    VALUES
    (
        '$nama',
        '$deskripsi',
        '$kategori_id',
        '$harga',
        '$gambar'
    )
");

    header("Location: ../produk.php");
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

<title>Tambah Produk - Diodhe Bakery</title>

<link
    rel="stylesheet"
    href="../assets/css/style.css"
>

<link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet"
>
```

</head>

<body>

<div class="sidebar">


<h2>Diodhe Bakery</h2>

<a href="../index.php">
    🏠 Dashboard
</a>

<a href="../produk.php" class="active">
    🍰 Produk
</a>

<?php if (
    $_SESSION['role'] == 'admin' ||
    $_SESSION['role'] == 'owner'
): ?>

    <a href="../kategori.php">
        📂 Kategori
    </a>

    <a href="../cabang.php">
        🏪 Cabang
    </a>

    <a href="../user.php">
        👤 User
    </a>

<?php endif; ?>

<a href="../logout.php">
    🚪 Logout
</a>


</div>

<div class="content">


<div class="topbar">

    <h1>
        Tambah Produk
    </h1>

</div>


<div class="crud-page">

    <form
        method="POST"
        enctype="multipart/form-data"
    >


        <!-- NAMA PRODUK -->

        <label>
            Nama Produk
        </label>

        <input
            type="text"
            name="nama_produk"
            placeholder="Masukkan nama produk"
            required
        >


        <!-- DESKRIPSI -->

        <label>
            Deskripsi
        </label>

        <textarea
            name="deskripsi"
            rows="5"
            placeholder="Masukkan deskripsi produk"
        ></textarea>


        <!-- KATEGORI -->

        <label>
            Kategori
        </label>

        <select
            name="kategori_id"
            required
        >

            <option value="">
                -- Pilih Kategori --
            </option>

            <?php while (
                $k = mysqli_fetch_assoc($kategori)
            ): ?>

                <option value="<?= $k['id']; ?>">

                    <?= htmlspecialchars(
                        $k['nama_kategori']
                    ); ?>

                </option>

            <?php endwhile; ?>

        </select>


        <!-- HARGA -->

        <label>
            Harga
        </label>

        <input
            type="number"
            name="harga"
            min="0"
            placeholder="Contoh: 52000"
            required
        >


       


        <!-- GAMBAR -->

        <label>
            Foto Produk
        </label>

        <input
            type="file"
            name="gambar"
            accept="image/*"
        >


        <br><br>


        <!-- BUTTON -->

        <button
            type="submit"
            class="btn btn-primary"
            name="simpan"
        >
            💾 Simpan Produk
        </button>


        <a
            href="../produk.php"
            class="btn btn-danger"
        >
            Kembali
        </a>

    </form>

</div>


</div>

</body>
</html>
