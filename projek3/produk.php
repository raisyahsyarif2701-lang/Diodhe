<?php
include "cek_akses.php";
include "config/koneksi.php";

hanyaUntuk(['admin', 'kasir', 'owner']);

$query = mysqli_query($conn, "
    SELECT 
        produk.*,
        kategori.nama_kategori
    FROM produk
    LEFT JOIN kategori
        ON produk.kategori_id = kategori.id
    ORDER BY produk.id DESC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Produk - Diodhe Bakery</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/crud.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="sidebar">

    <h2>Diodhe Bakery</h2>

    <a href="index.php">🏠 Dashboard</a>

    <a href="produk.php" class="active">
        🍰 Produk
    </a>

    <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'owner'): ?>

        <a href="kategori.php">📂 Kategori</a>
        <a href="cabang.php">🏪 Cabang</a>
        <a href="user.php">👤 User</a>

    <?php endif; ?>

    <a href="logout.php">🚪 Logout</a>

</div>


<div class="content">

    <div class="crud-page">

        <div class="crud-header">

            <h2>Daftar Produk</h2>

            <?php if ($_SESSION['role'] == 'admin'): ?>

                <a href="Produk/tambah.php" class="btn-tambah">
                    + Tambah Produk
                </a>

            <?php endif; ?>

        </div>


        <table class="crud-table">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                  

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
                            $data['nama_produk']
                            ?? $data['nama']
                            ?? '-'
                        ); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $data['nama_kategori'] ?? '-'); ?>
                    </td>

                    <td>
                        Rp
                        <?= number_format(
                            $data['harga'] ?? 0,
                            0,
                            ',',
                            '.'
                        ); ?>
                    </td>

                   


                    <?php if ($_SESSION['role'] == 'admin'): ?>

                    <td>

                        <a
                            href="Produk/edit.php?id=<?= $data['id']; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="Produk/hapus.php?id=<?= $data['id']; ?>"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus produk ini?');"
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
                        colspan="<?= $_SESSION['role'] == 'admin' ? '6' : '5'; ?>"
                        style="text-align:center;"
                    >
                        Belum ada data produk.
                    </td>
                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>