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
    $id = $row['id_customer'];
	$nama = $row['nama'];
	$alamat = $row['alamat'];
    $hp = $row['no_hp'];

}
?>
<html>
<head>
    <title>customer edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="customeredit.php" method="POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>Nama : <input type="text" name="txt_nama" required></p>
        <p>Alamat : <input type="text" name="txt_alamat" required></p>
        <p>no HP : <input type="text" name="txt_hp" required></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="tcustomer.php">Kembali</p>
</body>
</html>
<?php ?>