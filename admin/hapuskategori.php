<?php
require("koneksi.php");
$ambil = $conn->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$conn->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori terhapus');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
