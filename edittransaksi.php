<?php
require ('koneksi.php');

session_start();

if (!isset($_SESSION['id'])) {
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
}

$sesID = $_SESSION['id'];
$sesName = $_SESSION['name'];
$sesLvl = $_SESSION['level'];

if( isset($_POST['update']) ){
    $transaksi = $_POST['txt_id'];
    $tgl = $_POST['txt_tgl'];
    $cust = $_POST['txt_idc'];
    $nama = $_POST['txt_nama'];
    $pkt = $_POST['txt_idp'];
    $qty = $_POST['txt_qty'];
    $biaya = $_POST['txt_biaya'];
    $bayar = $_POST['txt_bayar'];
    $kembali = $_POST['txt_kembali'];

    $query = "UPDATE tb_transaksi SET tanggal='$tgl', id_customer='$cust', nama='$nama', id_paket='$pkt', qty='$qty', biaya='$biaya', bayar='$bayar', kembalian='$kembali' WHERE id_transaksi='$transaksi'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: ttransaksi.php');
}
$id = $_GET['id_transaksi'];  
$query = "SELECT * FROM tb_transaksi WHERE id_transaksi='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $id    = $row['id_transaksi'];
    $tgl   = $row['tanggal'];
    $cust  = $row['id_customer'];
    $nama  = $row['nama'];
    $pkt   = $row['id_paket'];
    $qty   = $row['qty'];
    $biaya = $row['biaya'];
    $bayar = $row['bayar'];
    $kembali = $row['kembalian'];

    ?>

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
    
        <title>EDIT TRANSAKSI</title>
    
        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
    
    </head>
    
    <body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div >
                <img src="img/logoo.jpg" style="width: 50px">
            </div>
            <div class="sidebar-brand-text mx-3"> MIRACLE BUBBLES </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
                <a class="nav-link" href="index.php">
                <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Home</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                    <span>User</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="tpaket.php">
                <i class="fas fa-camera-retro"></i>
                    <span>Paket</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="tcustomer.php">
                <i class="fa fa-users" aria-hidden="true"></i>
                    <span>Customer</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="ttransaksi.php">
                <i class="far fa-money-bill-alt" aria-hidden="true"></i>
                    <span>Transaksi</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="cetak.php">
                <i class="far fa-file-alt"></i>
                    <span>Report</span></a>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="bar.php">
                <i class="fas fa-fw fa-chart-line"></i>
                    <span>Graph</span></a>
            </li>
            <hr class="sidebar-divider my-0">
        


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                   

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $sesName; ?></span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            
                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
        <div class="container">
            <div class="card o-hidden border-0 shadow-lg justify-content-center align-items-center">
                <div class="card-body w-75 vh-50 ">
                    <!-- Nested Row within Card Body -->
    
    
                            <div class="p-2">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Edit Transaksi</h1>
                                </div>
                                <form class="user" action="edittransaksi.php" method="POST">
                                    <div class="form-group">
                                        <input type="hidden" class="form-control form-control-user" id="exampleInputId" name="txt_id" value="<?php echo $id; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="txt_tgl" value="<?php echo $tgl; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>ID Customer</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="txt_idc" value="<?php echo $cust; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputNama" name="txt_nama" value="<?php echo $nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Paket</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" name="txt_idp" value="<?php echo $pkt; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Qty</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="txt_qty" value="<?php echo $qty; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Biaya</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputPassword" name="txt_biaya" value="<?php echo $biaya; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Bayar</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" name="txt_bayar" value="<?php echo $bayar; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Kembali</label>
                                        <input type="text" class="form-control form-control-user" id="exampleInputUsername" name="txt_kembali" value="<?php echo $kembali; ?>">
                                    </div>
                                    <hr>
                                    <div class="form-group row" style="position: relative; float: right; ">
                                        <div class="px-3" style="width: 150px;">
                                            <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Update</button>
                                        </div>
                                        <div style="width: 125px;">
                                            <a href="ttransaksi.php" class="btn btn-secondary btn-user btn-block">Back</a>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    
                
            </div>
        </div>
        <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Miracle Bubbles 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
    
            </div>
            <!-- End of Content Wrapper -->
    
        </div>
        <!-- End of Page Wrapper -->
    
        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    
        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>
    
        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    
        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
    </body>
    
    </html>
    <?php } ?>