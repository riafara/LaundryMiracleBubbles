<?php
require ('koneksi.php');
$id = $_GET['id_transaksi'];
mysqli_query($koneksi, "DELETE FROM tb_transaksi WHERE id_transaksi ='$id'")or die(mysqli_errno($koneksi));

header("location:ttransaksi.php");
?>