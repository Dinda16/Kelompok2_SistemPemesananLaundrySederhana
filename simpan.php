<?php
include 'config.php';

$nama = $_POST['nama'];
$telepon = $_POST['no_telp'];
$alamat = $_POST['alamat'];
$jenis = $_POST['jenis'];
$berat = $_POST['berat_kg'];
$tanggal = date("Y-m-d");

mysqli_query($conn, "INSERT INTO pelanggan(nama, no_telp, alamat) VALUES('$nama','$telepon','$alamat')");
$id_pelanggan = mysqli_insert_id($conn);

mysqli_query($conn, "INSERT INTO pesanan(id_pelanggan, jenis_laundry, berat_kg, tanggal) VALUES('$id_pelanggan', '$jenis', '$berat', '$tanggal')");

header("Location: index.php");
?>
