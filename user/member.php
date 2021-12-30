<?php
session_start();
$nama = $_SESSION['nama'];
include '../conf/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Barley Bakery and Cake </title>
  <link href="../assets/ico/barley.jpeg" rel="shortcut icon">
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
<!-- header -->
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
                    <li class="active"><a href="#">Member</a></li>
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

    <br><br>
<div class="container">
	<div class="page-header">
			<h1>Kartu Member <img src="../assets/ico/card.jpg" width="5%" height="5%"></h1>
		</div>
			<form action="" method="post">
			<div id="card">
	<div class="row">
		<label>Nama&nbsp;&nbsp;&nbsp;&nbsp;</label>
		<input type="text" name="nama" value="<?=isset($_POST['nama']) ? $_POST['nama'] : ''?>"/>
	</div>
	<div class="row">
		<label>Tanggal</label>
		<input type="date" name="tanggal" value="<?=isset($_POST['tanggal']) ? $_POST['tanggal'] : ''?>"/>
	</div>
	<br>
	<div class="row">
		<input type="submit" name="submit" value="Simpan"/>
	</div>

	<br>
</form>
<?php
if (isset($_POST['submit'])) {
	echo 'Nama: ' . $_POST['nama']. '<br>';
	echo 'tanggal: ' . $_POST['tanggal']. '<br>';
	echo 'Selamat telah menjadi member kami, '  .  $_POST['nama'];
}
?>
</div>
</div>
	<p align="center">
	<img src="../images/content/member.jpg" width="400"><br><br>
	</p>	
			
				<div class="clearfix"> </div>
				 <!-- / .container -->
<div class="register">
    <br><br>
        <div class="container">
            <div class="register-home">
                <p>
                    <a href="home.php" class="btn btn-primary btn=lg">Kembali</a>
                </p>
            </div>
        </div>
    </div>
        <br>
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