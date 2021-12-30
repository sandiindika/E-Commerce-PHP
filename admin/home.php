<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
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
    <!-- Datatables core CSS -->
    <link href="../assets/css/datatables.css" rel="stylesheet">
     <!-- custom CSS here -->
    <link href="../assets/css/style.css" rel="stylesheet" />
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
                    <li class="active"><a href="home.php">Beranda</a></li>
                    <li><a href="pengguna.php">Pengguna</a></li>
                    <li><a href="kategori.php">Kategori</a></li>
                    <li><a href="barang.php">Barang</a></li>
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
<div class="container">
   <br><br>
   <div class="page-header">
   	<h2> Daftar Order </h2>
   </div>
   <table id="tables" class="table table-responsive table-bordered table-striped">
   	<thead>
   		<tr>
   			<th style="text-align: center;"> Nama </th>
   			<th style="text-align: center;"> Tanggal </th>
   			<th style="text-align: center;"> Alamat Pengiriman</th>
   			<th style="text-align: center;"> No Telepon </th>
   			<th style="text-align: center;"> Status </th>
   			<th style="text-align: center;"> Aksi </th>
   		</tr>
   	</thead>
   	<?php
   		$sql = "select * from pengguna inner join transaksi on pengguna.id_pengguna = transaksi.id_pengguna";
   		$query = mysqli_query($connect, $sql);
   		while ($data = mysqli_fetch_array($query)){ $status = $data['status_transaksi']; ?>
   			<tr>
   				<td><?php echo ucwords("$data[nama]"); ?></td>
   				<td><?php echo ucwords("$data[waktu_transaksi]"); ?></td>
   				<td><?php echo ucwords("$data[alamat]"); ?></td>
   				<td><?php echo ucwords("$data[no_hp]"); ?></td>
   				<td>
	   				 <?php if($status == 'proses kirim'){ ?>
	   					Menunggu Konfirmasi
	   				 <?php }else if($status == 'dikirim'){ ?> 
	   				 	Barang Dikirim 
	   				 <?php }else if($status == 'lunas'){ ?> 
	   				 	Lunas
	   				 <?php } ?>
   				</td>
   				<td style="text-align: center;">
   				 <?php if($status == 'proses kirim'){ ?>
   					<a href="lihat-barang.php?id_transaksi=<?php echo "$data[id_transaksi]"; ?>" class="btn btn-primary">Lihat Barang</a>
   				 <?php }else if($status == 'dikirim'){ ?> 
   				 	<a href="lihat-barang.php?id_transaksi=<?php echo "$data[id_transaksi]"; ?>" class="btn btn-success">Lihat Barang</a>
   				 <?php }else if($status == 'lunas'){ ?> 
   				 	<a href="lihat-barang.php?id_transaksi=<?php echo "$data[id_transaksi]"; ?>" class="btn btn-warning">Lihat Barang</a>
   				 <?php } ?>
   				</td>
   			</tr>
   		<?php }
   	?>
   </table>
</div>

  <center><a href="cetak-order.php" class="btn btn-success" target="_BLANK">Cetak</a></center>

    <!--Footer -->
    <div class="col-md-12 end-box ">
         &copy; 2021 | All Rights Reserved | Ndisan - Barley Bakery and Cake
    </div>
    <!-- /.col -->
    <!--Footer end -->
    <!--jQUERY FILES-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--BOOTSTRAP  FILES-->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/datatables.js"></script>
    <script>
        $(document).ready(function () {
          $('#tables').DataTable();
          $('.dataTables_length').addClass('bs-select');
        });
    </script>
</body>
</html>
