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
    $pkt = $_POST['txt_id'];
    $paket = $_POST['txt_paket'];
    $harga = $_POST['txt_harga'];
    $des = $_POST['txt_deskripsi'];

    $query = "UPDATE tb_paket SET paket='$paket', harga_kilo='$harga', deskripsi='$des' WHERE id_paket='$pkt'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: tpaket.php');
}
$id = $_GET['id_paket'];  
$query = "SELECT * FROM tb_paket WHERE id_paket='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id_paket'];
	$paket = $row['paket'];
	$harga = $row['harga_kilo'];
    $des   = $row['deskripsi'];

}
?>
<html>
<head>
    <title>Paket edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="editpaket.php" method="POST">
        <p><input type="hidden" name="txt_id" value="<?php echo $id; ?>"></p>
        <p>Paket : <input type="text" name="txt_paket" required></p>
        <p>Harga : <input type="text" name="txt_harga" required></p>
        <p>Deskripsi : <input type="text" name="txt_deskripsi" required></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="tpaket.php">Kembali</p>
</body>
</html>
<?php ?>