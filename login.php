<?php
session_start();
require("koneksi.php");
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
    <title>login pembeli</title>
</head>

<body>
    <!-- header -->
    <?php require("menu.php") ?>

    <div class="konten mx-auto mb-5" style="width: 400px;">
        <div class="container">
            <h4 class="text-center">FORM LOGIN</h4>
            <form method="POST">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <div aria-valuemax="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-envelope pt-1 pb-1"></i></div>
                        </div>
                        <input type="text" name="email" class="form-control" placeholder="Masukan nama email anda">
                    </div>

                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div aria-valuemax="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-lock pt-1 pb-1"></i>
                            </div>
                        </div>
                        <input type="password" name="pass" class="form-control" placeholder="Masukan password anda">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="login">SUBMIT</button>
                <button type="riset" class="btn btn-danger">RESET</button><br><br>
                Belum punya akun ? <a href="daftar.php">click here </a><br>
                Anda admin ? <a href="admin/login.php">click here </a>
            </form>
        </div>
    </div>

    <?php
    //jika ada tombol login(tombol login ditekan)
    if (isset($_POST["login"])) {

        $email = $_POST["email"];
        $password = $_POST["pass"];
        //lalukan query mencek di tabel pelanggan di db
        $ambil = $conn->query("SELECT * FROM pelanggan
                        WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

        //menghitung akun yang terambil
        $akuncocok = $ambil->num_rows;

        //jika 1 akun yang cocok, maka dilogikan
        if ($akuncocok == 1) {
            //anda sukses login
            //mendapatkan akun dalam bentuk array
            $akun = $ambil->fetch_assoc();
            //anda sudah login
            //simpan di session pelanggan
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert('Anda sukses login');</script>";
            echo "<script>location='index.php';</script>";

            //jika sudah belanja

            if (isset($_SESSION["keranjang"]) or !empty($_SESSION["keranjang"])) {
                echo "<script>location='checkout.php'</script>";
            } else {
                echo "<script>location='riwayat.php'</script>";
            }
        } else {
            //anda gagal login
            echo "<script>alert('Anda gagal login, perikasa akun Anda');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>

    <!-- footer -->
    <?php require("footer.php") ?>




</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/popper.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>

</html>