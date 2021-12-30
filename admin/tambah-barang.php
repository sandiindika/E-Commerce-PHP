<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php }
include "../conf/connection.php";
	//get data
	$nama_barang = $_POST['nama_barang'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok'];
	$id_kategori = $_POST['id_kategori'];

	//get gambar
	$nama_foto = $_FILES['gambar']['name']; //mendapatkan nama file
	$file_tmp = $_FILES['gambar']['tmp_name']; //mengambil url/path tempat penyimpanan sementara
	$lokasi = '../images/product/'; //folder tempat menyimpan gambar yang diupload
	$pindah = move_uploaded_file($file_tmp, $lokasi.$nama_foto); //memindahkan gambar yang diupload ke folder image

	//memasukkan data ke database
	$sql = "insert into barang (nama_barang,harga,stok,gambar,id_kategori) values ('$nama_barang','$harga','$stok','$nama_foto','$id_kategori')";
	$query = mysqli_query($connect, $sql);

	//cek apakah proses menyimpan data ke database berhasil atau tidak
	if($query){
		echo "<script> window.location.href='barang.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Menyimpan Barang, Silahkan Ulangi'); window.location.href='barang.php' </script>";
	}
?>