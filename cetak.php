<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAUNDRY MIRACLE BUBBLES</title>

</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN TRANSAKSI</h2>
		<h4>Laundry Miracle Bubbles</h4>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
 <table border="1" style="width: 100%">
                                    
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl. Transaksi</th>
                                            <th>Customer</th>
                                            <th>Paket</th>
                                            <th>Berat</th>
                                            <th>Harga/Kg</th>
                                            <th>Total</th>
                                            <th>Tgl. Ambil</th>
                                            <th>Status</th>
                                        </tr>
                                    
                                    <tbody>
                                        <?php
                                             $query  = "SELECT * FROM tb_transaksi";
                                             $result = mysqli_query($koneksi, $query);
                                             $no     = 1;   
                                                  
                                            while ($row = mysqli_fetch_array($result)){
                                               
                                                $tgl        = $row['tgl_masuk'];
                                                $transaksi  = $row['kode_transaksi'];
                                                $nama       = $row['nama_customer'];
                                                $paket      = $row['nama_paket'];
                                                $qty        = $row['Qty'];
                                                $harga      = $row['harga_paket'];
                                                $total      = $row['harga_total'];
                                                $ambil      = $row['tgl_ambil'];
                                                $status     = $row['status'];
                                                
                                        ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $tgl; ?></td>
                                           
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $paket; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $ambil; ?></td>
                                            <td><?php echo $status; ?></td>                                            
                                            
                                        </tr>
                                        <?php
                                            $no++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <br>
                                <div style="width: 125px;">
                                        <a href="index.php" class="btn btn-secondary btn-user btn-block">Back</a>
                                    </div>
 
	<script>
		window.print();
	</script>
 
</body>
</html>