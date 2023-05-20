<?php
require './pages/function.php';

// cek login, terdaftar atau tidak
// if (isset($_POST['login'])) {
//   $user = $_POST['user'];
//   $password = $_POST['password'];
//   $_SESSION['user'] = $_POST['user'];
//   //mencocokkan dengan data
//   $cekdatabase = mysqli_query($conn, "SELECT * FROM user where username = '$user' and sandi = '$password' ");
//   //hitung jumlah data
//   $hitung = mysqli_num_rows($cekdatabase);

//   if ($hitung > 0) {
//     $_SESSION['log'] = 'True';
//     header('location:./pages/beranda.php');
//   } else {
//     echo "<script>alert('Username atau Password yang anda masukkan salah!')</script>";
//   };
// };


// Login dengan Password terenksripsi
if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $password = $_POST['password'];

  //mencocokkan dengan data
  $cekdatabase = mysqli_query($conn, "SELECT * FROM user where username = '$user'");

  //hitung jumlah data username
  if (mysqli_num_rows($cekdatabase) === 1) {

    $row = mysqli_fetch_assoc($cekdatabase);
    if (password_verify($password, $row["sandi"])) {
      $_SESSION['log'] = 'True';
      $_SESSION['user'] = $_POST['user'];
      header('location:./pages/beranda.php');
      exit;
    } else {
      echo "<script>alert('Username atau Password yang anda masukkan salah!')</script>";
    };
  } else {
    echo "<script>alert('Username atau Password yang anda masukkan salah!')</script>";
  };
};


if (!isset($_SESSION['log'])) {
} else {
  header('location:./pages/beranda.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <title>
    Sign-in - OMAH JAWA
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start" method="post">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="user" required>
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                  <div class="text-center">
                    <button class="btn bg-gradient-primary w-100 my-4 mb-2" name="login">Sign in</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="./sign-up.php" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="./assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>