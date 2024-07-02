<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

require 'functions.php';

$query = "SELECT max(id_menu) as maxKode FROM menu_makanan";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$id_menu = $data['maxKode'];

$noUrut = (int) substr($id_menu, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;


$char = "MNU";
$newID = $char . sprintf("%03s", $noUrut);


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
<head>
    <meta charset="utf-8">
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
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tambah Data Menu</h1>
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
                                            <label for="id_menu">ID Menu</label>
                                            <input class="form-control" type="text" value="<?= $newID ?>" name="id_menu" id="id_menu" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_menu">Nama Menu</label>
                                            <input class="form-control" type="text" name="nama_menu" id="nama_menu" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="berat">Berat Makanan</label>
                                            <input class="form-control" type="text" name="berat" id="berat" required>
                                        </div>
                                         <div class="form-group">
                                            <label for="kalori">Kalori</label>
                                            <input class="form-control" type="text" name="kalori" id="kalori" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="protein">Protein</label>
                                            <input class="form-control" type="text" name="protein" id="protein" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="karbo">Karbohidrat</label>
                                            <input class="form-control" type="text" name="karbo" id="karbo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="lemak">Lemak</label>
                                            <input class="form-control" type="text" name="lemak" id="lemak" required>
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