<?php
require './function.php';
require './cek-login.php';

$pengguna = $_SESSION['user'];
$kwitansi = "";
$result = mysqli_query($conn, "SELECT nomor_transaksi FROM pesanan LIMIT 1");
if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_array($result);
  $kwitansi = strval($row[0]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">

  <!-- Icons Google -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <title>
    Katalog - KASIRKU
  </title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <style type="text/css">
    .menu{
      transition: transform 0.3s ease;
    }
    .menu:hover{
        box-shadow: 4px 4px 4px rgba(0, 0, 0, 0.04);
        transform: scale(1.03);
    }
    .icon-lg {
      width: 100px;
      height: 90px;
    }
  </style>

</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 d-flex" href="./beranda.php">
        <span class="material-symbols-rounded text-light">dvr</span>
        <h6 class="my-auto mx-2 font-weight-bold text-white">KASIRKU</h6>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white " href="./beranda.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Beranda</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./kelola-produk.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Kelola Produk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="./katalog.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">list_alt</i>
            </div>
            <span class="nav-link-text ms-1">Katalog</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Other Pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./riwayat-transaksi.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
               <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Riwayat Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./pengeluaran.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
               <i class="material-icons opacity-10">event_note</i>
            </div>
            <span class="nav-link-text ms-1">Data Pengeluaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./laporan.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
               <i class="material-icons opacity-10">menu_book</i>
            </div>
            <span class="nav-link-text ms-1">laporan Keuangan</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <button class="btn bg-gradient-primary w-100" data-bs-toggle="modal" data-bs-target="#signOutModal">Sign Out</button>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Katalog</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Katalog</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <span class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none text-capitalize"><?=$pengguna;?></span>
              </span>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <?php
          $colors = ['primary', 'success', 'info', 'warning', 'danger'];
          $icons = ['fastfood', 'restaurant_menu', 'restaurant', 'ramen_dining', 'brunch_dining'];
          $dataJenisMenu = mysqli_query($conn, "SELECT * FROM jenis_menu");
          while($data=mysqli_fetch_array($dataJenisMenu)){
            $jenis_menu = $data['jenis_menu'];
            $removedColor = array_shift($colors);
            array_push($colors, $removedColor);
            $removedIcon = array_shift($icons);
            array_push($icons, $removedIcon);
        ?>
          <form class="col-xl-3 col-sm-6 col-6 mb-xl-0 d-flex align-items-stretch" method="post">
            <input type="hidden" value="<?=$jenis_menu;?>" name="jenis_menu">
            <button class="btn btn-outline-<?=$removedColor;?> d-flex justify-content-center align-items-center w-100"
            name="pilih_jenis_menu">
              <i class="material-symbols-rounded"><?=$removedIcon;?></i>&nbsp;
              <?=$jenis_menu;?>
            </button>
          </form>
        <?php
          };
        ?>
      </div>
      <div class="row">
        <h2 class="text-center my-4"><?=$pilihan_jenis_menu;?></h2>
        <?php
          $dataMenu = mysqli_query($conn, "SELECT * FROM menu WHERE jenis_menu='$pilihan_jenis_menu'");
          $i = 1;
          if(mysqli_num_rows($dataMenu) != 0) {
            while($data=mysqli_fetch_array($dataMenu)){
              $id_produk = $data['id_produk'];
              $jenis_menu = $data['jenis_menu'];
              $nama_produk = $data['nama_produk'];
              $harga = $data['harga'];
              $gambar = $data['gambar'];
        ?>
        <div class="col-lg-3 col-md-4 col-6 my-4 py-0 d-flex align-items-stretch">
          <div class="card card-blog card-plain mb-4">
            <div class="card-header p-0 mt-n4 mx-3">
              <a class="d-block shadow-xl border-radius-xl">
                <img src="../assets/img/products/<?=$gambar?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
              </a>
            </div>
            <div class="card-body p-3 position-relative">
              <a href="javascript:;">
                <h5>
                  Rp <?=number_format($harga,0,",",".");?>
                </h5>
              </a>
              <p class="mb-4 text-sm pb-2">
                <?=$nama_produk?>
              </p>
              <div class="d-flex align-items-center justify-content-between" style="position: absolute; bottom: 0; right: 0;" data-bs-toggle="modal" data-bs-target="#pesan_menu<?=$id_produk;?>">
                <button class="btn btn-outline-primary btn-sm mb-0 mx-3 d-flex align-items-center">
                  <i class="material-symbols-rounded"  style="font-size: 20px;">add</i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Pesan Menu -->
        <div class="modal fade" id="pesan_menu<?=$id_produk;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Pesanan</h5>
                </div>
                <div class="modal-body">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="<?=$nama_produk;?>" disabled>
                    <input type="hidden" value="<?=$nama_produk;?>" name="nama_produk">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" value="Rp <?=number_format($harga,0,",",".");?>" disabled>
                    <input type="hidden" value="<?=$harga;?>" id="nilai1<?=$id_produk;?>" oninput="hitungPerkalian(<?=$id_produk;?>)" name="harga">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="nilai2<?=$id_produk;?>" oninput="hitungPerkalian(<?=$id_produk;?>)" name="jumlah" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" id="hasil<?=$id_produk;?>" oninput="hitungPerkalian(<?=$id_produk;?>)" readonly>
                  </div>
                    <input type="hidden" value="<?=$gambar;?>" name="gambar">
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn bg-gradient-success" name="input_pesanan">Pesan</button>
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php
          }}else {
        ?>
        <div class="text-center">
          <h3>Data Tidak Ditemukan!</h3>
          <a href="./kelola-produk.php" class="btn bg-gradient-info w-50 my-2">Tambahkan Data</a>
        </div>
        <?php
          }
        ?>
      </div>
      <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
          <i class="material-symbols-rounded py-2 text-primary">shopping_cart</i>
        </a>
        <div class="card shadow-lg pt-3" style="border-radius: 35px;">
          <div class="card-header pb-0 pt-3">
            <div class="float-end mt-4">
              <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                <i class="material-icons">clear</i>
              </button>
            </div>
            <div class="pt-3">
              <h5 class="py-2">Daftar Pesanan</h5>
            </div>
            <!-- End Toggle Button -->
          </div>
          <hr class="horizontal dark my-1">
          <div class="card-body pt-sm-3 pt-0">
            <?php
              $result = mysqli_query($conn, 'SELECT SUM(subtotal) AS total FROM pesanan'); 
              $row = mysqli_fetch_assoc($result); 
              $total = $row['total'];
              $dataPesanan = mysqli_query($conn, "SELECT * FROM pesanan");
              while($data=mysqli_fetch_array($dataPesanan)){
                $id_pesanan = $data['id_pesanan'];
                $nama_pembeli = $data['nama_pembeli']; 
                $nama_produk = $data['nama_produk']; 
                $harga = $data['harga']; 
                $jumlah = $data['jumlah']; 
                $subtotal = $data['subtotal'];
                $gambar = $data['gambar'];
                $nama_produk_baru = batasi_teks($nama_produk, 10);
            ?>
            <div class="d-flex align-items-center justify-content-between border border-secondary rounded-pill mb-2 px-3 py-2">
              <div class="d-flex align-items-center">
                <div>
                  <form method="post">
                    <input type="hidden" value="<?=$id_pesanan;?>" name="id_pesanan">
                    <button class="btn bg-gradient-danger my-0 px-2 py-0" name="hapus_pesanan">
                      x
                    </button>
                  </form>
                </div>
                <div class="mx-2">
                  <img class="bg-gradient-primary shadow-dark rounded-circle" src="../assets/img/products/<?=$gambar;?>" alt="Gambar Belum Dimasukkan" height="30px" width="30px">
                </div>
                <div class="mx-1">
                  <span class="text-secondary text-xs font-weight-bold"><?=$jumlah;?></span>
                </div>
                <div class="mx-1">
                  <span class="text-secondary text-xs font-weight-bold">x</span>
                </div>
                <div class="mx-1">
                  <span class="text-secondary text-xs font-weight-bold py-2"><?=$nama_produk_baru;?></span>
                </div>
              </div>
              <div>
                <span class="text-warning text-xs font-weight-bold"><?=format_angka($harga);?></span>
              </div>
            </div>
            <?php
              };
            ?>
          </div>
          <div class="card-footer pt-sm-3">
            <?php
              if ($kwitansi) {
            ?>
              <div class="text-start pt-2">
                <p class="fw-bolder mb-0">Total : Rp <?=number_format($total,0,",",".");?></p>
              </div>
              <form role="form" action="" method="post" enctype="multipart/form-data">
                <div class="input-group input-group-outline my-3">
                <input type="hidden" value="<?=$kwitansi?>" name="kwitansi">
                  <label class="form-label">Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama_pembeli" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label"></label>
                    <input type="date" class="form-control" name="tanggal" required>
                </div>
                <button class="btn btn-outline-primary w-100 mb-3" name="konfirmasi_pesanan">Selesai</button>
              </form>
              <form id="myForm" action="invoice.php" method="get" target="_blank">
                <input type="hidden" value="<?=$kwitansi?>" name="kwitansi">
              </form>
              <a href="#" onclick="document.getElementById('myForm').submit(); return false;"
              class="btn btn-outline-info w-100 mb-3 d-flex align-items-center justify-content-center">
                <span class="material-symbols-rounded me-1">picture_as_pdf</span>Invoice
              </a>
            <?php
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    function formatRupiah(angka) {
      // Menggunakan built-in function toLocaleString() pada angka dengan bahasa Indonesia dan menghilangkan angka di belakang koma
      return angka.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }
    function hitungPerkalian(id) {
      let nilai1 = document.getElementById("nilai1"+id).value;
      let nilai2 = document.getElementById("nilai2"+id).value;
      if(nilai1&&nilai2) {
        let hasil = nilai1 * nilai2;
        document.getElementById("hasil"+id).value = formatRupiah(hasil);
        return;
      }
      document.getElementById("hasil"+id).value = formatRupiah(nilai1);
    }
    window.onload = function() {
      var form = document.getElementById('myForm');
      form.target = '_blank'; // membuka halaman proses.php di tab baru
    };
</script>
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

  <!-- Sign Out Modal-->
  <div class="modal fade" id="signOutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Yakin Ingin Keluar?</h5>
        </div>
        <div class="modal-footer">
          <a class="btn bg-gradient-primary" href="../sign-out.php">Iya</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</html>