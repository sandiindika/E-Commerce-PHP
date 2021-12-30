<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
$id = $_SESSION['id'];
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
                    <li class="active"><a href="pengiriman.php" title="Pengiriman"><span class="glyphicon glyphicon-send"></span></a></li>
                    <li><a href="riwayat.php" title="Riwayat Transaksi"><span class="glyphicon glyphicon-list-alt"></span></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="profil.php"><?php echo ucwords("$nama"); ?></a></li>
                    <li><a href="../logout.php">Keluar</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <br><br>
<div class="container">
<?php
    $id_transaksi = $_GET['id_transaksi'];
    //get waktu transaksi
    $a = "select * from transaksi where id_transaksi='$id_transaksi'";
    $b = mysqli_query($connect, $a);
    $c = mysqli_fetch_array($b);
    $waktu_transaksi = $c['waktu_transaksi'];
    $subtotal = $c['subtotal'];
?>
    <div class="page-header">
        <h1>Daftar Barang Yang Dikirim<small> <?php echo "$waktu_transaksi"; ?></small></h1>
    </div>
    <div class="row">
        <?php 
            //tampilkan barang
            $sql = "select * from barang inner join keranjang on barang.id_barang = keranjang.id_barang 
            where keranjang.id_pengguna='$id' and keranjang.waktu='$waktu_transaksi' and keranjang.status like '%kirim%'";
            $query = mysqli_query($connect, $sql);
            $cek = mysqli_num_rows($query);
            if($cek > 0){
                while($data = mysqli_fetch_array($query)){ ?>
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail">
                        <img src="../images/product/<?php echo "$data[gambar]"; ?>" width="50%" height="30%">
                        <div class="caption">
                            <h4 align="center"><?php echo ucwords("$data[nama_barang]"); ?></h4><hr>
                            <p>Jumlah Barang : <?php echo "$data[jumlah_beli]"; ?></p>
                            <p>Harga Barang : Rp. <?php echo number_format("$data[harga_barang]"); ?></p>
                            <p>Total : Rp. <?php echo number_format("$data[total]"); ?></p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            <?php } ?>
    </div>
    <center><h2>Total Keseluruhan : Rp. <?php echo number_format($subtotal); ?></h2></center>
        <?php }else{ ?>
            <center><img src="../assets/ico/kosong.png"><h2>Barang Sudah Dihapus</center>
        <?php } ?>
</div>
<div class="register">
        <div class="container">
            <div class="register-home">
                <p>
                    <a href="pengiriman.php" class="btn btn-primary btn=lg">Kembali</a>
                </p>
            </div>
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