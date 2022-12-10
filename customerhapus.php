<?php
require ('koneksi.php');
$id = $_GET['id_customer'];
mysqli_query($koneksi, "DELETE FROM tb_customer WHERE id_customer ='$id'")or die(mysqli_errno($koneksi));

header("location:customer.php");
?>