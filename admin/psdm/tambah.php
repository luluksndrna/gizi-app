<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}


//koneksi ke data base
require 'functions.php';

$data=mysqli_query($conn,"SELECT * FROM asupan");
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Laporan Asupan Makanan Pasien DM</title>

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
                    <h1 class="page-header">Tambah Data Laporan Asupan Pasien</h1>
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
                                            <select class="form-control" name="id_pasien" id="id_pasien" required>
                                              <?php

                                                foreach ( $data as $d ) { ?>
                                                    <option value="<?php echo $d["id_pasien"] ?>"><?php echo $d["id_pasien"] ?></option>
                                                <?php  }

                                              ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal</label>
                                            <input class="form-control" name="tanggal" type="date" id="tanggal" required>
                                              
                                        </div>
                                        <div class="form-group">
                                            <label for="waktu">Waktu</label>
                                            <input class="form-control" name="waktu" id="waktu" required>
                                              
                                        </div>
                                        <div class="form-group">
                                            <label for="total_energi">Kalori</label>
                                            <input class="form-control" name="total_energi" id="exampleFormControlSelect1">
                                        </div>
                                        <div class="form-group">
                                            <label for="protein">Protein</label>
                                            <select class="form-control" type="text" name="protein" id="protein" required>
                                                  <option>-</option>
                                                  <option>15</option>
                                                  <option>16</option>
                                                  <option>17</option> 
                                                  <option>18</option> 
                                                  <option>19</option>
                                                  <option>20</option>  
                                              </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="karbo">Karbohidrat</label>
                                            <select class="form-control" type="text" name="karbo" id="karbo" required>
                                                  <option>-</option>
                                                  <option>60</option>
                                                  <option>61</option>
                                                  <option>62</option> 
                                                  <option>63</option> 
                                                  <option>64</option>
                                                  <option>65</option>
                                                  <option>66</option>
                                                  <option>67</option>
                                                  <option>68</option> 
                                                  <option>69</option> 
                                                  <option>70</option> 
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lemak">Lemak</label>
                                            <select class="form-control" type="text" name="lemak" id="lemak" required>
                                                  <option>-</option>
                                                  <option>15</option>
                                                  <option>16</option>
                                                  <option>17</option> 
                                                  <option>18</option> 
                                                  <option>19</option>
                                                  <option>20</option>  
                                                </select>
                                              </div>
                                        <div class="form-group">
                                            <label for="kbb">Faktor Berat Badan</label>
                                            <select class="form-control" type="text" name="kbb" id="kbb" required>
                                                  <option>-</option>
                                                  <option>20</option>
                                                  <option>21</option>
                                                  <option>22</option> 
                                                  <option>23</option> 
                                                  <option>24</option> 
                                                  <option>25</option>
                                                  <option>26</option>
                                                  <option>27</option> 
                                                  <option>28</option> 
                                                  <option>29</option>
                                                  <option>30</option>   
                                            </select>
                                          </div>
                                        <div class="form-group">
                                            <label for="ka">Faktor Aktivitas</label>
                                            <select class="form-control" name="ka" id="ka" required>
                                              <option>-</option>
                                              <option>10</option>
                                              <option>20</option>
                                              <option>30</option> 
                                              <option>40</option> 
                                              <option>50</option>  
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ku">Faktor Umur</label>
                                            <select class="form-control" name="ku" id="ku" required>
                                              <option>-</option>
                                              <option>5</option>
                                              <option>10</option>
                                              <option>20</option>  
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