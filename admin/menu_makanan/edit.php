<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

//koneksi ke data base
require 'functions.php';
//mangambil data dari $_GET yang dikirim dari index.php
$id_menu=$_GET["id_menu"];
//membuat query untuk menampilkan data pada input
$data=tampil("SELECT * FROM menu_makanan WHERE id_menu= '$id_menu'")[0];
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

    <title>Data Menu Makanan</title>

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
                                        <input type="hidden" name="id_menu" value="<?php echo $data["id_menu"]; ?>">
                                        <div class="form-group">
                                            <label for="nama_menu">Nama Menu</label>
                                            <input class="form-control" type="text" name="nama_menu" id="nama_menu" required value="<?php echo $data["nama_menu"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="berat">Berat Makanan</label>
                                            <input class="form-control" type="text" name="berat" id="berat" required value="<?php echo $data["berat"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="kalori">Kalori</label>
                                            <input class="form-control" type="text" name="kalori" id="kalori" required value="<?php echo $data["kalori"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="protein">Protein</label>
                                            <input class="form-control" type="text" name="protein" id="protein" required value="<?php echo $data["protein"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="karbo">Karbohidrat</label>
                                            <input class="form-control" type="text" name="karbo" id="karbo" required value="<?php echo $data["karbo"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="lemak">Lemak</label>
                                            <input class="form-control" type="text" name="lemak" id="lemak" required value="<?php echo $data["lemak"]; ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="id_jenis">ID Jenis</label>
                                           <select name="id_jenis" class="form-control">
                                            <?php 
                                            $query_jenis=mysqli_query($conn,"SELECT * FROM jenis_makanan"); 
                                            while($data_jenis=mysqli_fetch_assoc($query_jenis)){?>
                                               <option value="<?= $data_jenis['id_jenis'] ?>"><?= $data_jenis['jenis'] ?></option>
                                           <?php } ?>
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