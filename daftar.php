<?php
require('koneksi.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/login.css">
    <link rel="stylesheet" href="../asset/style.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/fontawesome-free-6.0.0/css/all.min.css">
    <title>Daftar</title>
</head>

<body>
    <!-- Header -->
    <?php require('menu.php') ?>

    <br><br>
    <div class="container">
        <div class="konten row mx-auto mb-5" style="width: 600px;">
            <div class="col-md-12 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Daftar Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal">
                            <div class="form-group">
                                <label>
                                    Nama
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    Email
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope pt-1 pb-1"></i>
                                    </div>
                                    <input type="text" class="form-control" name="email" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    Password
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock pt-1 pb-1"></i>
                                    </div>
                                    <input type="text" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Alamat</label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marker"></i>
                                    </div>
                                    <textarea type="text" class="form-control" name="alamat" required>
                                </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>
                                    No. Telp
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="telp" required>
                                </div>
                            </div>

                            <button type="text" class="btn btn-primary mb-4" name="daftar">
                                Daftar
                            </button>
                        </form>

                        <?php
                        //jika ada tombol daftar (ditekan tombol daftar)
                        if (isset($_POST["daftar"])) {
                            $nama = $_POST['nama'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $alamat = $_POST['alamat'];
                            $telp = $_POST['telp'];

                            //cek apakah email sudah digunakan
                            $ambil = $conn->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' ");
                            $cek = $ambil->num_rows;
                            if ($cek == 1) {
                                echo "<script>alert('Pendaftaran gagal, email sudah digunakan')</script>";
                                echo "<script>location='daftar.php'</script>";
                            } else {
                                //melakukan insert ke tabel pelanggan
                                $conn->query("INSERT INTO Pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telp_pelanggan,
                                alamat_pelanggan) VALUES ('$email','$password','$nama','$telp','$alamat' )");
                                echo "<script>alert('Pendaftaran berhasil, silahkan login')</script>";
                                echo "<script>location='login.php'</script>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require("footer.php") ?>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

</html>