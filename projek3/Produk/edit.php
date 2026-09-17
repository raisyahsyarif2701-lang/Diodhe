<?php

session_start();
include "../config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'] ?? '';

$data = mysqli_query(
    $conn,
    "SELECT * FROM produk WHERE id='$id'"
);

$produk = mysqli_fetch_assoc($data);

if (!$produk) {
    die("Produk tidak ditemukan.");
}

$kategori = mysqli_query(
    $conn,
    "SELECT * FROM kategori"
);


if (isset($_POST['update'])) {

    $nama = $_POST['nama_produk'];
    $deskripsi = $_POST['deskripsi'];
    $kategori_id = $_POST['kategori_id'];
    $harga = $_POST['harga'];

   


    /* =========================
       JIKA GANTI GAMBAR
    ========================== */

    if (
        isset($_FILES['gambar']) &&
        $_FILES['gambar']['name'] != ""
    ) {

        $gambar = time() . "_" .
            basename($_FILES['gambar']['name']);

        move_uploaded_file(
            $_FILES['gambar']['tmp_name'],
            "upload/" . $gambar
        );


       mysqli_query($conn, "
    UPDATE produk SET
        nama_produk='$nama',
        deskripsi='$deskripsi',
        kategori_id='$kategori_id',
        harga='$harga',
        gambar='$gambar'
    WHERE id='$id'
");

    }

    /* =========================
       JIKA TIDAK GANTI GAMBAR
    ========================== */

    else {

      mysqli_query($conn, "
    UPDATE produk SET
        nama_produk='$nama',
        deskripsi='$deskripsi',
        kategori_id='$kategori_id',
        harga='$harga'
    WHERE id='$id'
");
    }


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

    <title>Edit Produk - Diodhe Bakery</title>

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

    <a href="../produk.php" class="active">
        🍰 Produk
    </a>

    <a href="../kategori.php">
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

        <h1>
            Edit Produk
        </h1>

    </div>


    <div class="crud-page">

        <form
            method="POST"
            enctype="multipart/form-data"
        >


            <!-- NAMA -->

            <label>
                Nama Produk
            </label>

            <input
                type="text"
                name="nama_produk"
                value="<?= htmlspecialchars($produk['nama_produk']); ?>"
                required
            >


            <br><br>


            <!-- DESKRIPSI -->

            <label>
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                rows="5"
            ><?= htmlspecialchars($produk['deskripsi']); ?></textarea>


            <br><br>


            <!-- KATEGORI -->

            <label>
                Kategori
            </label>

            <select
                name="kategori_id"
                required
            >

                <?php while ($k = mysqli_fetch_assoc($kategori)): ?>

                    <option
                        value="<?= $k['id']; ?>"
                        <?= ($k['id'] == $produk['kategori_id'])
                            ? 'selected'
                            : ''; ?>
                    >

                        <?= htmlspecialchars(
                            $k['nama_kategori']
                        ); ?>

                    </option>

                <?php endwhile; ?>

            </select>


            <br><br>


            <!-- HARGA -->

            <label>
                Harga
            </label>

            <input
                type="number"
                name="harga"
                value="<?= htmlspecialchars($produk['harga']); ?>"
                min="0"
                required
            >


            <br><br>


          


            <br><br>


            <!-- FOTO LAMA -->

            <label>
                Foto Saat Ini
            </label>

            <br><br>

            <?php if (!empty($produk['gambar'])): ?>

                <img
                    src="upload/<?= htmlspecialchars(
                        $produk['gambar']
                    ); ?>"
                    width="150"
                    alt="Foto Produk"
                >

            <?php else: ?>

                <p>
                    Belum ada foto.
                </p>

            <?php endif; ?>


            <br><br>


            <!-- GANTI FOTO -->

            <label>
                Ganti Foto
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
                name="update"
                class="btn btn-primary"
            >
                💾 Simpan Perubahan
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