<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php }
include "../conf/connection.php";
	//get data
	$id_barang = $_POST['id_barang'];
	$nama_barang = $_POST['nama_barang'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$id_kategori = $_POST['id_kategori'];

	//get gambar
	$nama_foto = $_FILES['foto']['name']; //mendapatkan nama file
	$file_tmp = $_FILES['foto']['tmp_name']; //mengambil url/path tempat penyimpanan sementara
	$lokasi = '../images/product/'; //folder tempat menyimpan gambar yang diupload
	$pindah = move_uploaded_file($file_tmp, $lokasi.$nama_foto); //memindahkan gambar yang diupload ke folder image

	if(!$file_tmp == ""){
		//get gambar default
		$img = $_POST['img'];
		//lokasi gambar
		$target = "../images/product/$img";
		//hapus gambar di folder
		if(file_exists($target)){
			unlink($target);
		}
	}else{
		$nama_foto = $_POST['img'];
	}

	//update table barang
	$sql = "update barang set nama_barang='$nama_barang',harga='$harga',stok='$stok',gambar='$nama_foto',id_kategori='$id_kategori' where id_barang='$id_barang'";
	$query = mysqli_query($connect, $sql);

	if($query){
		echo "<script> window.location.href='barang.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Mengedit Barang, Silahkan Ulangi'); window.location.href='barang.php' </script>";
	}
?>