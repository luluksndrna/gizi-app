<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

//koneksi ke data base
require 'functions.php';
//mangambil data dari $_GET yang dikirim dari index.php
$id_pasien=$_GET["id_pasien"];
//membuat query untuk menampilkan data pada input
$data=tampil("SELECT * FROM pasien WHERE id_pasien= '$id_pasien'")[0];
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

    <title>Data Pasien</title>

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
                     <h1 class="page-header">Ubah Data Pasien</h1>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_pasien" value="<?php echo $data["id_pasien"]; ?>">
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama</label>
                                            <input class="form-control" type="text" name="nama_pasien" id="nama_pasien" required value="<?php echo $data["nama_pasien"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                        <option> <?= $data['gender'] ?> </option>
                                                <option>Lk</option>
                                                <option>Pr</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required value="<?php echo $data["tanggal_lahir"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" id="alamat" required value="<?php echo $data["alamat"]; ?>">
                                        </div>
                                         <div class="form-group">
                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                            <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk" required value="<?php echo $data["tanggal_masuk"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kategori">Kategori Pasien</label>
                                            <select class="form-control" type="text" name="kategori" id="kategori" required value="<?php echo $data["kategori"]; ?>">
                                                <option> <?= $data['kategori'] ?> </option>
                                                <option>umum</option>
                                                <option>dm</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="umur">Umur</label>
                                            <input class="form-control" type="text" name="umur" id="umur" required value="<?php echo $data["umur"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="berat_badan">Berat Badan</label>
                                            <input class="form-control" type="text" name="berat_badan" id="berat_badan" required value="<?php echo $data["berat_badan"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tinggi_badan">Tinggi Badan</label>
                                            <input class="form-control" type="text" name="tinggi_badan" id="tinggi_badan" required value="<?php echo $data["tinggi_badan"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kamar">Kamar</label>
                                            <input class="form-control" type="text" name="kamar" id="kamar" required value="<?php echo $data["kamar"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="BEE">BEE</label>
                                            <input class="form-control" type="text" name="BEE" id="BEE" required value="<?php echo $data["BEE"]; ?>">
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