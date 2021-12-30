<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
$id = $_SESSION['id'];
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php }
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
     <!-- custom CSS here -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <style>         
    .flat{
            border-radius: 0px;
    </style>
</head>
<div class="container">
    <div class="row">
        <?php 
            $sql = "select * from pengguna inner join transaksi on pengguna.id_pengguna = transaksi.id_pengguna
            where pengguna.id_pengguna='$id' and transaksi.status_transaksi='lunas'";
            $query = mysqli_query($connect, $sql);
            $cek = mysqli_num_rows($query);
            if($cek > 0){
                while($data = mysqli_fetch_array($query)){ ?>
                <div class="col-md-6 col-sm-6">
                    <div class="thumbnail">
                        <div class="caption">
                            <h3><?php echo "$data[waktu_transaksi]"; ?></h3>
                            <h5><?php echo ucwords("$data[nama]"); ?></h5><hr>
                            <h4>Alamat : <?php echo ucwords("$data[alamat]"); ?></h4>
                            <h4>No Telepon : <?php echo ucwords("$data[no_hp]"); ?></h4>
                            <h4>Status : <?php echo ucwords("$data[status_transaksi]") ?></h4>
                            <h4>Total : Rp. <?php echo number_format("$data[subtotal]"); ?></h4>
                            </div>
                    </div>
                </div>
                <!-- /.col -->
            <?php } ?>
    </div>
       <?php }else{ ?>
            <center><img src="../assets/ico/kosong.png"><h2>Belum Ada Barang Yang Dikirim</center>
        <?php } ?>
</div>
<script>
window.print(); 
</script>
</html>