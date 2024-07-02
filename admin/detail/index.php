<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

$id_pasien=$_GET['id_pasien'];
$tanggal=$_GET['tanggal'];
require 'functions.php';
$data_pasien=mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'");

$laporan_pagi	=mysqli_query($conn,"SELECT * FROM laporan WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Pagi'");
$laporan_siang	=mysqli_query($conn,"SELECT * FROM laporan WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Siang'");
$laporan_malam	=mysqli_query($conn,"SELECT * FROM laporan WHERE id_pasien='$id_pasien' AND tanggal='$tanggal' AND waktu='Malam'");

$data1=mysqli_fetch_assoc($data_pasien);
$data_pagi=mysqli_fetch_assoc($laporan_pagi);
$data_siang=mysqli_fetch_assoc($laporan_siang);
$data_malam=mysqli_fetch_assoc($laporan_malam);

if (isset($_POST["cari"])) {
	$laporan=cari($_POST["keyword"]);
}

function centang($data){
									switch ($data) {
											case '0%':
												$hasil="<td>&radic;</td><td></td><td></td><td></td><td></td><td></td><td></td>";
												break;
												
											case '10%':
												$hasil="<td></td><td>&radic;</td><td></td><td></td><td></td><td></td><td></td>";
												break;
												
											case '25%':
												$hasil="<td></td><td></td><td>&radic;</td><td></td><td></td><td></td><td></td>";
												break;
												
											case '50%':
												$hasil="<td></td><td></td><td></td><td>&radic;</td><td></td><td></td><td></td>";
												break;
												
											case '75%':
												$hasil="
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>&radic;</td>
												<td></td>
												<td></td>
												";
												break;
												
											case '90%':
												$hasil="
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>&radic;</td>
												<td></td>
												";
												break;
												
											case '100%':
												$hasil="
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>&radic;</td>
												";
												break;
												
											default:
												$hasil="
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												";
												
												break;
										}
	return $hasil;
}

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
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
                            	<td>: <?= $data_pagi['kamar'] ?></td>
                            </tr>
                            <tr>
                            	<td>Diet</td>
                            	<td>           </td>
                            	<td>: <?= $data_pagi['diet'] ?></td>
                            </tr>
                            <tr>
                            	<td>Tanggal</td>
                            	<td>           </td>
                            	<td>: <?= $tanggal ?></td>
                            </tr>
                            </table>

                        </div>
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								<tr>
									
									<th rowspan="2">Waktu</th>
									<th rowspan="2">Jenis Makanan</th>
									<th colspan="7">Sisa Makanan</th>
				
								</tr>
								<tr>
									
										<th>0%</th>
										<th>10%</th>
										<th>25%</th>
										<th>50%</th>
										<th>75%</th>
										<th>90%</th>
										<th>100%</th>
									
								</tr>
								</thead>
								<tbody>
									<tr>
										<td rowspan="6">pagi</td>
										<td>bubur/nasi</td>
										<?php $ok=centang($data_pagi['lauk_hewani']);
											echo $ok; ?>
									</tr>
									<tr>
										<td>lauk hewani</td>
										<?php $ok=centang($data_pagi['lauk_hewani']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>lauk nabati</td>
										<?php $ok=centang($data_pagi['lauk_nabati']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>sayur</td>
										<?php $ok=centang($data_pagi['sayur']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>buah</td>
										<?php $ok=centang($data_pagi['buah']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>snack</td>
										<?php $ok=centang($data_pagi['snack']);
											echo $ok; ?>
									</tr>



									<tr>
										<td rowspan="6">siang</td>
										<td>bubur/nasi</td>
										<?php $ok=centang($data_siang['menu_utama']);
											echo $ok; ?>
									</tr>
									<tr>
										<td>lauk hewani</td>
										<?php $ok=centang($data_siang['lauk_hewani']);
											echo $ok; ?>
									</tr>
									<tr>
										<td>lauk nabati</td>
										<?php $ok=centang($data_siang['lauk_nabati']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>sayur</td>
										<?php $ok=centang($data_siang['sayur']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>buah</td>
										<?php $ok=centang($data_siang['buah']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>snack</td>
										<?php $ok=centang($data_siang['snack']);
											echo $ok; ?>
										
									</tr>
									


									<tr>
										<td rowspan="6">malam</td>
										<td>bubur/nasi</td>
										<?php $ok=centang($data_malam['menu_utama']);
											echo $ok; ?>
									</tr>
									<tr>
										<td>lauk hewani</td>
										<?php $ok=centang($data_malam['lauk_hewani']);
											echo $ok; ?>
									</tr>
									<tr>
										<td>lauk nabati</td>
										<?php $ok=centang($data_malam['lauk_nabati']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>sayur</td>
										<?php $ok=centang($data_malam['sayur']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>buah</td>
										<?php $ok=centang($data_malam['buah']);
											echo $ok; ?>
										
									</tr>
									<tr>
										<td>snack</td>
										<?php $ok=centang($data_malam['snack']);
											echo $ok; ?>
										
									</tr>
								</tbody>
							</table>
						</div>
			 			</div>
					</div>
				</div>	
			</div>
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