<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php } 
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php }
	include "../conf/connection.php";
	$id = $_SESSION['id'];
	$pass = $_POST['pass'];

	//cek password lama benar atau tidak
	$a = "select * from pengguna where id_pengguna='$id' and password='$pass'";
	$b = mysqli_query($connect, $a);
	$c = mysqli_num_rows($b);

	//tampilkan table keranjang
	$k = "select * from keranjang where id_pengguna='$id'";
	$l = mysqli_query($connect, $k);
	$m = mysqli_fetch_array($l);
	//mengambil data jumlah pembelian dan id_barang
	$id_barang = $m['id_barang'] ?? null;
	$jumlah = $m['jumlah_beli'] ?? null;

	//menampilkan tabel barang
	$n = "select * from barang where id_barang='$id_barang'";
	$o = mysqli_query($connect, $n);
	$p = mysqli_fetch_array($o);
	//mengambil data stok barang
	$stok = $p['stok'] ?? null;

	//menjumlahkan stok dan jumlah
	$stok_akhir = $stok + $jumlah;

	//update stok barang
	$q = "update barang set stok='$stok_akhir' where id_barang='$id_barang'";
	$r = mysqli_query($connect, $q);

	if($c > 0){
		//delete data keranjang
		$d = "delete from keranjang where id_pengguna='$id'";
		$e = mysqli_query($connect, $d);

		//delete data transaksi
		$f = "delete from transaksi where id_pengguna='$id'";
		$g = mysqli_query($connect, $f);
			
		//delete data user
		$sql = "delete from pengguna where id_pengguna='$id'";
		$query = mysqli_query($connect, $sql);

		if($query){
			echo "<script> alert('Terimakasih Sudah Menggunakan Barley Store.'); window.location.href='../logout.php' </script>";
		}else{
			echo "<script> alert('Gagal Memperbaharui, Terjadi Kesalahan.'); window.location.href='profil.php' </script>";
		}

	}else{
		echo "<script> alert('Pembaruan Akun Gagal, Password Yang Anda Masukkan Salah.'); window.location.href='profil.php' </script>";
	}