<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>DATA ALUMNI</h2>
<a class="tombol" href="create.php">Tambah Data</a>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>NIK</th>
        <th>NISN</th>
        <th>TTL</th>
        <th>Alamat</th>
        <th>Jurusan</th>
        <th>Tahun Lulus</th>
        <th>Aksi</th>
    </tr>

    <?php
    $data = mysqli_query($koneksi, "SELECT * FROM alumni ORDER BY id DESC");

    if (!$data) {
        echo "<tr><td colspan='9'>Query Error: " . mysqli_error($koneksi) . "</td></tr>";
    }

    while ($row = mysqli_fetch_assoc($data)) {
    ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['nik']; ?></td>
        <td><?= $row['nisn']; ?></td>
        <td><?= $row['tempat_lahir'] . ", " . $row['tanggal_lahir']; ?></td>
        <td><?= $row['alamat']; ?></td>
        <td><?= $row['jurusan']; ?></td>
        <td><?= $row['tahun_lulus']; ?></td>
       <td>
    <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a> |
    <a href="hapus.php?id=<?= $row['id']; ?>" class="hapus" onclick="return confirm('Hapus data ini?')">Hapus</a>
    </td>

    </tr>
    <?php } ?>
</table>

</body>
</html>
