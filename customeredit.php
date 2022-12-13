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
    $cust = $_POST['txt_id'];
    $nama = $_POST['txt_nama'];
    $alamat = $_POST['txt_alamat'];
    $hp = $_POST['txt_hp'];

    $query = "UPDATE tb_customer SET nama='$nama', alamat='$alamat', no_hp='$hp' WHERE id_customer='$cust'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: tcustomer.php');
}
$id = $_GET['id_customer'];  
$query = "SELECT * FROM tb_customer WHERE id_customer='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $cust = $row['id_customer'];
	$nama = $row['nama'];
	$alamat = $row['alamat'];
    $hp = $row['no_hp'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

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
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> MIRACLE BUBBLES </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                TABEL DATA 
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">MASTER</h6>
                        <a class="collapse-item" href="tables.php">User</a>
                        <a class="collapse-item" href="tables.php">Customer</a>
                        <a class="collapse-item" href="tables.php">Paket</a>
                        <a class="collapse-item" href="tables.php">Transaksi</a>
                        <a class="collapse-item" href="tables.php">Detail Transaksi</a>
                    </div>
                </div>
               
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                            Tables
                        </div>
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data User</span></a>
            </li>     
             <!-- Nav Item - Tables -->
             <li class="nav-item">
                <a class="nav-link" href="tcustomer.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Customer</span></a>
            </li>  
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tpaket.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Paket</span></a>
            </li> 
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="ttransaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Transaksi</span></a>
            </li>  
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tdttransaksi.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Detail Transaksi</span></a>
            </li>             
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
        <div class="container">
        <div class="card o-hidden border-0 shadow-lg justify-content-center align-items-center">
            <div class="card-body w-75 vh-50 ">
                <!-- Nested Row within Card Body -->


                        <div class="p-2">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Customer</h1>
                            </div>
                            <form class="user" action="customeredit.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" class="form-control form-control-user" id="exampleInputId" name="txt_id" value="<?php echo $cust; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputNama" name="txt_nama" value="<?php echo $nama; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputAlamat" name="txt_alamat" value="<?php echo $alamat; ?>">
                                </div>
                                <div class="form-group">
                                    <label>No HP</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputHp" name="txt_hp" value="<?php echo $hp; ?>">
                                </div>
                                <hr>
                                <div class="form-group row" style="position: relative; float: right; ">
                                    <div class="px-3" style="width: 150px;">
                                        <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Update</button>
                                    </div>
                                    <div style="width: 125px;">
                                        <a href="tcustomer.php" class="btn btn-secondary btn-user btn-block">Kembali</a>
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
                        <span>Copyright &copy; Your Miracle Bubbles 2022</span>
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
<?php ?>