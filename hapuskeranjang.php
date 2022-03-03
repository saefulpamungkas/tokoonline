<?php
session_start();
$id_produk = $_GET["id"];
unset($_SESSION["keranjang"][$id_produk]);
//menghapus keranjang belanja
echo "<script>alert('Produk dihapus dari keranjang');</script>";
echo "<script>location='keranjang.php';</script>";
