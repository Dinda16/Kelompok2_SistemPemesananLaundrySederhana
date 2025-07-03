<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM data WHERE id=$id");

if ($delete) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data.";
}
?>
