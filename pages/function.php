<?php
session_start();

//Membuat koneksi
$conn = mysqli_connect("localhost","root","","aplikasi_kasir");

function registrasi($data){
    global $conn;
    $nama =$data['nama'];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $data["confirmPassword"]);

    // Cek Username Sudah Ada Atau Belum
    $cekusername = mysqli_query($conn, "SELECT username FROM user WHERE username ='$username'");
    if(mysqli_fetch_assoc($cekusername)){
        echo "<script>
            alert ('Username Sudah Terdaftar!');
            </script>";
        return false;
    }

    // Cek Ulangi Password
    if($password !== $confirmPassword){
        echo "<script>
            alert ('Konfirmasi Sandi Anda Tidak Sesuai!');
            </script>";
        return false;
    }

    // ENKRIPSI PASSWORD
    // $password = md5($password);
    // $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password);

    // Tambahkan User Baru Ke DB
    mysqli_query($conn, "INSERT INTO user (nama, username, sandi) VALUES ('$nama', '$username', '$password')");
    return mysqli_affected_rows($conn);
}


// Input Jenis Menu
if(isset($_POST['inputJenisMenu'])){
    $jenisMenu = $_POST['jenisMenu'];
 
    $tambah = mysqli_query($conn, "INSERT INTO jenis_menu (jenis_menu) VALUES('$jenisMenu')");
    if($tambah){
        header('location:kelola-produk.php');
    } else {
        echo 'Gagal';
        header('location:kelola-produk.php');
    }
}

// Hapus Jenis Menu
if(isset($_POST['hapuslaptopmasuk'])){
    $idbarang = $_POST['idbarang'];
    $kode = $_POST['kode'];

    $hapus = mysqli_query($conn, "DELETE FROM laptopmasuk WHERE idbarang = '$idbarang'");
    $hapus_ = mysqli_query($conn, "DELETE FROM datalaptop WHERE kodebarang = '$kode'");
    if($hapus&&$hapus_){
        header('location:laptopmasuk.php');
    } else {
        echo 'Gagal';
        header('location:laptopmasuk.php');
    }
}


// Input Menu
if(isset($_POST['inputMenu'])){
    $jenisMenu = $_POST['jenisMenu'];
    $namaProduk = $_POST['namaProduk'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp_name, '../assets/pictures/'.$file);
 
    $tambah = mysqli_query($conn,"INSERT INTO menu (jenis_menu, nama_produk, harga, tgl_input, gambar) VALUES('$jenisMenu', '$namaProduk', '$harga', '$tanggal', '$file')");
    if($tambah){
        header('location:kelola-produk.php');
    } else {
        echo 'Gagal';
        header('location:kelola-produk.php');
    }
}

// Ubah Menu
if(isset($_POST['ubahMenu'])){
    $id_produk = $_POST['id_produk'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $file= $_POST['file'];
    $file_baru = $_FILES['file_baru']['name'];
    $tmp_name = $_FILES['file_baru']['tmp_name'];
    $folder = '../assets/pictures/';
 
    if($file_baru != ''){
        $update= mysqli_query($conn, "UPDATE menu SET nama_produk='$nama_produk', harga='$harga', tgl_input='$tanggal', gambar='$file_baru' WHERE id_produk='$id_produk'");
        if($update){
            move_uploaded_file($tmp_name, $folder.$file_baru);
            unlink($folder.$file);
            header('location:kelola-produk.php');
        } else {
            echo 'Gagal';
            header('location:kelola-produk.php');
        }
    }else {
        $update= mysqli_query($conn, "UPDATE menu SET nama_produk='$nama_produk', harga='$harga', tgl_input='$tanggal' WHERE id_produk='$id_produk'");
        if($update){
            header('location:kelola-produk.php');
        } else {
            echo 'Gagal';
            header('location:kelola-produk.php');
        }
    }
}

// Hapus Menu
if(isset($_POST['hapusMenu'])){
    $id_produk = $_POST['id_produk'];
    $file = $_POST['file'];
    $folder = '../assets/pictures/';

    unlink($folder.$file);
    $hapus = mysqli_query($conn, "DELETE FROM menu WHERE id_produk = '$id_produk'");
    if($hapus){
        header('location:kelola-produk.php');
    } else {
        echo 'Gagal';
        header('location:kelola-produk.php');
    }
}




//  Update Data Admin
if(isset($_POST['updateadmin'])){
    $iduser = $_POST['iduser'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $sandi = $_POST['sandi'];

    $update = mysqli_query($conn,"update admin set nama='$nama', username='$username', sandi='$sandi' where iduser ='$iduser'");
    if($update){
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    }
}

//Hapus Data Admin
if(isset($_POST['hapusadmin'])){
    $iduser = $_POST['iduser'];

    $hapus = mysqli_query($conn, "delete from admin where iduser = '$iduser'");

    if($hapus){
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    }
}