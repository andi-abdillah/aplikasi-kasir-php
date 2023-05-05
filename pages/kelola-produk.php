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
  <title>
    Material Dashboard 2 by Creative Tim
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
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Cashier App</span>
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
          <a class="nav-link text-white active bg-gradient-primary" href="./kelola-produk.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Kelola Produk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./katalog.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Katalog</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="./riwayat-transaksi.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Riwayat Transaksi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/profile.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
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
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
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
                <span class="d-sm-inline d-none"><?=$pengguna;?></span>
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
      <!-- Button trigger modal -->
      <div class="d-flex justify-content-between">
        <button class="btn bg-gradient-warning" data-bs-toggle="modal" data-bs-target="#inputJenisMenu">
          + Tambah Jenis Menu
        </button>
        <button class="btn bg-gradient-success mx-3" data-bs-toggle="modal" data-bs-target="#inputMenu">
          + Tambah Menu
        </button>
      </div>

      <?php
        $dataJenisMenu= mysqli_query($conn, "SELECT * FROM jenis_menu");
        while($data=mysqli_fetch_array($dataJenisMenu)){
          $id_menu = $data['id_menu'];
          $jenis_menu = $data['jenis_menu'];

      ?>
          <div class="card mt-4 mb-5">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Menu : <?=$jenis_menu;?></h6>
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
                        Nama Produk</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Harga</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Tanggal</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Gambar</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $dataMenu = mysqli_query($conn, "SELECT * FROM menu WHERE jenis_menu = '$jenis_menu' ");
                      $i = 1;
                      while($data=mysqli_fetch_array($dataMenu)){
                        $id_produk = $data['id_produk'];
                        $jenis_menu = $data['jenis_menu']; 
                        $nama_produk = $data['nama_produk']; 
                        $harga = $data['harga']; 
                        $tgl_input = $data['tgl_input']; 
                        $gambar = $data['gambar']; 
                    ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?=$i++;?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$nama_produk;?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">Rp. <?=number_format($harga,0,",",".");?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$tgl_input;?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">
                          <img src="../assets/pictures/<?=$gambar;?>" alt="Gambar Belum Dimasukkan" width="100px" height="100px">
                        </span>
                      </td>
                      <td class="text-end">
                        <button class="btn bg-gradient-info" data-bs-toggle="modal" data-bs-target="#ubah<?=$id_produk;?>">
                          Edit
                        </button>
                        <button class="btn bg-gradient-danger mx-2" data-bs-toggle="modal" data-bs-target="#hapus<?=$id_produk;?>">
                          Hapus
                        </button>
                      </td>
                    </tr>

                    <!-- Modal Ubah Menu -->
                    <div class="modal fade" id="ubah<?=$id_produk;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Menu</h5>
                            </div>
                            <div class="modal-body">
                              <input type="hidden" class="form-control" value="<?=$id_produk;?>" name="id_produk">
                              <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" value="<?=$nama_produk;?>" name="nama_produk" required>
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                <input type="number" class="form-control" value="<?=$harga;?>" name="harga" required>
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                <input type="date" class="form-control" value="<?=$tgl_input;?>" name="tanggal" required>
                              </div>
                              <div class="input-group input-group-outline my-3">
                                <label class="form-label"></label>
                                <input type="file" class="form-control" name="file_baru">
                              </div>
                              <div class="input-group input-group-outline my-3">
                                Gambar Saat Ini&nbsp;&nbsp; : &nbsp;<img class="rounded" src="../assets/pictures/<?=$gambar;?>" alt="Gambar Belum Dimasukkan" width="100px" height="100px">
                              </div>
                              <input type="hidden" class="form-control" value="<?=$gambar;?>" name="file">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn bg-gradient-success" name="ubahMenu">Ubah</button>
                              <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- Modal Hapus Menu-->
                    <div class="modal fade" id="hapus<?=$id_produk;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Yakin Ingin Menghapus Data Ini?</h5>
                              <input type="hidden" class="form-control" value="<?=$id_produk;?>" name="id_produk">
                              <input type="hidden" class="form-control" value="<?=$gambar;?>"  name="file">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn bg-gradient-success" name="hapusMenu">Iya</button>
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
                </table>
              </div>
            </div>
          </div>
      <?php
        };
      ?>

      <!-- Modal Input Menu Baru -->
      <div class="modal fade" id="inputMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <form role="form" class="text-start" action="" method="post" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambahkan Menu Baru</h5>
              </div>
              <div class="modal-body">
                <span>Pilih Jenis Menu :</span>
                <div class="input-group input-group-outline my-3">
                  <select name="jenisMenu" class="form-control">
                    <?php
                      $ambildata = mysqli_query($conn, "SELECT * FROM jenis_menu");
                        while($fetcharray = mysqli_fetch_array($ambildata)){
                          $jenis_menu = $fetcharray['jenis_menu'];
                    ?>
                    <option value="<?=$jenis_menu;?>"><?=$jenis_menu;?></option>

                    <?php
                        }

                    ?>
                  </select>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Nama Produk</label>
                  <input type="text" class="form-control" name="namaProduk" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label">Harga</label>
                  <input type="number" class="form-control" name="harga" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label"></label>
                  <input type="date" class="form-control" name="tanggal" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label class="form-label"></label>
                  <input type="file" class="form-control" name="file" required>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn bg-gradient-success" name="inputMenu">Tambahkan</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
              </div>
            </div>
          </form>
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
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

  <!-- Modal Input Jenis Menu -->
  <div class="modal fade" id="inputJenisMenu" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form role="form" class="text-start" method="post">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Masukkan Jenis Menu Baru</h5>
          </div>
          <div class="modal-body">
            <div class="input-group input-group-outline my-3">
              <label class="form-label">Contoh : Makanan Tradisional</label>
              <input type="text" class="form-control" name="jenisMenu" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn bg-gradient-success" name="inputJenisMenu">Tambahkan</button>
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Sign Out Modal-->
  <div class="modal fade" id="signOutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Yakin Ingin Keluar?</h5>
        </div>
        <div class="modal-footer">
          <a class="btn btn-primary" href="../sign-out.php">Iya</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
        </div>
      </div>
    </div>
  </div>
</html>