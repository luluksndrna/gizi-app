<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

require 'functions.php';

$query = "SELECT max(id_pasien) as maxKode FROM pasien";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$id_pasien = $data['maxKode'];

$noUrut = (int) substr($id_pasien, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;


$char = "PSN";
$newID = $char . sprintf("%03s", $noUrut);

//koneksi ke data base
$sql1="SELECT * FROM kamar";
$query1=mysqli_query($conn,$sql1);
//cek apakah tombol submit sudah di tekan
if (isset($_POST["submit"])) {
    
    //cek apakah data berhasil di tambahkan
    if (tambah($_POST)>0) {
        echo "<script>
                alert('data berhasil ditambahkan');
                document.location.href='index.php';

        </script>
        ";
    }else{
        echo "<script>
                alert('data gagal ditambahkan');
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Pasien</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="id_pasien">ID Pasien</label>
                                            <input class="form-control" type="text" value="<?= $newID ?>" name="id_pasien" id="id_pasien" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_pasien">Nama Pasien</label>
                                            <input class="form-control" type="text" name="nama_pasien" id="nama_pasien" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select class="form-control" type="text" name="gender" id="gender" required>
                                                <option>-</option>
                                                <option>Lk</option>
                                                <option>Pr</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" required>
                                        </div>
                                         <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" id="alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_masuk">Tanggal Masuk</label>
                                            <input class="form-control" type="date" name="tanggal_masuk" id="tanggal_masuk" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="alamat">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" id="alamat" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_masuk">Kategori Pasien</label>
                                            <select class="form-control" type="text" name="kategori" id="kategori" required>
                                                <option>-</option>
                                                <option>umum</option>
                                                <option>dm</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="umur">Umur</label>
                                            <input class="form-control" type="text" name="umur" id="umur" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="berat_badan">Berat Badan</label>
                                            <input class="form-control" type="text" name="berat_badan" id="berat_badan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tinggi_badan">Tinggi Badan</label>
                                            <input class="form-control" type="text" name="tinggi_badan" id="tinggi_badan" required>
                                        </div>
                                       
                                        <div class="form-group">
                                          <label for="kamar">Kamar</label>
                                            <select class="form-control" type="text" name="kamar" id="kamar" required>
                                                 <?php while ($data1=mysqli_fetch_assoc($query1)) { ?>
                                
                                                    <option><?= $data1['nama'] ?></option>
                                                        <?php } ?>
                                                </select>
                                        </div>
                                        
                                        <a class="btn btn-warning" href="index.php">batal</a>
                                        <button class="btn btn-primary" type="submit" name="submit">tambah</button>
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