<?php
require ("koneksi.php");
// $email = $_GET['user_fullname'];
?>

<html>
<head>
        <title>Paket</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <h1>Tabel Paket</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>No</td>
                <td>ID Customer</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>No Hp</td>
                
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_customer";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $cust   = $row['id_customer'];
                $nama = $row['nama'];
                $alamat= $row['alamat'];
                $hp   = $row['no_hp'];
                
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $cust; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $alamat; ?></td>
                <td><?php echo $hp; ?></td>
                
                <td>
                <a href="customeredit.php?id_customer=<?php echo $row['id_customer']; ?>">edit</a>
                <a href="customerhapus.php?id_customer=<?php echo $row['id_customer']; ?>">hapus</a>

            </td>
                
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="login.php">Log Out</a>
    </body>
</html>