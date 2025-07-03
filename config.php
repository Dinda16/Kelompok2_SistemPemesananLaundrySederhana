<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "laundry_db"; // Ganti sesuai nama database Anda

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

