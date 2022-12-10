<?php
require ('koneksi.php');
$id = $_GET['id_paket'];
mysqli_query($koneksi, "DELETE FROM tb_paket WHERE id_paket ='$id'")or die(mysqli_errno($koneksi));

header("location:paket.php");
?>