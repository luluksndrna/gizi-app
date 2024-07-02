<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}


//koneksi ke data base
require 'functions.php';
//mangambil data dari $_GET yang dikirim dari index.php
$id=$_GET["id"];
//membuat query untuk menampilkan data pada input
$data=tampil("SELECT * FROM pasiendm WHERE id= '$id' ")[0];
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
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Laporan Asupan Pasien DM</title>

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
                                            <label for="id">Id Asupan</label>
                                            <input class="form-control" type="text" name="id" id="id" required value="<?php echo $data["id"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="id_pasien">Id Pasien</label>
                                            <input class="form-control" type="text" name="id_pasien" id="id_pasien" required value="<?php echo $data["id_pasien"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="total_energi">Kalori</label>
                                            <input class="form-control" type="text" name="total_energi" id="total_energi" required value="<?php echo $data["total_energi"]; ?>">
                                        </div>
                                        
                                         <div class="form-group">
                                            <label for="protein">Protein</label>
                                            <select class="form-control" type="text" name="protein" id="protein" required value="<?php echo $data["protein"]; ?>">
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
                                            <select class="form-control" type="text" name="karbo" id="karbo" required value="<?php echo $data["karbo"]; ?>">
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
                                            <select class="form-control" type="text" name="lemak" id="lemak" required value="<?php echo $data["lemak"]; ?>">
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
                                            <select class="form-control" type="text" name="kkb" id="kbb" required value="<?php echo $data["kkb"]; ?>">
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
                                            <label for="ka">Faktor Aktifitas</label>
                                            <select class="form-control" type="text" name="ka" id="ka" required value="<?php echo $data["ka"]; ?>">
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
                                            <select class="form-control" type="text" name="fs" id="ku" required value="<?php echo $data["ku"]; ?>">
                                              <option>-</option>
                                              <option>5</option>
                                              <option>10</option>
                                              <option>20</option>  
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