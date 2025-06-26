<?php
// Koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "laundry_db");

// Proses tambah atau edit pesanan
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $layanan = $_POST['layanan'];
    $berat = $_POST['berat'];
    $id = $_POST['id'];

    if ($id == '') {
        mysqli_query($koneksi, "INSERT INTO pesanan (nama_pelanggan, layanan, berat_kg, tanggal) VALUES ('$nama', '$layanan', $berat, NOW())");
    } else {
        mysqli_query($koneksi, "UPDATE pesanan SET nama_pelanggan='$nama', layanan='$layanan', berat_kg=$berat WHERE id=$id");
    }
    header("Location: index.php");
}

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM pesanan WHERE id=$id");
    header("Location: index.php");
}

// Ambil data untuk edit
$edit = ["id"=>'', "nama_pelanggan"=>'', "layanan"=>'', "berat_kg"=>''];
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id=$id");
    $edit = mysqli_fetch_assoc($result);
}

// Ambil semua data pesanan
$data = mysqli_query($koneksi, "SELECT * FROM pesanan ORDER BY id DESC");
?>
