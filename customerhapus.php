<?php
require ('koneksi.php');
$id = $_GET['kode_customer'];
mysqli_query($koneksi, "DELETE FROM tb_customer WHERE kode_customer ='$id'")or die(mysqli_errno($koneksi));

header("location:tcustomer.php");
?>