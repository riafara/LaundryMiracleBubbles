<?php
require ("koneksi.php");
// $email = $_GET['user_fullname'];
?>

<html>
<head>
        <title>Transaksi</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <h1>Tabel Detail Transaksi</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID Detail Transaksi</td>
                <td>ID Transaksi</td>
                <td>ID Paket</td>
                <td>Qty</td>
                <td>Harga</td>
                <td>Keterangan</td>
                
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_detail_transaksi";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $detail = $row['id_detail'];
                $transaksi = $row['id_transaksi'];
                $pkt = $row['id_paket'];
                $qty = $row['qty'];
                $biaya = $row['biaya'];
                $keterangan = $row['keterangan'];
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $detail; ?></td>
                <td><?php echo $transaksi; ?></td>
                <td><?php echo $pkt; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $biaya; ?></td>
                <td><?php echo $keterangan; ?></td>
                
                <td>
                <a href="editdetailtransaksi.php?id_detail=<?php echo $row['id_detail']; ?>">edit</a>
                <a href="hapusdetailtransaksi.php?id_detail=<?php echo $row['id_detail']; ?>">hapus</a>

            </td>
                
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="login.php">Log Out</a>
    </body>
</html>