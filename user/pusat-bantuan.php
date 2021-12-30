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
  <title> Pusat Bantuan </title>
    <link href="../assets/ico/barley.jpeg" rel="shorcut icon">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/pusatbantuan.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>

                </button>
                <span class="navbar-brand">Barley Bakery and Cake<span class="glyphicon glyphicon-shopping-cart"></span></span>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Beranda</a></li>
                    <li><a href="member.php">Member</a></li>
                    <li><a href="keranjang.php" title="Keranjang Belanja"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>                    
                    <li><a href="pengiriman.php" title="Pengiriman"><span class="glyphicon glyphicon-send"></span></a></li>
                    <li><a href="riwayat.php" title="Riwayat Transaksi"><span class="glyphicon glyphicon-list-alt"></span></a></li>
                </ul>
                <ul class='nav navbar-nav navbar-right'>
                    <li><a href="profil.php"><?php echo ucwords("$nama"); ?></a></li>
                    <li><a href="../logout.php">Keluar</a></li>
                </ul/>
                
            </div>
        </div>
    </nav>
<br><br><br><br><br>
<h1>PUSAT BANTUAN</h1>
<div class="accordion">
  <div class="accordion-item">
    <div class="accordion-item-header">
      Ada berapa macam jenis produk yang dijual di Barley Bakery and Cake?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Kami mempunyai berbagai macam produk, diantaranya berbagai macam roti kering, cupcake, kue basah dan muffin.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-item-header">
      Apakah ada metode lain selain transfer?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Selain metode transfer, bisa dengan bayar ditempat untuk wilayah terdekat dengan toko kami.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-item-header">
      Apakah ada perbedaan antara harga di toko dan harga online?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Tidak ada perbedaan harga antara online dan yang terdapat di toko kami
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-item-header">
      Ke no rekening mana saya harus mentransfer pembayaran pesanan saya?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Pada web kami sudah menyertakan berbagai metode pembayaran untuk melakukan transfer.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-item-header">
      Berapa biaya ongkos kirim yang harus saya tanggung untuk pengiriman?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Untuk ongkos kirim tergantung pada tempat pengirimannya.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <div class="accordion-item-header">
      Bisakah saya mengambil pesanan saya di toko Barley Bakery and Cake?
    </div>
    <div class="accordion-item-body">
      <div class="accordion-item-body-content">
        Bisa, anda dapat memberi tahu  kami mengenai pesanan anda akan diambil di toko kami,
        atau diantar sampai rumah anda.
      </div>
    </div>
  </div>
</div>
  <script src="../assets/js/pusatbantuan.js"></script>
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
<div class="col-md-12 end-box">
        &copy; 2021 | All Rights Reserved | Ndisan - Barley Bakery and Cake
    </div>

    <!--jQUERY FILES-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--BOOTSTRAP  FILES-->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>