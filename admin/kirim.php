<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
	//get id_transaksi
	$id_transaksi = $_GET['id_transaksi'];
	//get waktu
	date_default_timezone_set('Asia/Jakarta');
	$waktu = date('l, d-m-Y h:i:sa');
	//tampilkan data transaksi
	  $a = "select * from transaksi where id_transaksi='$id_transaksi'";
	  $b = mysqli_query($connect, $a);
	  $c = mysqli_fetch_array($b);
	  //ambil data id_pengguna dan waktu_transaksi
	  $id_pengguna = $c['id_pengguna'];
	  $waktu_transaksi = $c['waktu_transaksi'];

	 // update dtaa keranjang
	 $d = "update keranjang set waktu='$waktu',status='dikirim' where id_pengguna='$id_pengguna' and waktu='$waktu_transaksi'";
	 $e = mysqli_query($connect, $d);
	 // update data transaksi
	 $f = "update transaksi set waktu_transaksi='$waktu',status_transaksi='dikirim' where id_transaksi='$id_transaksi'";
	 $g = mysqli_query($connect, $f);

	 if($g){
	 	echo "<script> alert('Barang Dikirim'); window.location.href='home.php' </script>";
	 }else{
	 	echo "<script> alert('Terjadi Kesalahan Saat Mengirim, Silahkan Uangi.'); window.location.href='home.php' </script>";
	 }
?>