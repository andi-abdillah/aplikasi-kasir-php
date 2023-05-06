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

//format ribuan menjadi k
function format_angka($angka) {
    if ($angka >= 1000) {
        $angka_format = number_format($angka / 1000, 1) . 'k';
    } else {
        $angka_format = $angka;
    }
    return $angka_format;
}

// melakukan query untuk mengambil nilai dari kolom "nama_kolom" pada baris pertama tabel "nama_tabel"
$result = mysqli_query($conn, "SELECT jenis_menu FROM jenis_menu LIMIT 0, 1");

// mengambil nilai dari hasil query
$data = mysqli_fetch_array($result);

// mengubah nilai menjadi string
$pilihan_jenis_menu = strval($data["jenis_menu"]);
$warna_menu = 'primary';

if(isset($_POST['pilih_jenis_menu'])){
    $pilihan_jenis_menu = $_POST['jenis_menu'];
}

if(isset($_POST['pilih_jenis_menu2'])){
    $pilihan_jenis_menu = $_POST['jenis_menu'];
    $warna_menu = $_POST['warna_menu'];
}

// Input Jenis Menu
if(isset($_POST['input_jenis_menu'])){
    $jenis_menu = $_POST['jenis_menu'];
 
    $tambah = mysqli_query($conn, "INSERT INTO jenis_menu (jenis_menu) VALUES('$jenis_menu')");
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
if(isset($_POST['input_menu'])){
    $jenis_menu = $_POST['jenis_menu'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];

    move_uploaded_file($tmp_name, '../assets/pictures/'.$file);
    $tambah = mysqli_query($conn,"INSERT INTO menu (jenis_menu, nama_produk, harga, tgl_input, gambar) VALUES('$jenis_menu', '$nama_produk', '$harga', '$tanggal', '$file')");
}

// Ubah Menu
if(isset($_POST['ubah_menu'])){
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
if(isset($_POST['hapus_menu'])){
    $id_produk = $_POST['id_produk'];
    $file = $_POST['file'];
    $folder = '../assets/pictures/';

    unlink($folder.$file);
    $hapus = mysqli_query($conn, "DELETE FROM menu WHERE id_produk = '$id_produk'");
}

// Input Pesanan
if(isset($_POST['input_pesanan'])){
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $subtotal = $harga * $jumlah;
    
    $tambah = mysqli_query($conn,"INSERT INTO pesanan (nama_produk, harga, jumlah, subtotal) VALUES('$nama_produk', '$harga', '$jumlah', '$subtotal')");
}

// Hapus Pesanan
if(isset($_POST['hapus_pesanan'])){
    $id_pesanan = $_POST['id_pesanan'];
    
    $hapus = mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");
}


//Pindah Data Pesanan Ke Riwayat Transaksi
if(isset($_POST['konfirmasi_pesanan'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $tanggal = $_POST['tanggal'];

    $update= mysqli_query($conn, "UPDATE pesanan SET nama_pembeli='$nama_pembeli', tgl_transaksi='$tanggal'");
    if($update){
        $pindahdata = mysqli_query($conn, "INSERT INTO transaksi (nama_pembeli, nama_produk, tgl_transaksi, harga, jumlah, subtotal) SELECT nama_pembeli, nama_produk, tgl_transaksi, harga, jumlah, subtotal FROM pesanan");
        $hapusdata = mysqli_query($conn, "DELETE FROM pesanan ");
    } else {
        echo 'Gagal';
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