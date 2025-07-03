<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pesanan Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Tambah Pesanan Laundry</h2>
    <form method="post" action="simpan.php">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>No Telepon:</label>
        <input type="text" name="no_telp" required>

        <label>Alamat:</label>
        <textarea name="alamat" required></textarea>

        <label>Jenis Laundry:</label>
        <select name="jenis" required>
            <option value="Cuci Kering">Cuci Kering</option>
            <option value="Cuci Setrika">Cuci Setrika</option>
            <option value="Setrika Saja">Setrika Saja</option>
        </select>

        <label>Berat (kg):</label>
        <input type="number" name="berat_kg" step="0.1" required>

        <button type="submit">Simpan Pesanan</button>
        <a href="index.php" class="btn">Kembali</a>
    </form>
</body>
</html>
