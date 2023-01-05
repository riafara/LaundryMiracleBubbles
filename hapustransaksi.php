<?php
require ('koneksi.php');
$id = $_GET['kode_transaksi'];
mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE kode_transaksi ='$id'")or die(mysqli_errno($koneksi));

header("location:ttransaksi.php");
?>