<?php

session_start();
require '../../conn.php';

if (!isset($_SESSION["login"]) ) {
    header("location:../login.php");
    exit;
}

$id = $_GET["id"];

if (delete_reservasi($id) > 0) {
    echo "<script>
            alert('Data Berhasil Di Hapus');
            document.location.href = 'booking.php';
        </script>";
} else {
    echo "<script>
            alert('Data Gagal Di Hapus');
            document.location.href = 'booking.php';
        </script>";
}

?>