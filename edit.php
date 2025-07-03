<?php
include 'config.php';

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM data WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan.";
    exit;
}

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $usia = $_POST['usia'];

    $update = mysqli_query($conn, "UPDATE data SET nama='$nama', alamat='$alamat', usia=$usia WHERE id=$id");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal memperbarui data.";
    }
}
?>

<h2>Edit Data</h2>
<form method="POST">
    <label>Nama:</label>
    <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>

    <label>Alamat:</label>
    <input type="text" name="alamat" value="<?= $data['alamat'] ?>" required><br>

    <label>Usia:</label>
    <input type="number" name="usia" value="<?= $data['usia'] ?>" required><br>

    <button type="submit" name="submit">Simpan Perubahan</button>
</form>
