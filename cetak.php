<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LAUNDRY MIRACLE BUBBLES</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
 
	<center>
 
		<h2>DATA LAPORAN TRANSAKSI</h2>
		<h4>Laundry Miracle Bubbles</h4>
 
	</center>
 
	<?php 
	include 'koneksi.php';
	?>
 
 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>ID Transaksi</th>
                                            <th>ID Customer</th>
                                            <th>Nama</th>
                                            <th>Paket</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Bayar</th>
                                            <th>Kembali</th>
                                        </tr>
                                    
                                    <tbody>
                                        <?php
                                             $query  = "SELECT * FROM tb_transaksi";
                                             $result = mysqli_query($koneksi, $query);
                                             $no     = 1;   
                                                  
                                            while ($row = mysqli_fetch_array($result)){
                                               
                                                $tgl     = $row['tanggal'];
                                                $id      = $row['id_transaksi'];
                                                $cust    = $row['id_customer'];
                                                $nama    = $row['nama'];
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
                                            <td><?php echo $cust; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $paket; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $harga; ?></td>
                                            <td><?php echo $bayar; ?></td>
                                            <td><?php echo $kembali; ?></td>                                            
                                            
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