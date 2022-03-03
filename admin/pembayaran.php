<?php
require('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pembayaran</title>
</head>

<body>
    <h2>Data Pembayaran</h2>
    <hr>
    <?php
    //mendapatkan id_pembelian dari url
    $id_pembelian = $_GET['id'];

    //Mendapatkan data pembayaran berdasarkan id_pembelian
    $ambil = $conn->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
    $detail = $ambil->fetch_assoc();

    ?>

    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?php echo $detail['nama'] ?></td><br>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $detail['bank'] ?></td><br>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?php echo number_format($detail['jumlah']) ?></td><br>
                </tr>
                <tr>
                    <th>Tanggal</th>
                    <td><?php echo $detail['tanggal'] ?></td><br>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <img src="../bukti_pembayaran/<?php echo $detail['bukti']  ?>" class="img-responsive">
        </div>
    </div>

    <form method="POST">
        <div class="form-group">
            <label>No Resi Pengiriman</label>
            <input type="text" class="form-control" name="resi">
        </div>
        <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="">Pilih Status</option>
                <option value="lunas">Lunas</option>
                <option value="barang dikirim">Barang Dikirim</option>
                <option value="batal">Batal</option>
            </select>
        </div>
        <button class="btn btn-primary" name="proses">Proses</button>
    </form>

    <?php
    if (isset($_POST["proses"])) {
        $resi = $_POST["resi"];
        $status = $_POST["status"];
        $conn->query("UPDATE pembelian SET resi_pengiriman='$resi', status_pembelian='$status'
            WHERE id_pembelian='$id_pembelian'");

        echo "<script>alert('Data pembelian terupdate');</script>";
        echo "<script>location='index.php?halaman=pembelian';</script>";
    }
    ?>
</body>

</html>