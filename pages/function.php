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
  $password = password_hash($password, PASSWORD_DEFAULT);
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

//format maksimal kata yang ditampilkan
function batasi_teks($teks, $batas_karakter) {
  if (strlen($teks) > $batas_karakter) { // memeriksa panjang karakter pada $teks
    $teks = substr($teks, 0, $batas_karakter) . "..."; // membatasi panjang karakter menjadi $batas_karakter dan menambahkan elipsis
  }
  return $teks; // mengembalikan teks yang sudah dibatasi
}


$pilihan_jenis_menu = "";
// melakukan query untuk mengambil nilai dari kolom "nama_kolom" pada baris pertama tabel "nama_tabel"
$result = mysqli_query($conn, "SELECT jenis_menu FROM jenis_menu LIMIT 0, 1");
if (mysqli_num_rows($result) > 0) {
  // mengambil nilai dari hasil query
  $data = mysqli_fetch_array($result);
  
  // mengubah nilai menjadi string
  $pilihan_jenis_menu = strval($data["jenis_menu"]);

}

// Mengubah Daftar Menu yang Tampil
if(isset($_POST['pilih_jenis_menu'])){
  $pilihan_jenis_menu = $_POST['jenis_menu'];
}

// Mengubah Warna Header Tabel dan Mengubah Daftar Menu yang Tampil
$warna_menu = 'primary';
if(isset($_POST['pilih_jenis_menu2'])){
    $pilihan_jenis_menu = $_POST['jenis_menu'];
    $warna_menu = $_POST['warna_menu'];
}

// Input Jenis Menu
if(isset($_POST['input_jenis_menu'])){
  $jenis_menu = $_POST['jenis_menu'];
 
  $tambah = mysqli_query($conn, "INSERT INTO jenis_menu (jenis_menu) VALUES('$jenis_menu')");
  if($tambah){
    header('location:./kelola-produk.php');
  } else {
    echo 'Gagal';
    header('location:./kelola-produk.php');
  }
}

// Hapus Jenis Menu
if(isset($_POST['hapus_jenis_menu'])){
  $id_menu = $_POST['id_menu'];
  $jenis_menu = $_POST['jenis_menu'];
  $folder = '../assets/img/products/';

  $hapus_jenis_menu = mysqli_query($conn, "DELETE FROM jenis_menu WHERE id_menu = '$id_menu'");
  $data_menu = mysqli_query($conn, "SELECT * FROM menu WHERE jenis_menu = '$jenis_menu'");
  if(mysqli_num_rows($data_menu) > 0) {
    while($data=mysqli_fetch_array($data_menu)){
      $file = $data['gambar'];
      unlink($folder.$file);
    }
  }
  $hapus_data_menu = mysqli_query($conn, "DELETE FROM menu WHERE jenis_menu = '$jenis_menu'");
  if($hapus_jenis_menu&&$hapus_data_menu){
    header('location:./kelola-produk.php');
  }else {
    echo 'Gagal';
    header('location:./kelola-produk.php');
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

  move_uploaded_file($tmp_name, '../assets/img/products/'.$file);
  $tambah = mysqli_query($conn,"INSERT INTO menu (jenis_menu, nama_produk, harga, tgl_input, gambar) VALUES('$jenis_menu', '$nama_produk', '$harga', '$tanggal', '$file')");
  if($tambah){
    header('location:./kelola-produk.php');
  }else {
    echo 'Gagal';
    header('location:./kelola-produk.php');
  }
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
  $folder = '../assets/img/products/';

  if($file_baru != ''){
    $update= mysqli_query($conn, "UPDATE menu SET nama_produk='$nama_produk', harga='$harga', tgl_input='$tanggal', gambar='$file_baru' WHERE id_produk='$id_produk'");
    if($update){
      move_uploaded_file($tmp_name, $folder.$file_baru);
      unlink($folder.$file);
      header('location:./kelola-produk.php');
    }else {
      echo 'Gagal';
      header('location:./kelola-produk.php');
    }
  }else {
    $update= mysqli_query($conn, "UPDATE menu SET nama_produk='$nama_produk', harga='$harga', tgl_input='$tanggal' WHERE id_produk='$id_produk'");
    if($update){
      header('location:./kelola-produk.php');
    }else {
      echo 'Gagal';
      header('location:./kelola-produk.php');
    }
  }
}

// Hapus Menu
if(isset($_POST['hapus_menu'])){
  $id_produk = $_POST['id_produk'];
  $file = $_POST['file'];
  $folder = '../assets/img/products/';
  if($file) {
    unlink($folder.$file);
  }
  $hapus = mysqli_query($conn, "DELETE FROM menu WHERE id_produk = '$id_produk'");
  if($hapus){
    header('location:./kelola-produk.php');
  }else {
    echo 'Gagal';
    header('location:./kelola-produk.php');
  }
}

// Input Pesanan
if(isset($_POST['input_pesanan'])){
  $nama_produk = $_POST['nama_produk'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $subtotal = $harga * $jumlah;
  $gambar = $_POST['gambar'];
  $tanggal_sekarang = date("YmdH-i");
  $nomor_transaksi = "OWJ".$tanggal_sekarang;
  
  $tambah = mysqli_query($conn,"INSERT INTO pesanan (nomor_transaksi, nama_produk, harga, jumlah, subtotal, gambar) VALUES('$nomor_transaksi', '$nama_produk', '$harga', '$jumlah', '$subtotal', '$gambar')");
  if($tambah){
    header('location:./katalog.php');
  }else {
    echo 'Gagal';
    header('location:./katalog.php');
  }
}

// Hapus Pesanan
if(isset($_POST['hapus_pesanan'])){
  $id_pesanan = $_POST['id_pesanan'];
  
  $hapus = mysqli_query($conn, "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan'");
  if($hapus){
    header('location:./katalog.php');
  }else {
    echo 'Gagal';
    header('location:./katalog.php');
  }

}

//Pindah Data Pesanan Ke Riwayat Transaksi
if(isset($_POST['konfirmasi_pesanan'])){
  $nomor_transaksi = $_POST['kwitansi'];
  $nama_pembeli = $_POST['nama_pembeli'];
  $tanggal = $_POST['tanggal'];
  
  $update= mysqli_query($conn, "UPDATE pesanan SET nomor_transaksi='$nomor_transaksi', nama_pembeli='$nama_pembeli', tanggal='$tanggal'");
  if($update){
    $pindahdata = mysqli_query($conn, "INSERT INTO transaksi (nomor_transaksi, nama_pembeli, nama_produk, tanggal, harga, jumlah, subtotal) SELECT nomor_transaksi, nama_pembeli, nama_produk, tanggal, harga, jumlah, subtotal FROM pesanan");
    $hapusdata = mysqli_query($conn, "TRUNCATE TABLE pesanan");
    if($pindahdata&&$hapusdata){
      header('location:./katalog.php');
    }else {
      echo 'Gagal';
      header('location:./katalog.php');
    }
  }else {
    echo 'Gagal';
    header('location:./katalog.php');
  }
}


// Hapus Riwayat Transaksi
if(isset($_POST['hapus_transaksi'])){
  $id_transaksi = $_POST['id_transaksi'];
  
  $hapus = mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
  if($hapus){
    header('location:./riwayat-transaksi.php');
  }else {
    echo 'Gagal';
    header('location:./riwayat-transaksi.php');
  }
}

// Input Data Pengeluaran
if(isset($_POST['input_pengeluaran'])){
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $subtotal = $harga * $jumlah;
  
  $tambah = mysqli_query($conn,"INSERT INTO pengeluaran (deskripsi, tanggal, harga, jumlah, subtotal) VALUES('$deskripsi', '$tanggal', '$harga', '$jumlah', '$subtotal')");
  if($tambah){
    header('location:./pengeluaran.php');
  }else {
    echo 'Gagal';
    header('location:./pengeluaran.php');
  }
}


// Ubah Data Pengeluaran
if(isset($_POST['ubah_pengeluaran'])){
  $id_pengeluaran = $_POST['id_pengeluaran'];
  $deskripsi = $_POST['deskripsi'];
  $tanggal = $_POST['tanggal'];
  $harga = $_POST['harga'];
  $jumlah = $_POST['jumlah'];
  $subtotal = $harga * $jumlah;

  $update= mysqli_query($conn, "UPDATE pengeluaran SET deskripsi='$deskripsi', tanggal='$tanggal', harga='$harga', jumlah='$jumlah', subtotal='$subtotal' WHERE id_pengeluaran='$id_pengeluaran'");
    if($update){
      header('location:./pengeluaran.php');
    }else {
      echo 'Gagal';
      header('location:./pengeluaran.php');
    }
}

// Hapus Data Pengeluaran
if(isset($_POST['hapus_pengeluaran'])){
  $id_pengeluaran = $_POST['id_pengeluaran'];
  
  $hapus = mysqli_query($conn, "DELETE FROM pengeluaran WHERE id_pengeluaran = '$id_pengeluaran'");
  if($hapus){
    header('location:./pengeluaran.php');
  }else {
    echo 'Gagal';
    header('location:./pengeluaran.php');
  }
}