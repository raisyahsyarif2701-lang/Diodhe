<?php
include "../cek_akses.php";
include "../config/koneksi.php";

hanyaUntuk(['admin']);

if (isset($_POST['simpan'])) {

    $nama_kategori = trim($_POST['nama_kategori']);

    if ($nama_kategori == '') {
        $error = "Nama kategori wajib diisi!";
    } else {

        // Cek apakah kategori sudah ada
        $cek = mysqli_query(
            $conn,
            "SELECT * FROM kategori 
             WHERE nama_kategori = '$nama_kategori'"
        );

        if (mysqli_num_rows($cek) > 0) {

            $error = "Kategori tersebut sudah ada!";

        } else {

            $query = mysqli_query(
                $conn,
                "INSERT INTO kategori (nama_kategori)
                 VALUES ('$nama_kategori')"
            );

            if ($query) {
                header("Location: ../kategori.php");
                exit;
            } else {
                $error = "Gagal menambahkan kategori!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Kategori - Diodhe Bakery</title>

    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/crud.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="sidebar">

    <h2>Diodhe Bakery</h2>

    <a href="../index.php">
        🏠 Dashboard
    </a>

    <a href="../produk.php">
        🍰 Produk
    </a>

    <a href="../kategori.php" class="active">
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

    <div class="crud-page">

        <div class="crud-header">

            <h2>Tambah Kategori</h2>

        </div>

        <?php if (isset($error)): ?>

            <div style="color:red; margin-bottom:15px;">
                <?= htmlspecialchars($error); ?>
            </div>

        <?php endif; ?>


        <form method="POST">

            <div class="form-group">

                <label>Nama Kategori</label>

                <input
                    type="text"
                    name="nama_kategori"
                    placeholder="Contoh: Roti"
                    required
                >

            </div>


            <button
                type="submit"
                name="simpan"
                class="btn-tambah"
            >
                Simpan
            </button>

            <a
                href="../kategori.php"
                class="btn-hapus"
            >
                Batal
            </a>

        </form>

    </div>

</div>

</body>
</html>