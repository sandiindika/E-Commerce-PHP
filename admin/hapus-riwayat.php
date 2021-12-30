<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
	//get id_transaksi
	$id_transaksi = $_GET['id_transaksi'];
	//tampilkan data transaksi
	  $a = "select * from transaksi where id_transaksi='$id_transaksi'";
	  $b = mysqli_query($connect, $a);
	  $c = mysqli_fetch_array($b);
	  //ambil data id_pengguna dan waktu_transaksi
	  $id_pengguna = $c['id_pengguna'];
	  $waktu_transaksi = $c['waktu_transaksi'];

	  //Hapus data kerajang berdasarkan id_pengguna dan waktu_transaksi
	  $d = "delete from keranjang where id_pengguna='$id_pengguna' and waktu='$waktu_transaksi'";
	  $e = mysqli_query($connect, $d);

	  //hapus data transaksi
	  $f = "delete from transaksi where id_transaksi='$id_transaksi'";
	  $g = mysqli_query($connect, $f);

	 if($g){
	 	echo "<script> alert('Riwayat Transaksi Sudah Dihapus'); window.location.href='home.php' </script>";
	 }else{
	 	echo "<script> alert('Terjadi Kesalahan Saat Menghapus, Silahkan Uangi.'); window.location.href='home.php' </script>";
	 }
?>