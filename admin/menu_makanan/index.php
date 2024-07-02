<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}


require 'functions.php';
$menu_makanan=tampil("SELECT * FROM menu_makanan");

if (isset($_POST["cari"])) {
	$menu_makanan=cari($_POST["keyword"]);
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
                	<h1>Data Menu</h1>
                	<a class="btn btn-outline btn-primary" href="tambah.php">tambah data</a><br><br>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            
                        </div>
						<div class="panel-body">
							<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
								<tr>
									<th>No</th>
									<th>ID Menu</th>
									<th>Nama Menu</th>
									<th>Berat</th>
									<th>Kalori</th>
									<th>Protein</th>
									<th>Karbohidrat</th>
									<th>Lemak</th>
									<th>tindakan</th>

								</tr>
								</thead>
								<tbody>
								<?php 
								$no=0;
								foreach ($menu_makanan as $g) {
								
								$no++;
								?>	
								<tr>
									
									<td><?php echo $no; ?></td>
									<td><?php echo $g["id_menu"]; ?></td>
									<td><?php echo $g["nama_menu"]; ?></td>
									<td><?php echo $g["berat"]; ?></td>
									<td><?php echo $g["kalori"]; ?></td>
									<td><?php echo $g["protein"]; ?></td>
									<td><?php echo $g["karbo"]; ?></td>
									<td><?php echo $g["lemak"]; ?></td>
									<td>
										<a href="edit.php?id_menu=<?php echo $g["id_menu"]; ?>">edit</a> | 
										<a href="hapus.php?id_menu=<?php echo $g["id_menu"]; ?>" onclick="return confirm('apakah anda yakin ingin menghapus ini')">hapus</a>
									</td>
								</tr>
								<?php } ?>
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