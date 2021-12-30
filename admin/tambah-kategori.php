<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
	//get data
	$kategori = $_POST['kategori'];

	//insert table kategori
	$sql = "insert into kategori (kategori) values ('$kategori')";
	$query = mysqli_query($connect, $sql);

	if($query){
		echo "<script> window.location.href='kategori.php' </script>";
	}else{
		echo "<script> alert('Terjadi Kesalahan Saat Menyimpan, Silahkan Ulangi.'); window.location.href='kategori.php' </script>";
	}
?>