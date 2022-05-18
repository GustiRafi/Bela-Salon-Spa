<?php

require '../conn.php';

if(isset( $_POST["register"])){

    if(registrasi($_POST) > 0 ){
        echo "<script>
                alert('Registrasi Berhasil');
            </script>";
        echo " <script>
                window.location='login.php'
            </script>";
    }else{
        echo "<script>
                alert('Registrasi Gagal');
            </script>";
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
            <a class="navbar-brand text-danger" href="index.php"><b>Bella Salon & Spa</b></a>
            <ul class="nav navbar-nav navbar-right navbar-light">
                <a href="signup.php">
                    <button type="submit" class="btn btn-outline-danger me-2 my-2">Daftar</button>
                </a>
                <a href="login.php">
                    <button type="submit" class="btn btn-outline-danger me-2 my-2">Login</button>
                </a>
            </ul>
        </div>
    </nav>

    <div class="container-fluid vh-100" style="margin-top:50px">

        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-danger"><b> Sign Up</b></h3>
                    </div>
                    <form action="" method="post">
                        <div class="p-4">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger">
                                    <i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Name"
                                    required htmlspecialchars>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger">
                                    <i class="bi bi-phone text-white"></i></span>
                                <input type="text" name="nohp" id="nohp" class="form-control"
                                    placeholder="Nomer Telephon" required htmlspecialchars>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger">
                                    <i class="bi bi-building text-white"></i></span>
                                <select name="role" id="role" class="form-select" aria-label="Default select example">
                                    <option value="">Status</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Karyawan">Karyawan</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="password" required htmlspecialchars>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-danger"><i
                                        class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password2" id="password2" class="form-control"
                                    placeholder=" Confirm password " required htmlspecialchars>
                            </div>
                            <button class="btn btn-danger text-center mt-2" type="submit" name="register">
                                Sign Up
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../js/bootstrap.js"></script>
</body>

</html>