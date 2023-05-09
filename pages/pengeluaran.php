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
    Data Pengeluaran - KASIRKU
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
          <a class="nav-link text-white " href="./katalog.php">
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
          <a class="nav-link text-white active bg-gradient-primary" href="./pengeluaran.php">
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Data Pengeluaran</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Data Pengeluaran</h6>
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
      <div style="position: fixed; bottom: 0; right: 0; margin-right: 30px; margin-bottom: 10px; z-index: 9998;">
        <button class="btn bg-gradient-success d-flex align-items-center justify-content-center px-3 py-2" data-bs-toggle="modal" data-bs-target="#input_pengeluaran">
          <span class="material-symbols-rounded">playlist_add</span>
        </button>
        <!-- Modal Input Pengeluaran -->
        <div class="modal fade" id="input_pengeluaran" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form role="form" class="text-start" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Masukkan Data Pengeluaran</h5>
                </div>
                <div class="modal-body">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" name="deskripsi" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="date" class="form-control" name="tanggal" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Harga</label>
                    <input type="number" class="form-control" id="nilai1Input" oninput="hitungPerkalian('Input')" name="harga" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="nilai2Input" oninput="hitungPerkalian('Input')" name="jumlah" required>
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="text" class="form-control" id="hasilInput" readonly>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn bg-gradient-success" name="input_pengeluaran">Tambahkan</button>
                  <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php
        $data_terbesar = mysqli_query($conn, "SELECT MAX(STR_TO_DATE(tanggal, '%Y-%m-%d')) FROM pengeluaran");
        $tanggal_dipilih = mysqli_fetch_array($data_terbesar)[0];
        if(isset($_POST['pilih_tanggal'])){
          $tanggal_dipilih = $_POST['tanggal'];
        }
      ?>
      <form role="form" class="d-flex justify-content-end" action="" method="post" enctype="multipart/form-data">
        <div class="">
          <select class="btn btn-outline-primary" name="tanggal">
          <option selected><?=$tanggal_dipilih;?></option>
            <?php
              $data_tanggal = mysqli_query($conn, "SELECT DISTINCT tanggal FROM pengeluaran ORDER BY tanggal DESC");
              while($data = mysqli_fetch_array($data_tanggal)){
                $tanggal = $data['tanggal'];
              ?>
                <option class="py-5" value="<?=$tanggal;?>"><?=$tanggal;?></option>
            <?php
              }
            ?>
          </select>
        </div>
        <div class="mx-3">
          <button type="submit" class="btn bg-gradient-primary" name="pilih_tanggal">
            Cari</button>
        </div>
      </form>
      <div class="card mt-4 mb-5">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
          <div class="row bg-gradient-success shadow-info border-radius-lg pt-4 pb-3">
            <h6 class="col text-white text-capitalize ps-3">Data Pengeluaran</h6>
            <h6 class="col text-end text-white text-capitalize ps-3">Tanggal : <?=$tanggal_dipilih;?></h6>
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
                    Deskripsi</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Tanggal</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Harga</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Jumlah</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Subtotal</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $data_pengeluaran = mysqli_query($conn, "SELECT * FROM pengeluaran WHERE tanggal='$tanggal_dipilih'");
                  $result = mysqli_query($conn, "SELECT SUM(subtotal) AS total FROM pengeluaran WHERE tanggal='$tanggal_dipilih'"); 
                  $row = mysqli_fetch_assoc($result);	
                  $total = $row['total'];
                  $i = 1;
                  while($data=mysqli_fetch_array($data_pengeluaran)){
                    $id_pengeluaran = $data['id_pengeluaran'];
                    $deskripsi = $data['deskripsi']; 
                    $deskripsi_baru = batasi_teks($deskripsi, 25);
                    $tanggal = $data['tanggal'];
                    $harga = $data['harga']; 
                    $jumlah = $data['jumlah']; 
                    $subtotal = $data['subtotal']; 
                ?>
                <tr>
                  <td class="align-middle text-center text-sm">
                    <span class="text-secondary text-xs font-weight-bold"><?=$i++;?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?=$deskripsi_baru;?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?=$tanggal;?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($harga,0,",",".");?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold"><?=$jumlah;?></span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Rp <?=number_format($subtotal,0,",",".");?></span>
                  </td>
                  <td class="text-end">
                    <button class="btn btn-link text-dark" data-bs-toggle="modal" data-bs-target="#ubah<?=$id_pengeluaran;?>">
                      <i class="material-icons text-sm me-2">edit</i>Edit
                    </button>
                    <button class="btn btn-link text-danger text-gradient" data-bs-toggle="modal" data-bs-target="#hapus<?=$id_pengeluaran;?>">
                      <i class="material-icons text-sm me-2">delete</i>Hapus
                    </button>
                  </td>
                </tr>
                <!-- Modal Ubah Menu -->
                <div class="modal fade" id="ubah<?=$id_pengeluaran;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Menu</h5>
                        </div>
                        <div class="modal-body">
                          <input type="hidden" class="form-control" value="<?=$id_pengeluaran;?>" name="id_pengeluaran">
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" value="<?=$deskripsi;?>" name="deskripsi" required>
                          </div>
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="date" class="form-control" value="<?=$tanggal;?>" name="tanggal" required>
                          </div>
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" class="form-control" value="<?=$harga;?>" id="nilai1<?=$id_pengeluaran;?>" oninput="hitungPerkalian(<?=$id_pengeluaran;?>)" name="harga" required>
                          </div>
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="number" class="form-control" value="<?=$jumlah;?>" id="nilai2<?=$id_pengeluaran;?>" oninput="hitungPerkalian(<?=$id_pengeluaran;?>)" name="jumlah" required>
                          </div>
                          <div class="input-group input-group-outline my-3">
                            <label class="form-label"></label>
                            <input type="text" class="form-control" value="Rp <?=number_format($subtotal,0,",",".");?>" id="hasil<?=$id_pengeluaran;?>" readonly>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn bg-gradient-success" name="ubah_pengeluaran">Ubah</button>
                          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- Modal Hapus Pengeluaran-->
                <div class="modal fade" id="hapus<?=$id_pengeluaran;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Yakin Ingin Menghapus Data Ini?</h5>
                          <input type="hidden" class="form-control" value="<?=$id_pengeluaran;?>" name="id_pengeluaran">
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn bg-gradient-success" name="hapus_pengeluaran">Iya</button>
                          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <?php
                  };
                ?>
              </tbody>
              <tfoot>
                <tr>
                  <td class="align-middle text-center" colspan="5">
                    <span class="text-secondary text-xs font-weight-bold">Jumlah Total</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">Rp. <?=number_format($total,0,",",".");?></span>
                  </td>
                  <td></td>
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
    function formatRupiah(angka) {
      // Menggunakan built-in function toLocaleString() pada angka dengan bahasa Indonesia dan menghilangkan angka di belakang koma
      return angka.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0, maximumFractionDigits: 0 });
    }
    function hitungPerkalian(id) {
      let nilai1 = document.getElementById("nilai1"+id).value;
      let nilai2 = document.getElementById("nilai2"+id).value;
      let hasil = nilai1 * nilai2;
      document.getElementById("hasil"+id).value = formatRupiah(hasil);
    }
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