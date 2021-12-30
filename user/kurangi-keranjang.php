<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php }
	include "../conf/connection.php";
	$id_keranjang = $_GET['id'];

	//tampilkan table keranjang
	$a = "select * from keranjang where id_keranjang='$id_keranjang'";
	$b = mysqli_query($connect, $a);
	$c = mysqli_fetch_array($b);
	//mengambil data jumlah pembelian dan id_barang
	$id_barang = $c['id_barang'];
	$jumlah = $c['jumlah_beli'];

	//menampilkan tabel barang
	$d = "select * from barang where id_barang='$id_barang'";
	$e = mysqli_query($connect, $d);
	$f = mysqli_fetch_array($e);
	//mengambil data stok barang
	$stok = $f['stok'];

	//menjumlahkan stok dan jumlah
	$stok_akhir = $stok + $jumlah;

	//update stok barang
	$g = "update barang set stok='$stok_akhir' where id_barang='$id_barang'";
	$h = mysqli_query($connect, $g);

	//menghapus data barang dikeranjang
	$sql = "delete from keranjang where id_keranjang='$id_keranjang'";
	$query = mysqli_query($connect, $sql);
	if($query){
		echo "<script> window.location.href='keranjang.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan'); window.location.href='keranjang.php' </script>";
	}
?>