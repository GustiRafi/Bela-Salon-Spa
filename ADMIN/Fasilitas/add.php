<?php

session_start();

require '../../conn.php';

if ( !isset($_SESSION["login"]) ){
    header("location:../login.php");
    exit;
}

if (isset($_POST["add"])) {

    if(add_fasilitas($_POST) > 0) {
        echo "<script>
                alert('Data Berhasil DiTambahkan ');
                document.location.href = 'fasilitas.php';
            </script>";
    }else {
        echo "<script>
                alert('Data Gagal DiTambahkan ');
                document.location.href = 'fasilitas.php';
            </script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bella Salon & Spa</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">


    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <!-- LOGO -->
                </div>
                <div class="sidebar-brand-text mx-3">Bella Salon & Spa</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Website
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/edit.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <span>Profile</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../user/edit.php">Edit Profil</a>
                        <a class="collapse-item" href="../logout.php" onclick="
                return confirm('Yakin akan logout?')"> Logout</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../perawatan/perawatan.php" data-toggle="collapse"
                    data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <span>Data Layanan / Jasa</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../Perawatan/perawatan.php">Data Layanan / Jasa</a>
                        <a class="collapse-item" href="fasilitas.php">Fasilitas</a>
                        <a class="collapse-item" href="../Perawatan/add.php">Tambah Layanan / Jasa</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../Reservasi/booking.php">
                    <span>Data Reservasi</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h5>Bella Salon & Spa</h5>

                    <div class="topbar-divider d-none d-sm-block"></div>
                </nav>
                <!-- Begin Page Content -->
                <div class="container-fluid mt-5">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Fasilitas</h1>
                    </div>

                    <form action="" class="mt-3" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Fasilitas"
                                required>
                        </div>

                        <div class="mb-3">
                            <input type="file" class="form-control" name="foto" id="foto" required>
                        </div>

                        <div class="mb-3">
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="3"
                                placeholder="Deskripsi" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-primary" name="add" id="add">Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>

</body>



<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>


<script src="../js/sb-admin-2.min.js"></script>


<script src="../vendor/chart.js/Chart.min.js"></script>


<script src="../js/demo/chart-area-demo.js"></script>
<script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>