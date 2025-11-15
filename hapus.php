<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan!");
}

$id = $_GET['id'];

// cek apakah data ada
$cek = mysqli_query($koneksi, "SELECT * FROM alumni WHERE id='$id'");
if (mysqli_num_rows($cek) === 0) {
    die("Data tidak ditemukan di database.");
}

// hapus data
$query = mysqli_query($koneksi, "DELETE FROM alumni WHERE id='$id'");

if ($query) {
    header("Location: index.php");
    exit();
} else {
    echo "Gagal hapus: " . mysqli_error($koneksi);
}
?>
