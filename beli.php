<?php
session_start();
//mendapatkan id produk dari url
$id_produk = $_GET['id'];

//jika ada produk itu dikeranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += 1;
}
//selain itu (belum ada adi keranjang), maka produk itu dianggap dibeli 1
else {
    $_SESSION['keranjang'][$id_produk] = 1;
}

//lanjut kehalaman keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
