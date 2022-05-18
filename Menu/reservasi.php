<?php

session_start();

require '../conn.php';

$layanan = query("SELECT * FROM layanan");

if(isset($_POST["reservasi"])){
    if(add_resrvasi($_POST) > 0 ){
        echo "
            <script>
                alert('Reservasi Berhasil...!! Bella Salon & Spa akan menghubungimu melalui Whatsapp');
            </script>
        ";
    }
}

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
            <h2 class="text-danger"><b>Reservasi Tanggal</b></h2>

            <form action="" method="post" class="py-3">
                <div class="mb-3">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>
                </div>
                <div class="mb-3">
                    <select name="layanan" class="form-select" id="layanan" required>
                        <option value="">Jenis Perawatan</option>
                        <?php foreach($layanan as $row){ ?>
                        <option value="<?= $row['id_layanan'] ?>"><?= $row["nama_layanan"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class=" mb-3">
                    <input type="text" class="form-control" name="nohp" id="nohp" placeholder="Nomer Telephon" required>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" required>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="jam" id="jam"
                        placeholder="Jam / Waktu | contoh penulisan jam  : 13.00" required>
                </div>
                <div class="mb-3">
                    <button type="submit" name="reservasi" id="reservasi"
                        class="btn btn-outline-danger">Reservasi</button>
                </div>
            </form>
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