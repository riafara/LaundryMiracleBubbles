<?php
require ("koneksi.php");
header('Content-Type: application/json');

$sqlQuery = "SELECT * FROM tb_transaksi ORDER BY tanggal";

$result = mysqli_query($koneksi, $sqlQuery);

$data = array();
foreach ($result as $row){
    $data[] = $row;
}

mysqli_close($koneksi);

echo json_encode($data);
?>