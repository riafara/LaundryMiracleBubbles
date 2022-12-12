<?php
require ('koneksi.php');
if( isset($_POST['update']) ){
    $transaksi = $_POST['txt_id'];
    $tgl = $_POST['txt_tgl'];
    $cust = $_POST['txt_idc'];
    $pkt = $_POST['txt_idp'];
    $qty = $_POST['txt_qty'];
    $biaya = $_POST['txt_biaya'];
    $bayar = $_POST['txt_bayar'];
    $kembali = $_POST['txt_kembali'];

    $query = "UPDATE tb_transaksi SET tanggal='$tgl', id_customer='$cust', id_paket='$pkt', qty='$qty', biaya='$biaya', bayar='$bayar', kembalian='$kembali' WHERE id_transaksi='$transaksi'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: transaksi.php');
}
$id = $_GET['id_transaksi'];  
$query = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $transaksi = $row['id_transaksi'];
    $tgl = $row['tanggal'];
    $cust = $row['id_customer'];
    $pkt = $row['id_paket'];
    $qty = $row['qty'];
    $biaya = $row['biaya'];
    $bayar = $row['bayar'];
    $kembali = $row['kembalian'];
}
?>
<html>
<head>
    <title>transaksi edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="edittransaksi.php" method="POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>Tanggal : <input type="text" name="txt_tgl" required></p>
        <p>ID Customer : <input type="text" name="txt_idc" required></p>
        <p>ID Paket : <input type="text" name="txt_idp" required></p>
        <p>Qty : <input type="text" name="txt_qty" required></p>
        <p>Harga : <input type="text" name="txt_biaya" required></p>
        <p>Bayar : <input type="text" name="txt_bayar" required></p>
        <p>Kembalian &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_kembali" required></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="transaksi.php">Kembali</p>
</body>
</html>
<?php ?>