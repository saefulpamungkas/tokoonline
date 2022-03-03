<?php
require("koneksi.php");
session_start();

//jika tidak ada session pelanggan (blum login) maka di alihkan kelogin.php
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login dahulu');</script>";
    echo "<script>location='login.php';</script>";
}
if (!isset($_SESSION["keranjang"])) {
    echo "<script>alert('Silahkan pilih barang dahulu');</script>";
    echo "<script>location='index.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin/asset/css/bootstrap.css">
    <title>Checkout</title>
</head>

<body>
    <!-- header -->
    <?php require 'menu.php' ?>

    <section class="konten mb-5">
        <div class="container">
            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) : ?>
                        <!-- menampilkan produk yang sedang diperulangkan bedasarkan id_produk -->
                        <?php
                        $ambil = $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                        $row = $ambil->fetch_assoc();
                        $subharga = $row["harga_produk"] * $jumlah;
                        ?>
                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $row["nama_produk"]; ?></td>
                            <td>Rp. <?php echo number_format($row["harga_produk"]); ?></td>
                            <td><?php echo $jumlah; ?></td>
                            <td>Rp. <?php echo number_format($subharga); ?></td>
                            <td></td>

                        </tr>
                        <?php $nomor++; ?>
                        <?php $totalbelanja += $subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>Rp. <?php echo number_format($totalbelanja); ?></th>
                    </tr>
                </tfoot>
            </table>

            <!-- form data belanja pelanggan -->
            <form method="POST">

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["telp_pelanggan"] ?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select class="form-control" name="id_ongkir">
                            <option value="">Pilih Ongkos kirim</option>
                            <?php $ambil = $conn->query("SELECT * FROM ongkir");
                            while ($satuongkir = $ambil->fetch_assoc()) { ?>
                                <option value="<?php echo $satuongkir['id_ongkir'] ?>">
                                    <?php echo $satuongkir['nama_pengiriman'] ?>
                                    Rp. <?php echo number_format($satuongkir['tarif']) ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Alamat Lengkap Pengiriman</label>
                    <textarea class="form-control" name="alamat_pengiriman" placeholder="Masukan alamat lengkap termasuk kode pos"></textarea>
                </div>

                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>

            <?php
            if (isset($_POST["checkout"])) {
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tanggal_pembelian = date("Y-m-d");
                $alamat_pengiriman = $_POST["alamat_pengiriman"];

                $ambil = $conn->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc();
                $nama_pengiriman = $arrayongkir['nama_pengiriman'];
                $tarif = $arrayongkir['tarif'];

                $total_pembelian = $totalbelanja + $tarif;

                //a. menyimpan data ke tabel pembelian
                $conn->query("INSERT INTO pembelian (id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_pengiriman,tarif,alamat_pengiriman)
                VALUES ('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_pengiriman','$tarif','$alamat_pengiriman') ");

                //mendapatkan id_pembelian baru terjadi
                $id_pembelian_baru = $conn->insert_id;

                foreach ($_SESSION["keranjang"] as $id_produk => $jumlah) {

                    //mendapatkan data produk berdasarkan id_produk
                    $conn->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
                    $satuproduk = $ambil->fetch_assoc();


                    $conn->query("INSERT INTO pembelian_produk(
                        id_pembelian,id_produk,harga,jumlah)
                    VALUES ('$id_pembelian_baru','$id_produk','$harga','$jumlah') ");
                }

                //mengkosongkan keranjang setelah checkout
                unset($_SESSION["keranjang"]);

                //tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
                echo "<script>alert('Pembelian sukses');</script>";
                echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
            }
            ?>
        </div>
    </section>

    <?php require("footer.php") ?>


</body>

</html>