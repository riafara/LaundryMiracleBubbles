<?php
require('koneksi.php');
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tb_user WHERE id='$id'") or die(mysql_error());
header("location: tables.php")
?>