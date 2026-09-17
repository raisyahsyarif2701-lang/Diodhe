<?php
include "cek_akses.php";
include "config/koneksi.php";

hanyaUntuk(['admin', 'owner']);

$query = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kategori - Diodhe Bakery</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/crud.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="sidebar">

    <h2>Diodhe Bakery</h2>

    <a href="index.php">
        🏠 Dashboard
    </a>

    <a href="produk.php">
        🍰 Produk
    </a>

    <a href="kategori.php" class="active">
        📂 Kategori
    </a>

    <a href="cabang.php">
        🏪 Cabang
    </a>

    <a href="user.php">
        👤 User
    </a>

    <a href="logout.php">
        🚪 Logout
    </a>

</div>


<div class="content">

    <div class="crud-page">

        <div class="crud-header">

            <h2>Daftar Kategori</h2>

            <?php if ($_SESSION['role'] == 'admin'): ?>

                <a href="kategori/tambah.php" class="btn-tambah">
                    + Tambah Kategori
                </a>

            <?php endif; ?>

        </div>


        <table class="crud-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Kategori</th>

                    <?php if ($_SESSION['role'] == 'admin'): ?>

                        <th>Aksi</th>

                    <?php endif; ?>

                </tr>

            </thead>


            <tbody>

            <?php

            $no = 1;

            if (mysqli_num_rows($query) > 0):

                while ($data = mysqli_fetch_assoc($query)):

            ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $data['nama_kategori']
                            ?? $data['nama']
                            ?? '-'
                        ); ?>
                    </td>


                    <?php if ($_SESSION['role'] == 'admin'): ?>

                    <td>

                        <a
                            href="kategori/edit.php?id=<?= $data['id']; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="kategori/hapus.php?id=<?= $data['id']; ?>"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus kategori ini?');"
                        >
                            Hapus
                        </a>

                    </td>

                    <?php endif; ?>

                </tr>

            <?php

                endwhile;

            else:

            ?>

                <tr>

                    <td
                        colspan="<?= $_SESSION['role'] == 'admin' ? '3' : '2'; ?>"
                        style="text-align:center;"
                    >
                        Belum ada data kategori.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>