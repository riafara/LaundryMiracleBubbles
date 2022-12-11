<?php
require('koneksi.php');
$id = $_GET['id_detail_transaksi'];
mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE id_detail_transaksi='$id'") or die(mysql_error());
header("location: dtransaksi.php")
?>