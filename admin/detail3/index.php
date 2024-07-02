<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

$id_pasien=$_GET['id_pasien'];
$tanggal=$_GET['tanggal'];
require 'functions.php';
$data_pasien    =mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'");

$laporan_pagi	=mysqli_query($conn,"SELECT * FROM pasiendm WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Pagi'");
$laporan_siang	=mysqli_query($conn,"SELECT * FROM pasiendm WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Siang'");
$laporan_malam	=mysqli_query($conn,"SELECT * FROM pasiendm WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Malam'");

$data1=mysqli_fetch_assoc($data_pasien);
$data_pagi=mysqli_fetch_assoc($laporan_pagi);
$data_siang=mysqli_fetch_assoc($laporan_siang);
$data_malam=mysqli_fetch_assoc($laporan_malam);


$laporan_pagi2   =mysqli_query($conn,"SELECT * FROM asupan2 WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Pagi'");
$laporan_siang2  =mysqli_query($conn,"SELECT * FROM asupan2 WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Siang'");
$laporan_malam2  =mysqli_query($conn,"SELECT * FROM asupan2 WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Malam'");


$data_pagi2=mysqli_fetch_assoc($laporan_pagi2);
$data_siang2=mysqli_fetch_assoc($laporan_siang2);
$data_malam2=mysqli_fetch_assoc($laporan_malam2);

if (isset($_POST["cari"])) {
	$laporan=cari($_POST["keyword"]);
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

    <title>Detail Data Laporan</title>

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

    <style type="text/css">
    	@media print{
    		.btn{
    			display: none;
    		}
    	}
    </style>


</head>
<body>
	<?php 
	include 'menu.php';

	if (isset($_POST["print"])) {
		echo "<script>
        		window.print();
    		</script>";
	}
	 ?>
	<!--<a href="tambah.php">tambah data guru</a><br><br>

	<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="masukan key pencarian..." autocomplete="off">
		<button type="submit" name="cari">cari!</button>
	</form>
	<br>-->
	
	<div id="page-wrapper">
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                	<h1>Detail Data Laporan</h1>
                	
                	<form action="" method="post">
                		<button class="btn btn-primary" name="print">Cetak Laporan</button>
                	</form>

                    <div class="panel">
                        <div class="panel-heading">
                        	<table>
                            <tr>
                            	<td>Nama</td>
                            	<td>           </td>
                            	<td>: <?= $data1['nama_pasien'] ?></td>
                            </tr>
                            <tr>
                            	<td>Kamar</td>
                            	<td>           </td>
                            	<td>: <?= $data1['kamar'] ?></td>
                            </tr>
                            
                            <tr>
                            	<td>Tanggal</td>
                            	<td>           </td>
                            	<td>: <?= $tanggal ?></td>
                            </tr>
                            </table>

                        </div>
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered">
								<thead class="thead-dark">
								<tr>
                                    <th>Waktu</th>
                                    <th>Zat Gizi</th>
									<th>Asupan</th>
									<th>Kebutuhan</th>
                                     <th>Persen(%)Asupan Dibanding Kebutuhan</th>
								
								</tr>
								</thead>
                                <tbody>
                                    <tr>
                                        <tr>
                                        <td rowspan="4">Pagi</td>
                                        <td>Kalori (Kkal/KgBB)</td>
                                        <td>: <?= $data_pagi2['kalori'] ?></td>
                                <td>: <?= $data_pagi['kalori'] ?></td>
                                 <td>: <?php error_reporting(0);
                                        $kalori=$data_pagi2['kalori']/$data_pagi['kalori']*'100';
                                  echo ''.$kalori.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Protein (gr)</td>
                                        <td>: <?= $data_pagi2['protein'] ?></td>
                                <td>: <?= $data_pagi['protein_gr'] ?></td>
                                 <td>: <?php error_reporting(0);
                                        $protein=$data_pagi2['protein']/$data_pagi['protein_gr']*'100';
                                  echo ''.$protein.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat (gr)</td>
                                        <td>: <?= $data_pagi2['karbo'] ?></td>
                                <td>: <?= $data_pagi['karbo_gr'] ?></td>
                                 <td>: <?php error_reporting(0);
                                        $karbo=$data_pagi2['karbo']/$data_pagi['karbo_gr']*'100';
                                  echo ''.$karbo.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Lemak (gr)</td>
                                        <td>: <?= $data_pagi2['lemak'] ?></td>
                                <td>: <?= $data_pagi['lemak_gr'] ?></td>
                                 <td>: <?php error_reporting(0);
                                        $lemak=$data_pagi2['lemak']/$data_pagi['lemak_gr']*'100';
                                  echo ''.$lemak.'%'; ?></td>
                                    </tr>


                                    <tr>
                                        <tr>
                                        <td rowspan="4">Siang</td>
                                        <td>Kalori (Kkal/KgBB)</td>
                                        <td>: <?= $data_siang2['kalori'] ?></td>
                                <td>: <?= $data_siang['kalori'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $kalori=$data_siang2['kalori']/$data_siang['kalori']*'100';
                                  echo ''.$kalori.'%'; error_reporting(0); ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Protein (gr)</td>
                                        <td>: <?= $data_siang2['protein'] ?></td>
                                <td>: <?= $data_siang['protein_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $protein=$data_siang2['protein']/$data_siang['protein_gr']*'100';
                                  echo ''.$protein.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat (gr)</td>
                                        <td>: <?= $data_siang2['karbo'] ?></td>
                                <td>: <?= $data_siang['karbo_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $karbo=$data_siang2['karbo']/$data_siang['karbo_gr']*'100';
                                  echo ''.$karbo.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Lemak (gr)</td>
                                        <td>: <?= $data_siang2['lemak'] ?></td>
                                <td>: <?= $data_siang['lemak_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $lemak=$data_siang2['lemak']/$data_siang['lemak_gr']*'100';
                                  echo ''.$lemak.'%'; ?></td>
                                    </tr>



                                    <tr>
                                        <tr>
                                        <td rowspan="4">Malam</td>
                                        <td>Kalori (Kkal/KgBB)</td>
                                        <td>: <?= $data_malam2['kalori'] ?></td>
                                <td>: <?= $data_malam['kalori'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $kalori=$data_malam2['kalori']/$data_malam['kalori']*'100';
                                  echo ''.$kalori.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Protein</td>
                                        <td>: <?= $data_malam2['protein'] ?></td>
                                <td>: <?= $data_malam['protein_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $protein=$data_malam2['protein']/$data_malam['protein_gr']*'100';
                                  echo ''.$protein.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Karbohidrat</td>
                                        <td>: <?= $data_malam2['karbo'] ?></td>
                                <td>: <?= $data_malam['karbo_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $karbo=$data_malam2['karbo']/$data_malam['karbo_gr']*'100';
                                  echo ''.$karbo.'%'; ?></td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Lemak</td>
                                        <td>: <?= $data_malam2['lemak'] ?></td>
                                <td>: <?= $data_malam['lemak_gr'] ?></td>
                                <td>: <?php error_reporting(0);
                                        $lemak=$data_malam2['lemak']/$data_malam['lemak_gr']*'100';
                                  echo ''.$lemak.'%'; ?></td>
                                    </tr>
                                   
                                </tbody>
                                
                                        
								
<!-- jQuery -->

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