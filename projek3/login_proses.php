<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "
        SELECT * FROM users
        WHERE username='$username'
        AND password='$password'
        AND status='aktif'
        LIMIT 1
    ");

    if (!$query) {
        die("Query Error: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($query) == 1) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['login'] = true;
        $_SESSION['id'] = $data['id'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];

        header("Location: index.php");
        exit;

    } else {

        echo "<script>
                alert('Username atau Password salah!');
                window.location='login.php';
              </script>";
    }

} else {

    header("Location: login.php");
    exit;

}
?>