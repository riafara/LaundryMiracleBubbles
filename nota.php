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
$cust = $_GET['kode_customer'];
$query = "SELECT * FROM tb_transaksi WHERE kode_transaksi='$id'";
$query1 = "SELECT * FROM tb_customer WHERE kode_customer='$cust'";
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
	$id   = $row['kode_customer'];
    $nama = $row['nama_customer'];
    $alamat= $row['alamat'];
    $hp   = $row['nohp'];

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
		<center><h3><em>NOTA LAUNDRY</em></h3></center>
	</div>
	<div class="inputan">
		<div class="container">
			
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<table width="329">
				  <tr>
				    <td width="108" height="50"><B>Nama</B></td>
				    <td width="194">: <input style="border:none" type="text"  name="namacustomer" value="<?php echo $nama; ?>" readonly></td>
				  </tr>
				  <tr>
				    <td height="50"><B>Alamat</B></td>
				    <td>: <input style="border:none" type="text" name="alamat" value="<?php echo $row ['3']; ?>" readonly></td><br>
				  </tr>
				  <tr>
				    <td height="50"><B>Telp.</B></td>
				    <td>: <input style="border:none" type="text"  name="tlpn" value="<?php echo $row ['4']; ?>" readonly></td>
				  </tr>
				</table>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<table width="329">
				  <tr>
				    <td width="108" height="50"><B>NOTA</B></td>
				    <td width="194">: <input style="border:none" type="text"  name="no" value="<?php echo $row ['0']; ?>" readonly></td>
				  </tr>
				  <tr>
				    <td height="50"><B>Tgl. Diterima</B></td>
				    <td>: <input style="border:none" type="date" name="tglditerima" value="<?php echo $row ['7']; ?>" readonly></td><br>
				  </tr>
				  
				</table>
			</div>
		</div>
	</div>
 
		<h2>NOTA LAUNDRY</h2>
		<h4>Nama  : <?php echo $nama; ?></h4>
		<br>
		<h4>Tanggal Masuk  : <?php echo $tgl; ?></h4>
		<h4>Tanggal Keluar  : <?php echo $ambil; ?></h4>
 
	
 
	<h4>Perhatian<h4>

	<ol style:"align: justify">
	<li>Pengambilan ORDER WAJIB DISERTAI NOTA TRANSAKSI.</li>
	<li>Harap periksa & dihitung kembali jumlah serta kondisi order bersama PETUGAS KAMI,<br>
		karena KOMPLAIN DAN GARANSI dalam bentuk apapun setelah penerimaan Order<br> akan KAMI ABAIKAN</li>
	<li>Periksa saku sebelum masuk cucian, kehilangan BUKAN TANGGUNG JAWAB KAMI.</li>
	<li>Kondisi Order jika tidak diambil MAKSIMAL 2x24 JAM diluar TANGGUNG JAWAB KAMI.</li>
	<li>Order Awal yang rusak, mudah luntur & menyusut tanpa pemberitahuan <br> diluar TANGGUNG JAWAB KAMI.</li>
	<li>Konsumen dianggap setuju dengan isi aturan diatas</li>
	</ol> 

	<center>---- Terima Kasih atas kepercayaan Anda ---</center>
	<?php 
	include 'koneksi.php';
	?>
 

 
	<script>
		window.print();
	</script>
 
</body>
</html>
<?php } ?>