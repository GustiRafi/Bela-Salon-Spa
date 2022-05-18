<?php

session_start();

require '../conn.php';

$layanan = query("SELECT * FROM layanan");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
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
                            <li><a class="nav-link active" aria-current="page" href="../index.php">Home</a></li>
                            <li><a class="nav-link active" aria-current="page" href="reservasi.php">Reservasi</a></li>
                            <li><a class="nav-link active" aria-current="page" href="list_perawatan.php">Treatments</a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="pt-5 pb-3">
            <h2 class="text-danger"><b>Daftar Treatment / Perawatan Di Bella Salon & Spa</b></h2>
            <table class="table table-striped responsive mt-4 w-100 text-center">

                <?php $i=1; ?>
                <?php foreach($layanan as $row){ ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["nama_layanan"] ?></td>
                    <td>Rp. <?= number_format($row["harga"],2,',','.' ) ?></td>
                </tr>
                <?php $i++ ?>
                <?php } ?>
            </table>

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

    <script src="../js/bootstrap.js"></script>
</body>

</html>