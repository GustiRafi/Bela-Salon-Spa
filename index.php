<?php

session_start();

require 'conn.php';

$fasilitas = query("SELECT * FROM fasilitas");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/_variables.scss">
    <title>Bella Salon & Spa</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow">
        <div class="container ">
            <a class="navbar-brand text-danger" href="#"><b>Bella Salon & Spa</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navbar-nav text-left">
                            <li><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                            <li><a class="nav-link active" aria-current="page" href="Menu/reservasi.php">Reservasi</a>
                            </li>
                            <li><a class="nav-link active" aria-current="page"
                                    href="Menu/list_perawatan.php">Treatments</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="pt-5 pb-3">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/carausel.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1 class="text-center text-black"><b> Bella Salon & Spa</b></h1>
                            <p class="text-center ">
                                Merawat kecantikan tubuh adalah sebuah kewajiban yang harus dilakukan oleh kaum
                                wanita. Bella Salon & Spa menghadirkan berbagai rangkaian perawatan kecantikan mulai
                                dari rambut, kuku, kulit
                                wajah hingga seluruh tubuh. Dibekali dengan Terapis Profesional dan perawatan
                                tradisional, Bella Salon & Spa
                                mampu menjadikan tubuh rileks dan cantik alami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-2 text-center">
            <h4><b>Jam Operasional Bella Salon & Spa</b> </h4>
            <p>Jl Samas KM 17,Gilangharjo,Pandak,Bantul,Yogyakarta</p>
            <p>Buka Setiap Hari 08.00 - 22.00 WIB</p>

            <p>Kontak Kami</p>
            <a href="https://api.whatsapp.com/send?phone=+6288239775160&text=Hallo ,Bella Salon & Spa" target="_blank"
                data-bs-toggle="tooltip" data-bs-placement="top" title="Klik untuk chat penjual via Whatsapp"><button
                    type="submit" class="btn btn-outline-success mb-3"><i
                        class="bi bi-whatsapp me-2"></i>Whatsapp</button></a>
        </div>

        <div class="bg-danger rounded-3 text-white">
            <h3 class="text-center py-4"><b>Fasilitas</b></h3>
        </div>
        <div class=" row g-0 position-relative d-flex ">
            <?php foreach($fasilitas as $row){ ?>
            <div class="d-flex col-md-6 px-2 pb-3">
                <div class=" rounded rounded-3 ">
                    <h4 class="px-3 py-4"><?= $row["nama_fasilitas"] ?></h4>
                    <img src="img/<?= $row['foto'] ?>" class="w-100 rounded-3" alt="" srcset="">
                    <p><?= $row["deskripsi"] ?></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <hr class="dropdown-divider">
    <div class="container">
        <p>Ikuti Kami</p>
        <div class="d-flex">
            <p><i class="bi bi-instagram me-2"></i>Bella Salon & Spa</p>
        </div>
        <div class="d-flex">
            <p><i class="bi bi-facebook me-2"></i>Bella Salon & Spa</p>
        </div>
        <p>&copy 2022 Bella Salon & Spa</p>
    </div>


    <script src="js/bootstrap.js"></script>

</body>

</html>