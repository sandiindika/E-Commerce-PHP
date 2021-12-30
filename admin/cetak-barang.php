<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
if($_SESSION['hak'] == 'admin'){}else{ ?> <script> alert('Anda Bukan Admin!'); window.location.href='../logout.php' </script> <?php } 
include "../conf/connection.php";
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Barley Bakery and Cake </title>
    <link href="../assets/ico/barley.jpeg" rel="shorcut icon">
    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <!-- Datatables core CSS -->
    <link href="../assets/css/datatables.css" rel="stylesheet">
     <!-- custom CSS here -->
    <link href="../assets/css/style.css" rel="stylesheet" />
</head>
<div class="container">
   <br><br>
   <div class="page-header">
   	<h2> Data Barang </h2>
   </div>
   <table id="tables" class="table table-responsive table-bordered table-striped">
   	<thead>
   		<tr>
        <th style="text-align: center;"> Nama Barang </th>
        <th style="text-align: center;"> Harga </th>
   		<th style="text-align: center;"> Stok </th>
   		<th style="text-align: center;"> Kategori </th>
   		</tr>
   	</thead>
   	<?php
   		$sql = "select * from kategori inner join barang on kategori.id_kategori = barang.id_kategori";
   		$query = mysqli_query($connect, $sql);
      $no = 1;
   		while ($data = mysqli_fetch_array($query)){ ?>
   			<tr>
          <td><?php echo ucwords("$data[nama_barang]"); ?></td>
          <td>Rp. <?php echo number_format($data['harga']); ?></td>
          <td><?php echo ucwords("$data[stok]"); ?></td>
   				<td><?php echo ucwords("$data[kategori]"); ?></td>
  			</tr>        
   		<?php $no++; }
   	?>
   </table>
 </div>
 <script>
window.print(); 
</script>
</html>