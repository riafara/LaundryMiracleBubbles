<?php
require('koneksi.php');

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];

if( isset($_POST['update']) ){
    $tgl        = $_POST['txt_tgl'];
    $transaksi  = $_POST['txt_id'];
    $nama       = $_POST['txt_cust'];
    $paket      = $_POST['txt_paket'];
    $qty        = $_POST['txt_qty'];
    $harga      = $_POST['txt_harga'];
    $total      = $_POST['txt_t'];
    $ambil      = $_POST['txt_a'];
    $status     = $_POST['txt_s'];
    $cust       = $_POST['txt_kc'];
    $pkt        = $_POST['txt_kp'];

    $query = "UPDATE tb_transaksi SET tgl_masuk='$tgl', nama_customer='$nama', nama_paket='$paket', Qty='$qty', harga_paket='$harga', harga_total='$total', tgl_ambil='$ambil', status='$status', kode_customer='$cust', kode_paket='$pkt' WHERE kode_transaksi='$transaksi'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: ttransaksi.php');
}
$id = $_GET['kode_transaksi'];

$query = "SELECT * FROM tb_transaksi WHERE kode_transaksi='$id'";

$result = mysqli_query($koneksi, $query) or die(mysql_error());
//$nomor = 1;
while ($row = mysqli_fetch_array($result)){
    
    $tgl        = $row['tgl_masuk'];
    $id         = $row['kode_transaksi'];
    $nama       = $row['nama_customer'];
    $paket      = $row['nama_paket'];
    $qty        = $row['Qty'];
    $harga      = $row['harga_paket'];
    $total      = $row['harga_total'];
    $ambil      = $row['tgl_ambil'];
    $status     = $row['status'];
    $cust       = $row['kode_customer'];
    $pkt        = $row['kode_paket'];
	
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAUNDRY MIRACLE BUBBLES</title>

</head>
<body>
<div class="container">
	<center><h3>Nota Laundry MiracleBubbles</h3></center>
</div>
<table style= border = '0'>
<tr>
  <td>Nama</td>
  <td>:</td>
  <td><?php echo $nama; ?></td>
</tr>
<tr>
  <td>No Transaksi</td>
  <td>:</td>
  <td><?php echo $id; ?></td>
</tr>
<tr>
  <td>Tanggal Masuk</td>
  <td>:</td>
  <td><?php echo $tgl; ?></td>
</tr>
<tr>
  <td>Tanggal Keluar</td>
  <td>:</td>
  <td><?php echo $ambil; ?></td>
</tr>
</table>
<table border="1" style="width: 100%">
  <tr style="text-align:center">
    <td width='30%'>Paket</td>
    <td width='20%'>Berat</td>
    <td width='25%'>Harga</td>
	  <td width='25%'>Total</td>
  </tr>
  <tr style="text-align:center">
    <td><?php echo $paket; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php echo $harga; ?></td>
	  <td><?php echo $total; ?></td>
  </tr>
</table>
	<br>
	<h4><em>Perhatian!!!</em><h4>

	<ol text-align: justify>
		<li>Pengambilan ORDER WAJIB DISERTAI NOTA TRANSAKSI.</li>
		<li>Harap periksa & dihitung kembali jumlah serta kondisi order bersama PETUGAS KAMI, karena KOMPLAIN DAN GARANSI dalam bentuk apapun setelah penerimaan Order akan KAMI ABAIKAN</li>
		<li>Periksa saku sebelum masuk cucian, kehilangan BUKAN TANGGUNG JAWAB KAMI.</li>
		<li>Kondisi Order jika tidak diambil MAKSIMAL 2x24 JAM diluar TANGGUNG JAWAB KAMI.</li>
		<li>Order Awal yang rusak, mudah luntur & menyusut tanpa pemberitahuan diluar TANGGUNG JAWAB KAMI.</li>
		<li>Konsumen dianggap setuju dengan isi aturan diatas.</li>
	</ol> 

	<center>---- Terima Kasih Atas Kepercayaan Anda ---</center>
	<?php 
	include 'koneksi.php';
	?>
 

 
	<script>
		window.print();
	</script>
 
</body>
</html>
<?php } ?>