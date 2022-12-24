<?php
require('koneksi.php');

if( isset($_POST['update']) ){
    $userId     = $_POST['txt_id'];
    $userPass   = $_POST['txt_pass'];

    $query = "UPDATE user_detail SET user_password='$userPass' WHERE id='$userId'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: login.php');
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

    <title>LAUNDRY MIRACLE BUBBLES</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 107px;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Forgot Password?</h1>
                            </div>
                            <form class="user" action="edit.php" method="POST">
                            <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputId"
                                        placeholder="Your ID" name="txt_id">
                                </div>
                                
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                        placeholder="New Password" name="txt_pass">
                                </div>
                                
                                <hr>
                                <div class="form-group row" style="position: relative; float: right; ">
                                    <div class="px-3" style="width: 150px;">
                                        <button type="submit" name="update" class="btn btn-primary btn-user btn-block">Update</button>
                                    </div>
                                    <div style="width: 125px;">
                                        <a href="login.php" class="btn btn-secondary btn-user btn-block">Back</a>
                                    </div>
                                </div>
                            </form>
                            
                           
                        </div>
                    </div>
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

</body>

</html>
