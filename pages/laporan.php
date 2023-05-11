<?php
require './function.php';
require './cek-login.php';

$pengguna = $_SESSION['user'];
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
    Laporan Keuangan - OMAH JAWA
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
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 d-flex" href="./beranda.php">
        <span class="material-symbols-rounded text-light">store</span>
        <h6 class="my-auto mx-2 font-weight-bold text-white">OMAH JAWA</h6>
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
          <a class="nav-link text-white " href="./katalog.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">event_note</i>
            </div>
            <span class="nav-link-text ms-1">Katalog</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Cash Flow</h6>
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
               <i class="material-icons opacity-10">list_alt</i>
            </div>
            <span class="nav-link-text ms-1">Data Pengeluaran</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="./laporan.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Laporan Keuangan</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Laporan Keuangan</h6>
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
      <?php
        $daftar_bulan = mysqli_query($conn, "SELECT DISTINCT DATE_FORMAT(tanggal, '%Y-%m') AS tahun_bulan
        FROM (
          SELECT tanggal FROM transaksi
          UNION ALL
          SELECT tanggal FROM pengeluaran
        ) AS tabel_gabungan
        ORDER BY tanggal DESC
        ");
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d");
        $bulan_dipilih = "";
        $bulan_terbesar = "";
        if(mysqli_num_rows($daftar_bulan) > 0){
          $data = mysqli_fetch_array($daftar_bulan);
          $bulan_dipilih = $data[0];
          $bulan_terbesar = $data[0];
        }
        if(isset($_POST['pilih_bulan'])){
          $bulan_dipilih = $_POST['bulan'];
        }
      ?>
      <form role="form" class="d-flex justify-content-end" action="" method="post" enctype="multipart/form-data">
        <div class="">
          <select class="btn btn-outline-primary" name="bulan">
            <option value="<?=$bulan_dipilih;?>" selected><?=date("M Y", strtotime($bulan_dipilih));?></option>
            <?php
            if($bulan_dipilih != $bulan_terbesar) {
            ?>
              <option value="<?=$bulan_terbesar;?>"><?=date("M Y", strtotime($bulan_terbesar));?></option>
            <?php
            }
            ?>
            <?php
            while($row = mysqli_fetch_array($daftar_bulan)){
              $bulan = $row['tahun_bulan'];
              if($bulan != $bulan_dipilih){
            ?>
              <option value="<?=$bulan;?>"><?=date("M Y", strtotime($bulan));?></option>
            <?php
              }
            }
            ?>
          </select>
        </div>
        <div class="mx-3">
          <button type="submit" class="btn bg-gradient-primary" name="pilih_bulan">
            Cari</button>
        </div>
      </form>
      <div style="position: fixed; bottom: 0; right: 0; margin-right: 30px; margin-bottom: 10px; z-index: 9998;">
        <form id="myForm" action="cetak-laporan.php" method="get" target="_blank">
          <input type="hidden" value="<?=$bulan_dipilih?>" name="cetak_laporan">
        </form>
        <a href="#" onclick="document.getElementById('myForm').submit(); return false;" 
        class="btn bg-gradient-info w-100 mb-3 d-flex align-items-center justify-content-center">
          <span class="material-symbols-rounded me-1">picture_as_pdf</span>PDF
        </a>
      </div>
      <div class="card mt-4 mb-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="row bg-gradient-dark shadow-info border-radius-lg pt-4 pb-3">
            <h6 class="col text-white text-capitalize ps-3">Laporan Keuangan</h6>
            <h6 class="col text-end text-white text-capitalize ps-3">Bulan : <?php echo $bulan_dipilih ? date("M Y", strtotime($bulan_dipilih)) : '';?></h6>
          </div>
        </div>
        <div class="card-body px-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>	
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    No.</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tanggal</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Pendapatan</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Pengeluaran</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Laba</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                // mendapatkan daftar tanggal unik dalam format tahun-bulan, hanya untuk bulan tertentu
                $daftar_tanggal = mysqli_query($conn, "SELECT DISTINCT tanggal
                AS tanggal FROM transaksi WHERE tanggal LIKE '$bulan_dipilih-%'
                UNION SELECT DISTINCT tanggal AS tanggal FROM pengeluaran
                WHERE tanggal LIKE '$bulan_dipilih-%' ORDER BY tanggal ASC");
                $total_laba = 0;
                // menghitung total pendapatan, pengeluaran, dan laba per hari
                while($row = mysqli_fetch_array($daftar_tanggal)){
                  $tanggal = $row['tanggal'];
                  $total_pendapatan = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM transaksi WHERE tanggal= '$tanggal'");
                  $total_pengeluaran = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM pengeluaran WHERE tanggal = '$tanggal'");
                  $pendapatan = mysqli_fetch_array($total_pendapatan)['total'];
                  $pengeluaran = mysqli_fetch_array($total_pengeluaran)['total'];
                  $laba = $pendapatan - $pengeluaran;
                  $total_laba += $laba;
                  ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?=$i++;?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?=date("j M Y", strtotime($tanggal))?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($pendapatan,0,",",".");?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($pengeluaran,0,",",".");?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($laba,0,",",".");?></span>
                      </td>
                    </tr>
                  <?php
                  }
                  ?>
              </tbody>
              <tfoot>
                <tr>
                  <td class="align-middle text-center" colspan="4">
                    <span class="text-secondary text-xs font-weight-bold">Laba Bersih</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($total_laba,0,",",".");?></span>
                  </td>
                </tr>
              </tfoot>
            </table>
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
    window.onload = function() {
      var form = document.getElementById('myForm');
      form.target = '_blank'; // membuka halaman proses.php di tab baru
    };
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