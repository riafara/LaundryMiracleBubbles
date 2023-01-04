<?php
require ('koneksi.php');
$id = $_GET['kode_paket'];
mysqli_query($koneksi, "DELETE FROM tb_paket WHERE kode_paket ='$id'")or die(mysqli_errno($koneksi));

header("location:tpaket.php");
?>