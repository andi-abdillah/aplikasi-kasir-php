<?php 
  require './function.php';
  require './cek-login.php';
  if(isset($_GET['cetak_laporan'])) {
    $bulan_dipilih = $_GET['cetak_laporan'];
    $ubah_format = date("F Y", strtotime($bulan_dipilih));
    $tanggal_indonesia = str_replace(
      array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
      array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'),
      $ubah_format
  );
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>::Cetak Data Transaksi Headset::</title>
</head>
<style type="text/css">
  p{
    margin-top: -10px;
  }
  hr{
    margin-top: 35px;
  }
</style>
<body>
	<center>
		<h1>WARUNG OMAH JAWA</h1>
    <p>Baron - Nganjuk - Jawa Timur</p>
	</center>
    <hr width="90%" size="3px" color="black">
    <h2>Laporan Keuangan Bulan <?=$tanggal_indonesia;?></h2>
  <table border="1" style="width: 100%">
    <thead>
      <tr>
        <th>NO</th>
        <th>Tanggal</th>
        <th>Pendapatan</th>
        <th>Pengeluaran</th>
        <th>Laba</th>
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
        <td align=center><?=$i++;?></td>
        <td align=center><?=$tanggal;?></td>
        <td align=center>Rp <?=number_format($pendapatan,0,",",".");?></td>
        <td align=center>Rp <?=number_format($pengeluaran,0,",",".");?></td>
        <td align=center>Rp <?=number_format($laba,0,",",".");?></td>
      </tr>

      <?php
        }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="4" align=center>Laba Bersih</td>
        <td align=center>Rp <?=number_format($total_laba,0,",",".");?></td>
      </tr>
    </tfoot>
  </table>
	<script>
		window.print();
	</script>
</body>
</html>
