<?php
require ("koneksi.php");
header('Content-Type: application/json');

$sqlQuery = "SELECT * FROM tb_transaksi ORDER BY status";

$result = mysqli_query($koneksi, $sqlQuery);

$dataa = array();
foreach ($result as $row){
    $dataa[] = $row;
}

mysqli_close($koneksi);

echo json_encode($dataa);
?>