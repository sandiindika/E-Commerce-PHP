<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Barley Bakery and Cake </title>
    <link href="../assets/ico/barley.jpeg" rel="shorcut icon">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
     <!-- custom CSS here -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <style>         
        .flat{
            border-radius: 0px;
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <span class="navbar-brand">Barley Bakery and Cake<span class="glyphicon glyphicon-shopping-cart"></span></span>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Beranda</a></li>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="keranjang.php" title="Keranjang Belanja"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>                    
                    <li><a href="pengiriman.php" title="Pengiriman"><span class="glyphicon glyphicon-send"></span></a></li>
                    <li><a href="riwayat.php" title="Riwayat Transaksi"><span class="glyphicon glyphicon-list-alt"></span></a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profil.php"><?php echo ucwords("$nama"); ?></a></li>
                    <li><a href="../logout.php">Keluar</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
<br><br><br><br>
<div class="container">
    <div class="page-header">
        <h1 align="center">Panduan Penggunaan <img src="../assets/ico/cara.png" width="5%" height="5%"></h1><br><br>

<form action="" method="post">
<div class="register">
    </div>
    <section class="section bg-grey" id="feature">

        <div class="container">
            <div class="row justy-content-center">
                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="text-center feature-block">
                        <div class="img-icon-block mb-4">
                            <i class="ti-id-badge"></i>
                        </div>
                        <img src="../assets/ico/1.jpeg" width="100px" height="100px">
                        <h4 class="mb-2"><br>Daftar dan Login </h4>
                        <p>Buat akun mu terlebih dahulu sebelum memesan produk dari kami yaa</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="text-center feature-block">
                        <div class="img-icon-block mb-4">
                            <i class="ti-gift"></i>
                        </div>
                         <img src="../assets/ico/2.jpeg" width="100px" height="100px">
                        <h4 class="mb-2"><br>Cek Produk </h4>
                        <p>Cek Produk yang ingin kamu beli kemudian jangan lupa tambahkan ke Cart atau Keranjang Belanja , Jika Anda Berminat</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="text-center feature-block">
                        <div class="img-icon-block mb-4">
                            <i class="ti-wallet"></i>
                        </div>
                         <img src="../assets/ico/3.jpeg" width="100px" height="100px">
                        <h4 class="mb-2"><br> Selesaikan Pembayaran</h4>
                        <p>Selesaikan Pembayaran Menggunakan ID Order yang tersedia menggunakan beberapa metode pebayaran yang telah disiapkan</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-md-6">
                    <div class="text-center feature-block">
                        <div class="img-icon-block mb-4">
                            <i class="ti-truck"></i>
                        </div>
                         <img src="../assets/ico/4.jpeg" width="100px" height="100px">
                        <h4 class="mb-2"><br> Cek Status Pemesanan</h4>
                        <p>Cek Status pemesanan produk kamu Pada Menu Daftar Order</p>
                    </div>
                </div>
            </div>
        </div> <!-- / .container -->
        <div class="register">
        <br><br>
        <div class="container">
            <div class="register-home">
                <p>
                    <a href="home.php" class="btn btn-primary btn=lg">Kembali</a>
                </p>
            </div>
        </div>
        <br>
    </div>
    <!--Footer -->
   
   
    <div class="col-md-12 end-box">
        &copy; 2021 | All Rights Reserved | Ndisan - Barley Bakery and Cake
    </div>

    <!--jQUERY FILES-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--BOOTSTRAP  FILES-->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>