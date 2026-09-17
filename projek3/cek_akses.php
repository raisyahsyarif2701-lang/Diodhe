<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

function hanyaUntuk($roles)
{
    if (!in_array($_SESSION['role'], $roles)) {
        echo "<script>
                alert('Anda tidak memiliki hak akses ke halaman ini!');
                window.history.back();
              </script>";
        exit;
    }
}
?>