<?php session_start();
if(empty($_SESSION['nama'])){ ?>
    <script> window.location.href='../index.php' </script>
<?php }
$nama = $_SESSION['nama'];
$id = $_SESSION['id'];
if($_SESSION['hak'] == 'pengguna'){}else{ ?> <script> alert('Anda Bukan Pengguna!'); window.location.href='../logout.php' </script> <?php }
include "../conf/connection.php";
$sql = "select * from pengguna where id_pengguna='$id'";
$query = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($query);
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
<body><br><br><br>
<div class="col-md-3"></div>
    <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2>Informasi User</h2>
                </div>
                <div class="panel-body">
                    <div class="row-fluid">
                        <div class="col-md-3">
                            <center><img class="img-circle" src="../assets/ico/user.png"></center><br>
                        </div>
                        <div class="col-md-9">
                            <strong><?php echo ucwords("$data[nama]"); ?></strong><br>
                            <table class="table table-responsive">
                                <tbody>
                                <tr>
                                    <td>Jenis Kelamin :</td>
                                    <td><?php echo "$data[jenis_kelamin]"; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Lahir :</td>
                                    <td><?php echo "$data[tgl_lahir]"; ?></td>
                                </tr>
                                <tr>
                                    <td>Level :</td>
                                    <td><?php echo ucwords("$data[hak]"); ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Pengguna :</td>
                                    <td><?php echo "$data[username]"; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    &copy; 2021 | All Rights Reserved | Ndisan | Barley Bakery and Cake
                    <span class="pull-right">
                        <a href="home.php" class="btn btn-primary"><i class="glyphicon glyphicon-home"></i></a>
                        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#edit"><i class="glyphicon glyphicon-edit"></i></button>
                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i></button>
                    </span>
                    <br><br>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div id="edit" class="modal fade" role="dialog">
           <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Ubah Info</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                <form action="edit-user.php" method="POST">
                    <label>Nama</label><br>
                    <input type="text" class="form-control flat" name="nama" maxlength="20" placeholder="Nama" value="<?php echo "$data[nama]"; ?>" required/>
                    <label>Jenis Kelamin</label>
                    <select class="form-control flat" name="jenis_kelamin">
                        <?php $jk = $data['jenis_kelamin'];
                        echo "<option> $jk </option>";
                         if($jk == 'Laki - Laki'){
                            echo "<option> Perempuan </option>";
                         }else if($jk == "Perempuan"){
                            echo "<option> Laki - Laki </option>";
                         } ?>
                    </select>
                    <label>Tanggal Lahir</label><br>
                    <input type="date" class="form-control flat" name="tgl_lahir" maxlength="20" value="<?php echo "$data[tgl_lahir]"; ?>" required/>
                    <label>Nama Pengguna</label><br>
                    <input type="text" class="form-control flat" name="user" maxlength="20" placeholder="Username" value="<?php echo "$data[username]"; ?>" required/>
                    <label>Kata Sandi Lama</label><br>
                    <input type="password" class="form-control flat" name="pass_lama" maxlength="20" placeholder="Password Lama" required/>
                    <label>Kata Sandi Baru</label><br>
                    <input type="password" class="form-control flat" name="pass_baru" maxlength="20" placeholder="Password Baru" required/>
                    <br>                
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Batal</a>
                        <input type="submit" class="btn btn-success" value="OK">
                    </form>
                </div>
            </div>
        </div>
    </div>
        <!-- Modal Hapus -->
        <div id="hapus" class="modal fade" role="dialog">
           <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Hapus Akun</h4>
                </div>
                <!-- body modal -->
                <div class="modal-body">
                <form action="hapus-user.php" method="POST">
                    <input type="password" class="form-control flat" name="pass" maxlength="20" placeholder="Masukkan Password Anda.." required/>       
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                        <a class="btn btn-default" data-dismiss="modal">Batal</a>
                        <input type="submit" class="btn btn-danger" value="OK">
                    </form>
                </div>
            </div>
        </div>

    <!--jQUERY FILES-->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--BOOTSTRAP  FILES-->
    <script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>