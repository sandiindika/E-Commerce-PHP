<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php }
include "../conf/connection.php";
	//get id_barang
	$id_barang = $_GET['id_barang'];

	//hapus data barang dikeranjang
	$f = "delete from keranjang where id_barang='$id_barang'";
	$g = mysqli_query($connect, $f);

	//get data gambar
	$h = "select * from barang where id_barang='$id_barang'";
	$i = mysqli_query($connect, $h);
	$j = mysqli_fetch_array($i);
	$img = $j['gambar'];
	//lokasi gambar
	$target = '../images/product/$img';
	//hapus gambar di folder image
	if(file_exists($target)){
		unlink($img);
	}

	//hapus data barang
	$k = "delete from barang where id_barang='$id_barang'";
	$l = mysqli_query($connect, $k);

	//cek query
	if($l){
		echo "<script> window.location.href='barang.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Menghapus Barang, Silahkan Ulangi'); window.location.href='barang.php' </script>";
	}
?>