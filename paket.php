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
        <h1>Daftar Paket Laundry</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID Paket</td>
                <td>Nama Paket</td>
                <td>Harga /Kg</td>
                <td>Deskripsi</td>
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_paket";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $id = $row['id_paket'];
                $paket = $row['paket'];
                $harga = $row['harga_kilo'];
                $des = $row['deskripsi'];
                
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $id; ?></td>
                <td><?php echo $paket; ?></td>
                <td><?php echo $harga; ?></td>
                <td><?php echo $des; ?></td>
                <td>
                    <a href='editpaket.php?id_paket=$row[id_paket]'>Edit</a>
                    <a href='hapuspaket.php?id_paket =$row[id_paket]'>Hapus</a>
                </td>
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="home.php">Log Out</a>
    </body>
</html>