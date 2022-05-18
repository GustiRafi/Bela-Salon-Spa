<?php

$conn = mysqli_connect("localhost","root", "", "bela-salon")
        or die ('gagal terkoneksi ke database');


function query ($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data) {
    global $conn;

    $nama = strtolower(stripslashes($data ["nama"] ) );
    $nohp = strtolower( stripslashes($data ["nohp"] ) );
    $role = strtolower(stripslashes($data["role"]));
    $password = mysqli_real_escape_string( $conn, $data ["password"] );
    $password2 = mysqli_real_escape_string( $conn, $data ["password2"] );

    //cek konfirmasi password
    if ( $password !== $password2 ) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";
        return false;
    }

    //enskripsi password
    $password = password_hash($password , PASSWORD_DEFAULT);

    //tambahkan data ke database
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$nama', '$nohp','$role', '$password')");
    return mysqli_affected_rows($conn);

}

function edit_profile($data){
    global $conn;
    
    $id = $_SESSION["id"];
    $nama = htmlspecialchars($data['nama']);
    $nohp = htmlspecialchars($data["no_hp"]);

    //query ubah data
    $query ="UPDATE users SET
            nama = '$nama',
            no_hp = '$nohp'
            WHERE id_user = $id";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function ganti_password($data){
    global $conn;
    
    $id = $data["id"];
    $oldpass= htmlspecialchars($data["oldpassword"]);
    $newpass = htmlspecialchars($data["newpass"]);
    $confirm = htmlspecialchars($data["confirm"]);

    $result = mysqli_query($conn,"SELECT * FROM users WHERE id_user = '$id' ");
    $row = mysqli_fetch_assoc($result);

     // cek password lama
    if (password_verify($oldpass,$row["password"])) {
        
        if($confirm === $newpass) {
            //enskripsi password baru
            $newpass = password_hash($newpass, PASSWORD_DEFAULT);

            $query = "UPDATE users SET password = '$newpass' WHERE id_user = $id";
            mysqli_query($conn, $query);

            return mysqli_affected_rows($conn);

        } else {
            echo "<script>
                alert ('Konfirmasi password salah');
        </script>";
            return false;
        }
    } else {
        echo "<script>
                alert ('password lama salah');
        </script>";
    }
}

function add_threat($data){
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $desk = htmlspecialchars($data["desk"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO layanan VALUES ('','$nama','$desk','$harga')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function edit_threat($data){
    global $conn;


    $id=htmlspecialchars($data["id"]);
    $nama_layanan = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["desk"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE layanan SET nama_layanan = '$nama_layanan',
            deskripsi = '$deskripsi', harga = '$harga' WHERE id_layanan = $id ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function delete_threat($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM layanan WHERE id_layanan = $id");
    return mysqli_affected_rows($conn);
}

function add_resrvasi($data){
    global $conn;

    $layanan = htmlspecialchars($data["layanan"]);
    $nama = htmlspecialchars($data["nama"]);
    $no_hp = htmlspecialchars($data["nohp"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jam = htmlspecialchars($data["jam"]);

    $query = "INSERT INTO reservasi VALUES ('','$layanan','$nama','$no_hp','$tanggal','$jam')";

    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function edit_reservasi($data){
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $no_hp = htmlspecialchars($data["nohp"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $jam = htmlspecialchars($data["jam"]);
    $layanan = htmlspecialchars($data["layanan"]);

    $query = "UPDATE reservasi SET id_layanan = '$layanan', nama = '$nama',
            no_hp = '$no_hp', tanggal = '$tanggal', jam = '$jam' WHERE id_reservasi = $id ";
            
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function delete_reservasi($id){
    global $conn;

    mysqli_query($conn,"DELETE FROM reservasi WHERE id_reservasi = $id");
    return mysqli_affected_rows($conn);
}

function upload() {
    $namafile = $_FILES['foto']['name'];
    $sizefile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmp_name =$_FILES['foto']['tmp_name'];

    //cek jenis file
    $ekstensifileValid = ['jpg','jpeg','png'];
    $ekstensifile = explode('.', $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if (!in_array($ekstensifile,$ekstensifileValid)) {
        echo "<script>
                alert('Format File yang anda upload tidak sesuai ');
            </script>";
        return false;
    }

    //cek ukuran file
    $maxsize = 10000000;
    if ($sizefile > $maxsize) {
        echo "<script>
                alert('Ukuran File yang Anda upload terlalu besar');
            </script>";
        return false;
    }

    move_uploaded_file($tmp_name, '../../img/' . $namafile);

    return $namafile;

}

function add_fasilitas($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);
    
    $foto = upload();

    
    //masukan data
    $query = "INSERT INTO fasilitas VALUES ('','$nama','$foto','$deskripsi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function edit_fasilitas($data){
    global $conn;

    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $oldphoto = htmlspecialchars($data["oldphoto"]);
    $deskripsi = htmlspecialchars($data["deskripsi"]);

    if($_FILES["foto"]["error"] === 4) {
        $foto = $oldphoto;
    } else {
        $foto = upload();
    }

    // update data 
    $query = "UPDATE fasilitas SET
            nama_fasilitas = '$nama',
            foto = '$foto',
            deskripsi = '$deskripsi'
            WHERE id_fasilitas = $id";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

function delete_fasilitas($id){
    global $conn;
    
    
    $produk = mysqli_query($conn,"SELECT * FROM fasilitas WHERE id_fasilitas = $id");
    $row = mysqli_fetch_assoc($produk);


  //hapus foto dari folder
    $path = "../../img/". $row["foto"];

    if(file_exists($path)){
        unlink($path);
    }

    // hapus data dari database
    mysqli_query($conn,"DELETE FROM fasilitas WHERE id_fasilitas = $id");
    return mysqli_affected_rows($conn);
}


?>