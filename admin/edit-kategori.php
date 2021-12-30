<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
	//get data
	$id_kategori = $_POST['id_kategori'];
	$kategori = $_POST['kategori'];

	//update table kategori
	$sql = "update kategori set kategori='$kategori' where id_kategori='$id_kategori'";
	$query = mysqli_query($connect, $sql);

	if($query){
		echo "<script> window.location.href='kategori.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Mengubah, Silahkan Ulangi.'); window.location.href='kategori.php' </script>";
	}
?>