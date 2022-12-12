<?php
require ('koneksi.php');
if( isset($_POST['update']) ){
    $detail = $_POST['txt_id'];
    $transaksi = $_POST['txt_idt'];
    $pkt = $_POST['txt_idp'];
    $qty = $_POST['txt_qty'];
    $biaya = $_POST['txt_biaya'];
    $keterangan = $_POST['txt_keterangan'];

    $query = "UPDATE tb_detail_transaksi SET id_transaksi='$transaksi', id_paket='$pkt', qty='$qty', biaya='$biaya', keterangan='$keterangan' WHERE id_detail='$detail'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: detailtransaksi.php');
}
$id = $_GET['id_detail'];  
$query = "SELECT * FROM tb_detail_transaksi WHERE id_detail='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $detail = $row['id_detail'];
    $transaksi = $row['id_transaksi'];
    $pkt = $row['id_paket'];
    $qty = $row['qty'];
    $biaya = $row['biaya'];
    $keterangan = $row['keterangan'];
}
?>
<html>
<head>
    <title>detail transaksi edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="editdetailtransaksi.php" method="POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>ID Transaksi : <input type="text" name="txt_idt" required></p>
        <p>ID Paket : <input type="text" name="txt_idp" required></p>
        <p>Qty : <input type="text" name="txt_qty" required></p>
        <p>Harga : <input type="text" name="txt_biaya" required></p>
        <p>Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_keterangan" required></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="detailtransaksi.php">Kembali</p>
</body>
</html>
<?php ?>