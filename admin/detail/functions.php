<?php
 
include '../koneksi.php';


function tampil($query){
	global $conn;
	$i=mysqli_query($conn,$query);
	$rows=[];
	while ( $row=mysqli_fetch_assoc($i)) {
		$rows[]=$row;
	}
	return $rows;

}

function tambah($data){
	global $conn;
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$kamar = htmlspecialchars($data["kamar"]);
	$diet = htmlspecialchars($data["diet"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$menu_utama = htmlspecialchars($data["menu_utama"]);
	$lauk_hewani = htmlspecialchars($data["lauk_hewani"]);
	$lauk_nabati = htmlspecialchars($data["lauk_nabati"]);
	$sayur = htmlspecialchars($data["sayur"]);
	$buah = htmlspecialchars($data["buah"]);
	$snack = htmlspecialchars($data["snack"]);

	$query="INSERT INTO laporan VALUES ('', '$id_pasien', '$waktu','$kamar','$diet','$tanggal','$menu_utama','$lauk_hewani','$lauk_nabati','$sayur','$buah','$snack')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM laporan WHERE id_laporan=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM laporan WHERE id_laporan=$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_laporan = $data["id_laporan"];
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$kamar = htmlspecialchars($data["kamar"]); 
	$diet = htmlspecialchars($data["diet"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$menu_utama = htmlspecialchars($data["menu_utama"]);
	$lauk_hewani = htmlspecialchars($data["lauk_hewani"]);
	$lauk_nabati = htmlspecialchars($data["lauk_nabati"]);
	$sayur = htmlspecialchars($data["sayur"]);
	$buah = htmlspecialchars($data["buah"]);
	$snack = htmlspecialchars($data["snack"]);

	$query="UPDATE laporan SET 
			id_pasien = '$id_pasien',
			waktu = '$waktu',
			kamar = '$kamar',
			diet = '$diet',
			tanggal = '$tanggal',
			menu_utama = '$menu_utama',
			lauk_hewani = '$lauk_hewani',
			lauk_nabati = '$lauk_nabati',
			sayur = '$sayur',
			buah = '$buah',
			snack = '$snack'

			WHERE id_laporan = '$id_laporan'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM laporan
			WHERE 
			id_pasien LIKE '%$data%' OR
			waktu LIKE '%$data%' OR
			kamar LIKE '%$data%' OR
			diet LIKE '%$data%' OR
			tanggal LIKE '%$data%' OR
			menu_utama LIKE '%$data%' OR
			lauk_hewani LIKE '%$data%' OR
			lauk_nabati LIKE '%$data%' OR
			sayur LIKE '%$data%' OR
			buah LIKE '%$data%' OR
			snack LIKE '%$data%'
			
	";
	return tampil($query);
}
?>