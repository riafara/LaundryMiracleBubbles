<?php
require ("koneksi.php");

session_start();

if(!isset($_SESSION['id'])){
    $_SESSION['msg']='anda harus login untuk mengakses halaman ini'
    header('Location: login.php');
}

$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];
?>
<html>
    <head>
        <title>Detail Transaksi</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <h1>Selamat Datang <?php echo $sesName ;?> </h1>
        <table border='1'style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID Transaksi</td>
                <td>ID Paket</td>
                <td>Qty</td>
                <td>Biaya</td>
                <td>Keterangan</td>
            </tr>
            <?php 
            $query = "SELECT * FROM tb_detail_transaksi";
            $result = mysqli_query($koneksi, $query);
            $no = 1;

            if ($sesLvl == 1){
                $dis = "";
            }else{
                $dis = "disabled";
            }
            while ($row = mysqli_fetch_array($result)){
                $idt = $row['id_transaksi'];
                $idp = $row['id_paket'];
                $qty = $row['qty'];
                $biaya = $row['biaya'];
                $keterangan = $row['keterangan'];
            ?>
            <tr>
                <td><?php echo $no; ?><td>
                <td><?php echo $idt; ?><td>
                <td><?php echo $idp; ?><td>
                <td><?php echo $qty; ?><td>
                <td><?php echo $biaya; ?><td>
                <td><?php echo $keterangan; ?><td>
                <td>
                    <a href="editdt.php?id=<?php echo $row['id_detail_transaksi']; ?>">
                    <input type="button" value="edit" <?php echo $dis; ?>></a>
                    <a href="hapusdt.php?id=<?php echo $row['id_detail_transaksi']; ?>">
                    <input type="button" value="hapus" <?php echo $dis; ?>></a>
                </td>
            </tr>
            <?php
            $no++;
            } ?>
        </table>
        <p><a href="index.php">Log Out</a></p>
    </body>
</html>