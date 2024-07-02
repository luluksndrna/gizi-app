<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}


//koneksi ke data base
require 'functions.php';
//mangambil data dari $_GET yang dikirim dari index.php
$id_laporan=$_GET["id_laporan"];
//membuat query untuk menampilkan data pada input
$data=tampil("SELECT * FROM laporan WHERE id_laporan= '$id_laporan' ")[0];
//cek apakah tombol submit sudah di tekan
if (isset($_POST["submit"])) {
    
    //cek apakah data berhasil diubah
    if (ubah($_POST)>0) {
        echo "<script>
                alert('data berhasil diubah');
                document.location.href='index.php';
              </script>";
    }else{
        echo "<script>
                alert('tidak ada data yang dapat diubah');
            </script>";
    }

}

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Laporan</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php 
include 'menu.php';
 ?>
<div id="page-wrapper">
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                     <h1 class="page-header">Ubah Data</h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_laporan" value="<?php echo $data["id_laporan"]; ?>">
                                        <div class="form-group">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input class="form-control" type="text" name="id_pasien" id="id_pasien" required value="<?php echo $data["id_pasien"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu">Waktu</label>
                                            <select class="form-control" name="waktu" id="waktu" required value="<?php echo $data["waktu"]; ?>">
                                              <option>Pagi</option>
                                              <option>Siang</option>
                                              <option>Malam</option>
                                            </select>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="kamar">Kamar</label>
                                            <input class="form-control" type="text" name="kamar" id="kamar" required value="<?php echo $data["kamar"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="diet">Diet</label>
                                            <input class="form-control" type="text" name="diet" id="diet" required value="<?php echo $data["diet"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input class="form-control" type="date" name="tanggal" id="tanggal" required value="<?php echo $data["tanggal"]; ?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="menu_utama">Menu Utama</label>
                                            <select class="form-control" name="menu_utama" id="menu_utama" required value="<?php echo $data["menu_utama"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="lauk_hewani">Lauk Hewani</label>
                                            <select class="form-control" name="lauk_hewani" id="lauk_hewani" required value="<?php echo $data["lauk_hewani"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="lauk_nabati">Lauk Nabati</label>
                                            <select class="form-control" name="lauk_nabati" id="lauk_nabati" required value="<?php echo $data["lauk_nabati"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="sayur">Sayur</label>
                                            <select class="form-control" name="sayur" id="sayur" required value="<?php echo $data["sayur"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="buah">Buah</label>
                                            <select class="form-control" name="buah" id="buah" required value="<?php echo $data["buah"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="snack">Snack</label>
                                            <select class="form-control" name="snack" id="snack" required value="<?php echo $data["diet"]; ?>">
                                              <option>0%</option>
                                              <option>10%</option>
                                              <option>25%</option>
                                              <option>50%</option>
                                              <option>75%</option>
                                              <option>90%</option>
                                              <option>100%</option>
                                            </select>
                                        </div>
                                        <a class="btn btn-warning" href="index.php">batal</a>
                                        <button class="btn btn-primary" type="submit" name="submit">Perbarui</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>
</html>