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
    <h2> Daftar Order </h2>
   </div>
   <table id="tables" class="table table-responsive table-bordered table-striped">
    <thead>
      <tr>
        <th style="text-align: center;"> Nama </th>
        <th style="text-align: center;"> Tanggal </th>
        <th style="text-align: center;"> Alamat Pengiriman</th>
        <th style="text-align: center;"> No Telepon </th>
        <th style="text-align: center;"> Status </th>
      </tr>
    </thead>
    <?php
      $sql = "select * from pengguna inner join transaksi on pengguna.id_pengguna = transaksi.id_pengguna";
      $query = mysqli_query($connect, $sql);
      while ($data = mysqli_fetch_array($query)){ $status = $data['status_transaksi']; ?>
        <tr>
          <td><?php echo ucwords("$data[nama]"); ?></td>
          <td><?php echo ucwords("$data[waktu_transaksi]"); ?></td>
          <td><?php echo ucwords("$data[alamat]"); ?></td>
          <td><?php echo ucwords("$data[no_hp]"); ?></td>
          <td>
             <?php if($status == 'proses kirim'){ ?>
              Menunggu Konfirmasi
             <?php }else if($status == 'dikirim'){ ?> 
              Barang Dikirim 
             <?php }else if($status == 'lunas'){ ?> 
              Lunas
             <?php } ?>
          </td>
           <?php } ?>
          </td>
        </tr>
   </table>
</div>
 <script>
window.print(); 
</script>
</html>