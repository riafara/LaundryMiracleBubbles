<?php
require('koneksi.php');
$id = $_GET['id_detail'];
mysqli_query($koneksi, "DELETE FROM tb_detail_transaksi WHERE id_detail='$id'") or die(mysql_error());
header("location: detailtransaksi.php")
?>