<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>TAMBAH DATA ALUMNI</h2>

<form action="create.php" method="POST">

    <label>Nama</label><br>
    <input type="text" name="nama" required><br><br>

    <label>NIK</label><br>
    <input type="text" name="nik" required><br><br>

    <label>NISN</label><br>
    <input type="text" name="nisn" required><br><br>

    <label>Tempat Lahir</label><br>
    <input type="text" name="tempat_lahir" required><br><br>

    <label>Tanggal Lahir</label><br>
    <input type="date" name="tanggal_lahir" required><br><br>

    <label>Alamat</label><br>
    <textarea name="alamat" required></textarea><br><br>

    <label>Jurusan</label><br>
    <select name="jurusan" required>
        <option value="">-- Pilih Jurusan --</option>
        <option value="RPL">RPL</option>
        <option value="TKJ">TKJ</option>
        <option value="TJAT">TJAT</option>
        <option value="ANIMASI">ANIMASI</option>
    </select>
    <br><br>

    <label>Tahun Lulus</label><br>
    <input type="number" name="tahun_lulus" required><br><br>

    <button type="submit" name="simpan">Simpan</button>
    <a href="index.php" class="tombol">Kembali</a>

</form>

<?php
if (isset($_POST['simpan'])) {
    $nama          = $_POST['nama'];
    $nik           = $_POST['nik'];
    $nisn          = $_POST['nisn'];
    $tempat_lahir  = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat        = $_POST['alamat'];
    $jurusan       = $_POST['jurusan'];
    $tahun_lulus   = $_POST['tahun_lulus'];

    $query = mysqli_query($koneksi, "INSERT INTO alumni VALUES (
        '', '$nama', '$nik', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$jurusan', '$tahun_lulus'
    )");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

</body>
</html>
