<?php
include "cek_akses.php";
include "config/koneksi.php";

hanyaUntuk(['admin', 'owner']);

$query = mysqli_query($conn, "SELECT * FROM cabang ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cabang - Diodhe Bakery</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/crud.css">
    <link rel="stylesheet" href="assets/css/cabang.css">

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

    <a href="kategori.php">
        📂 Kategori
    </a>

    <a href="cabang.php" class="active">
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

            <h2>Daftar Cabang</h2>

            <?php if ($_SESSION['role'] == 'admin'): ?>

                <a href="cabang/tambah.php" class="btn-tambah">
                    + Tambah Cabang
                </a>

            <?php endif; ?>

        </div>


        <table class="crud-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama Cabang</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>link gofood</th>
                    <th>link grabfood</th>

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
                            $data['nama_cabang']
                            ?? $data['nama']
                            ?? '-'
                        ); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $data['alamat']
                            ?? '-'
                        ); ?>
                    </td>
                    
                     <td>
                        <?= htmlspecialchars(
                            $data['telepon']
                            ?? '-'
                        ); ?>
                    </td>
                    
                    
<td>
    <?php if (!empty($data['link_gofood'])): ?>

        <a
            href="<?= htmlspecialchars($data['link_gofood']); ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="btn-gofood"
        >
            🍴 GoFood
        </a>

    <?php else: ?>

        <span class="link-kosong">Tidak ada</span>

    <?php endif; ?>
</td>
                    
<td>
    <?php if (!empty($data['link_grabfood'])): ?>

        <a
            href="<?= htmlspecialchars($data['link_grabfood']); ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="btn-grabfood"
        >
            🛵 GrabFood
        </a>

    <?php else: ?>

        <span class="link-kosong">Tidak ada</span>

    <?php endif; ?>
</td>


                    <?php if ($_SESSION['role'] == 'admin'): ?>

                    <td>

                        <a
                            href="cabang/edit.php?id=<?= $data['id']; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="cabang/hapus.php?id=<?= $data['id']; ?>"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus cabang ini?');"
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
                        colspan="<?= $_SESSION['role'] == 'admin' ? '4' : '3'; ?>"
                        style="text-align:center;"
                    >
                        Belum ada data cabang.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>