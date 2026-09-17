<?php
include "cek_akses.php";
include "config/koneksi.php";

hanyaUntuk(['admin', 'owner']);

$query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User - Diodhe Bakery</title>

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

    <a href="kategori.php">
        📂 Kategori
    </a>

    <a href="cabang.php">
        🏪 Cabang
    </a>

    <a href="user.php" class="active">
        👤 User
    </a>

    <a href="logout.php">
        🚪 Logout
    </a>

</div>


<div class="content">

    <div class="crud-page">

        <div class="crud-header">

            <h2>Data User</h2>

            <?php if ($_SESSION['role'] == 'admin'): ?>

                <a href="user/tambah.php" class="btn-tambah">
                    + Tambah User
                </a>

            <?php endif; ?>

        </div>


        <table class="crud-table">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Status</th>

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

                    $role = strtolower($data['role'] ?? '');
                    $status = strtolower($data['status'] ?? '');

            ?>

                <tr>

                    <td>
                        <?= $no++; ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $data['nama'] ?? '-'
                        ); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $data['username'] ?? '-'
                        ); ?>
                    </td>


                    <td>

                        <?php if ($role == 'admin'): ?>

                            <span class="role-admin">
                                Admin
                            </span>

                        <?php elseif ($role == 'kasir'): ?>

                            <span class="role-kasir">
                                Kasir
                            </span>

                        <?php elseif ($role == 'owner'): ?>

                            <span class="role-owner">
                                Owner
                            </span>

                        <?php else: ?>

                            <?= htmlspecialchars(
                                ucfirst($role ?: '-')
                            ); ?>

                        <?php endif; ?>

                    </td>


                    <td>

                        <?php if ($status == 'aktif'): ?>

                            <span class="status-aktif">
                                Aktif
                            </span>

                        <?php else: ?>

                            <span class="status-nonaktif">
                                Nonaktif
                            </span>

                        <?php endif; ?>

                    </td>


                    <?php if ($_SESSION['role'] == 'admin'): ?>

                    <td>

                        <a
                            href="user/edit.php?id=<?= $data['id']; ?>"
                            class="btn-edit"
                        >
                            Edit
                        </a>

                        <a
                            href="user/hapus.php?id=<?= $data['id']; ?>"
                            class="btn-hapus"
                            onclick="return confirm('Yakin ingin menghapus user ini?');"
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
                        Belum ada data user.
                    </td>

                </tr>

            <?php endif; ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>