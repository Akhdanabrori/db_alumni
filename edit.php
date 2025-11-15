<?php 
include 'koneksi.php'; 
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM alumni WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>EDIT DATA ALUMNI</h2>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <label>Nama</label>
    <input type="text" name="nama" value="<?= $row['nama']; ?>">

    <label>NIK</label>
    <input type="text" name="nik" value="<?= $row['nik']; ?>">

    <label>NISN</label>
    <input type="text" name="nisn" value="<?= $row['nisn']; ?>">

    <label>Tempat Lahir</label>
    <input type="text" name="tempat_lahir" value="<?= $row['tempat_lahir']; ?>">

    <label>Tanggal Lahir</label>
    <input type="date" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">

    <label>Alamat</label>
    <textarea name="alamat"><?= $row['alamat']; ?></textarea>

    <label>Jurusan</label>
    <input type="text" name="jurusan" value="<?= $row['jurusan']; ?>">

    <label>Tahun Lulus</label>
    <input type="number" name="tahun_lulus" value="<?= $row['tahun_lulus']; ?>">

    <button type="submit" name="update">Update</button>
    <a class="tombol" href="index.php">Kembali</a>
</form>

<?php
if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE alumni SET
        nama='$_POST[nama]',
        nik='$_POST[nik]',
        nisn='$_POST[nisn]',
        tempat_lahir='$_POST[tempat_lahir]',
        tanggal_lahir='$_POST[tanggal_lahir]',
        alamat='$_POST[alamat]',
        jurusan='$_POST[jurusan]',
        tahun_lulus='$_POST[tahun_lulus]'
        WHERE id='$_POST[id]'");

    echo "<script>alert('Data berhasil diupdate');window.location='index.php';</script>";
}
?>

</body>
</html>
