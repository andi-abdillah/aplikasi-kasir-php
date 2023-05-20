<?php
require './function.php';
require './cek-login.php';

$pengguna = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <style>
    .kwitansi {
      margin: 30px auto;
      max-width: 600px;
      border: 2px solid #999;
      padding: 30px;
    }

    .kwitansi .header {
      text-align: center;
    }

    .kwitansi .header h2 {
      margin-bottom: 20px;
    }

    .kwitansi .logo {
      text-align: center;
      margin-bottom: 30px;
    }

    .kwitansi .logo img {
      max-width: 150px;
    }

    .kwitansi .body {
      margin-bottom: 30px;
    }

    .kwitansi .body .row {
      margin-bottom: 10px;
    }

    .kwitansi .body .row .col:first-child {
      font-weight: bold;
    }

    .kwitansi .footer {
      text-align: center;
    }

    .kwitansi .footer h3 {
      margin-top: 30px;
    }
  </style>
</head>

<body>
  <?php
  date_default_timezone_set('Asia/Jakarta');
  $tanggal = date("d-m-Y");
  $jam = date("H:i");
  $dataPesanan = mysqli_query($conn, "SELECT * FROM pesanan");
  if (isset($_GET['kwitansi'])) {
    $kwitansi = $_GET['kwitansi'];
  }
  ?>
  <div class="container">
    <div class="kwitansi d-flex flex-column">
      <div class="header text-center">
        <div>
          <h4>WARUNG OMAH JAWA</h4>
          <p>Baron - Nganjuk - Jawa Timur</p>
          <div class="my-4" style="border-top: 2px dashed #999;"></div>
        </div>
        <div class="row">
          <div class="col text-start col-6">
            <p>Nota : <?= $kwitansi ?></p>
            <p class="text-capitalize">Kasir : <?= $pengguna ?></p>
          </div>
          <div class="col">
          </div>
          <div class="col text-start col-4">
            <p>Tgl : <?= $tanggal ?></p>
            <p>Jam : <?= $jam ?></p>
          </div>
        </div>
      </div>
      <div class="my-2" style="border-top: 2px dashed #999;"></div>
      <div class="body">
        <table class="w-100" style="font-size: 15px;">
          <tbody>
            <?php
            $result = mysqli_query($conn, 'SELECT SUM(subtotal) AS total FROM pesanan');
            $row = mysqli_fetch_assoc($result);
            $total = $row['total'];
            while ($data = mysqli_fetch_array($dataPesanan)) {
              $nama_produk = $data['nama_produk'];
              $harga = $data['harga'];
              $jumlah = $data['jumlah'];
              $subtotal = $data['subtotal'];
            ?>
              <tr>
                <td class="text-start pe-2"><?= $nama_produk ?></td>
                <td class="text-center w-auto"><?= $jumlah ?></td>
                <td class="text-end w-25">Rp <?= number_format($harga, 0, ",", "."); ?></td>
                <td class="text-end w-25">Rp <?= number_format($subtotal, 0, ",", "."); ?></td>
              </tr>
            <?php
            }
            ?>
</body>
<tfoot style="border-top: 2px dashed #999;">
  <tr>
    <td class="text-end w-auto fw-bolder" colspan="3">Total</td>
    <td class="text-end w-25 fw-bolder">Rp <?= number_format($total, 0, ",", "."); ?></td>
  </tr>
</tfoot>
</table>
</div>
<div class="my-2" style="border-top: 2px dashed #999;"></div>
<div class="footer align-self-center">
  <h5>Terima Kasih Atas Kunjungan Anda</h5>
</div>
</div>
</div>

<script>
  window.print();
</script>
</body>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"