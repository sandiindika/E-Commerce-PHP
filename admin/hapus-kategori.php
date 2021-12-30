<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
	//get id_kategori
	$id_kategori = $_GET['id_kategori'];

	//menampilkan tabel barang berdasarkan id_kategori
	$a = "select * from barang where id_kategori='$id_kategori'";
	$b = mysqli_query($connect, $a);
	while ($c = mysqli_fetch_array($b)){
		$gambar = "../images/product/$c[gambar]";
		//hapus gambar
		unlink($gambar);
		//hapus data keranjang berdasarkan id_barang
		$d = "delete from keranjang where id_barang='$c[id_barang]'";
		$e = mysqli_query($connect, $d);
	}

	//hapus data barang berdasarkan id_kategori
	$f = "delete from barang where id_kategori='$id_kategori'";
	$g = mysqli_query($connect, $f);

	//hapus data kategori berdasarkan id_kategori
	$h = "delete from kategori where id_kategori='$id_kategori'";
	$i = mysqli_query($connect, $h);

	if($i){
		echo "<script> alert('Kategori Sudah Dihapus'); window.location.href='kategori.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Menghapus, Silahkan Uangi.'); window.location.href='kategori.php' </script>";
	}
?>