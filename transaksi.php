<?php
require ("koneksi.php");
// $email = $_GET['user_fullname'];
?>

<html>
<head>
        <title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <h1>Tabel Transaksi</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID</td>
                <td>Tanggal</td>
                <td>Customer</td>
                <td>Nama Paket</td>
                <td>Qty</td>
                <td>Harga</td>
                <td>Bayar</td>
                <td>Kembali</td>
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_transaksi";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $tgl     = $row['tanggal'];
                $id      = $row['id_transaksi']
                $cus     = $row['id_customer'];
                $paket   = $row['id_paket'];
                $qty     = $row['qty'];
                $harga   = $row['biaya'];
                $bayar   = $row['bayar'];
                $kembali = $row['kembalian'];
                
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $tgl; ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $cus; ?></td>
                <td><?php echo $paket; ?></td>
                <td><?php echo $qty; ?></td>
                <td><?php echo $harga; ?></td>
                <td><?php echo $bayar; ?></td>
                <td><?php echo $kembali; ?></td>
                <td>
                    <a href='edittransaksi.php?id_user=$row[id_transaksi]'>Edit</a>
                    <a href='hapustransaksi.php?id_transaksi =$row[id_transaksi]'>Hapus</a>
                </td>
                
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="login.php">Log Out</a>
    </body>
</html>