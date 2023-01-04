<?php
require ("koneksi.php");
// $email = $_GET['user_fullname'];
?>

<html>
<head>
        <title>Customer</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
    <body>
        <h1>Tabel Customer</h1>
        <!-- <h1>Selamat Datang <?php echo $email;?></h1> -->
        <table border='2' style="text-align:center">
            <tr>
                <td>NO</td>
                <td>Kode Customer</td>
                <td>Nama Customer</td>
                <td>Alamat</td>
                <td>No Hp</td>
                
                <td colspan="2"></td>
            </tr>
            <?php
            $query  = "SELECT * FROM tb_customer";
            $result = mysqli_query($koneksi, $query);
            $no     = 1;

            

            while ($row = mysqli_fetch_array($result)){
                $cust   = $row['kode_customer'];
                $nama = $row['nama_customer'];
                $alamat= $row['alamat'];
                $hp   = $row['nohp'];
                
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $cust; ?></td>
                <td><?php echo $nama; ?></td>
                <td><?php echo $alamat; ?></td>
                <td><?php echo $hp; ?></td>
                
                <td>
                <a href="customeredit.php?kode_customer=<?php echo $row['kode_customer']; ?>">edit</a>
                <a href="customerhapus.php?kode_customer=<?php echo $row['kode_customer']; ?>">hapus</a>

            </td>
                
            </tr>        
            <?php
            $no++;   
            }?>
        </table>  
        <a href="login.php">Log Out</a>
    </body>
</html>