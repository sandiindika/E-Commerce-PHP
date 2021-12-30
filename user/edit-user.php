<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php } 
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php }
	include "../conf/connection.php";
	$id = $_SESSION['id'];
	$nama = $_POST['nama'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$user = $_POST['user'];
	$pass_lama = $_POST['pass_lama'];
	$pass_baru = $_POST['pass_baru'];

	//cek password lama benar atau tidak
	$a = "select * from pengguna where id_pengguna='$id' and password='$pass_lama'";
	$b = mysqli_query($connect, $a);
	$c = mysqli_num_rows($b);

	if($c > 0){
		//update data user
		$sql = "update pengguna set nama='$nama',jenis_kelamin='$jenis_kelamin',tgl_lahir='$tgl_lahir',username='$user',password='$pass_baru' where id_pengguna='$id'";
		$query = mysqli_query($connect, $sql);

		if($query){
			echo "<script> window.location.href='profil.php' </script>";
		}else{
			echo "<script> alert('Gagal Memperbaharui, Terjadi Kesalahan.'); window.location.href='profil.php' </script>";
		}

	}else{
		echo "<script> alert('Pembaruan Akun Gagal, Password Yang Anda Masukkan Salah.'); window.location.href='profil.php' </script>";
	}