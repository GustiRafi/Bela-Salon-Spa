<?php

session_start();
require '../../conn.php';

if (!isset($_SESSION["login"]) ) {
    header("location:../login.php");
    exit;
}

$id = $_GET["id"];

if (delete_fasilitas($id) > 0) {
    echo "<script>
            alert('Data Berhasil Di Hapus');
            document.location.href = 'fasilitas.php';
        </script>";
} else {
    echo "<script>
            alert('Data Gagal Di Hapus');
            document.location.href = 'fasilitas.php';
        </script>";
}

?>