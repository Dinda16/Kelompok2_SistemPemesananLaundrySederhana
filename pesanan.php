<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';
// lanjut kode lainnya...


<?php include 'koneksi.php'; ?>

<h2>Data Pesanan</h2>
<form method="post">
  <select name="id_pelanggan" required>
    <option value="">Pilih Pelanggan</option>
    <?php
    $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
    while ($p = mysqli_fetch_array($pelanggan)) {
      echo "<option value='$p[id]'>$p[nama]</option>";
    }
    ?>
  </select>
  <input type="date" name="tanggal" required>
  <input type="number" name="jumlah_kg" placeholder="Jumlah (kg)" required>
  <input type="number" name="harga" placeholder="Harga per kg" required>
  <button type="submit" name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
  $id_pelanggan = $_POST['id_pelanggan'];
  $tanggal = $_POST['tanggal'];
  $jumlah = $_POST['jumlah_kg'];
  $harga = $_POST['harga'];
  $total = $jumlah * $harga;
  mysqli_query($koneksi, "INSERT INTO pesanan VALUES('', '$id_pelanggan', '$tanggal', '$jumlah', '$harga', '$total')");
  echo "<meta http-equiv='refresh' content='0'>";
}
?>

<table border="1">
  <tr><th>No</th><th>Pelanggan</th><th>Tanggal</th><th>Jumlah</th><th>Harga/kg</th><th>Total</th><th>Aksi</th></tr>
  <?php
  $no = 1;
  $query = mysqli_query($koneksi, "SELECT pesanan.*, pelanggan.nama FROM pesanan JOIN pelanggan ON pesanan.id_pelanggan = pelanggan.id");
  while ($d = mysqli_fetch_array($query)) {
    echo "<tr>
      <td>$no</td>
      <td>$d[nama]</td>
      <td>$d[tanggal]</td>
      <td>$d[jumlah_kg] kg</td>
      <td>Rp$d[harga_per_kg]</td>
      <td>Rp$d[total_harga]</td>
      <td>
        <a href='edit_pesanan.php?id=$d[id]'>Edit</a> | 
        <a href='hapus_pesanan.php?id=$d[id]' onclick='return confirm(\"Hapus?\")'>Hapus</a>
      </td>
    </tr>";
    $no++;
  }
  ?>
</table>
