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
	$kalori = htmlspecialchars($data["kalori"]);
	$protein_gr = htmlspecialchars($data["protein_gr"]);
	$karbo_gr = htmlspecialchars($data["karbo_gr"]);
	$lemak_gr = htmlspecialchars($data["lemak_gr"]);
	

	$query="INSERT INTO asupan VALUES ('', '$id_pasien', '$waktu','$kamar','$diet','$tanggal','$kalori','$protein','$karbo','$lemak')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM asupan WHERE id=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM asupan WHERE id =$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_laporan = $data["id"];
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$kamar = htmlspecialchars($data["kamar"]); 
	$diet = htmlspecialchars($data["diet"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$kalori = htmlspecialchars($data["kalori"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbo = htmlspecialchars($data["karbo"]);
	$lemak = htmlspecialchars($data["lemak"]);
	

	$query="UPDATE asupan SET 
			id_pasien = '$id_pasien',
			waktu = '$waktu',
			kamar = '$kamar',
			diet = '$diet',
			tanggal = '$tanggal',
			kalori = '$kalori',
			protein = '$protein',
			karbo = '$karbo',
			lemak = '$lemak'
			

			WHERE id = '$id'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM asupan
			WHERE 
			id_pasien LIKE '%$data%' OR
			waktu LIKE '%$data%' OR
			kamar LIKE '%$data%' OR
			diet LIKE '%$data%' OR
			tanggal LIKE '%$data%' OR
			kalori LIKE '%$data%' OR
			protein LIKE '%$data%' OR
			karbo LIKE '%$data%' OR
			lemak LIKE '%$data%' 
			
			
	";
	return tampil($query);
}
?>