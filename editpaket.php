<?php
require ('koneksi.php');
if( isset($_POST['update']) ){
    $paket    = $_POST['txt_paket'];
    $harga = $_POST['txt_harga'];
    $deskripsi = $_POST['txt_deskripsi'];

    $query = "UPDATE tb_paket SET paket='$paket', harga_kilo='$harga', deskripsi='$deskripsi' WHERE id_paket='$id'";
    echo $query;
    $result = mysqli_query($koneksi, $query);
    header('Location: home.php');
}
$id = $_GET['id_paket'];  
$query = "SELECT * FROM tb_paket WHERE id_paket='$id'";
$result = mysqli_query($koneksi, $query)or die(mysqli_errno($koneksi));

while ($row = mysqli_fetch_array($result)) {
    $id = $row['id_paket'];
	$paket = $row['paket'];
	$harga = $row['harga_ki;o'];
	$deskripsi = $row['deskripsi'];
}
?>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <form action="editpaket.php" method="POST">
    <p>Paket : <input type="text" name="txt_paket" required></p>
        <p>Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="text" name="txt_harga" required></p>
        <p>Deskrisi : <input type="text" name="txt_deskripsi" required></p>
        <button type="submit" name="update">Update</button>
    </form>
    <p><a href="paket.php">Kembali</p>
</body>
</html>
<?php ?>