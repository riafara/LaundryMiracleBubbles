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
        <h1>Tabel Transaksi</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID Transaksi</td>
                <td>Tanggal Transaksi</td>
                <td>ID Customer</td>
                <td>Nama</td>
                <td>ID Paket</td>
                <td>Qty</td>
                <td>Harga</td>
                <td>Bayar</td>
                <td>Kembalian</td>
                
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_transaksi";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $transaksi = $row['id_transaksi'];
                $tgl = $row['tanggal'];
                $cust = $row['id_customer'];
                $nama = $row['nama'];
                $pkt = $row['id_paket'];
                $qty = $row['qty'];
                $biaya = $row['biaya'];
                $bayar = $row['bayar'];
                $kembali = $row['kembalian'];
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $transaksi; ?></td>
                <td><?php echo $tgl; ?></td>
                <td><?php echo $cust; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $pkt; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $biaya; ?></td>
                <td><?php echo $bayar; ?></td>
                <td><?php echo $kembali; ?></td>
                
                <td>
                <a href="edittransaksi.php?id_transaksi=<?php echo $row['id_transaksi']; ?>">edit</a>
                <a href="hapustransaksi.php?id_transaksi=<?php echo $row['id_transaksi']; ?>">hapus</a>

            </td>
                
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="login.php">Log Out</a>
    </body>
</html>