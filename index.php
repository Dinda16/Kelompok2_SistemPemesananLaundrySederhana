<?php include 'config.php'; ?>
<?php
$koneksi = mysqli_connect("localhost", "root", "", "laundry_db");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pesanan Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Pesanan Laundry</h2>

    <div style="text-align:center;">
        <a href="tambah.php" class="btn">+ Tambah Pesanan</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Laundry</th>
            <th>Berat (kg)</th>
            <th>Tanggal Pesan</th>
            <th>Aksi</th> <!-- Tambahan kolom aksi -->
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($koneksi, "
        SELECT pesanan.*, pelanggan.nama 
        FROM pesanan 
        JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id_pelanggan
        ");

        while ($d = mysqli_fetch_array($data)) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['jenis_laundry'] ?></td>
            <td><?= $d['berat_kg'] ?></td>
            <td><?= $d['tanggal_pesan'] ?></td>
            <td>
            <div style="display: flex; flex-direction: column; gap: 5px;">
            <a href="edit.php" class="btn">Edit</a>
            <a href="hapus.php" class="btn" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </div>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
