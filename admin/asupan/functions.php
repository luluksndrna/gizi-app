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
	$id = htmlspecialchars($data["id"]);
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$kalori = htmlspecialchars($data["kalori"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbohidrat = htmlspecialchars($data["karbohidrat"]);
	$lemak = htmlspecialchars($data["lemak"]);
	$fa = htmlspecialchars($data["fa"]);
	$fs = htmlspecialchars($data["fs"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$waktu = htmlspecialchars($data["waktu"]);

	$query="INSERT INTO asupan VALUES ('', '$id','$id_pasien', '$kalori','$protein','$karbohidrat','$lemak','$fa','$fs','$tanggal','$waktu','$protein_gr','$karbo_gr','$lemak_gr')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM asupan WHERE id=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM asupan WHERE id=$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id = $data["id"];
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$kalori = htmlspecialchars($data["kalori"]);
	$protein = htmlspecialchars($data["protein"]); 
	$karbohidrat = htmlspecialchars($data["karbohidrat"]);
	$lemak = htmlspecialchars($data["lemak"]);
	$fa = htmlspecialchars($data["fa"]);
	$fs = htmlspecialchars($data["fs"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$waktu = htmlspecialchars($data["waktu"]);

	$query="UPDATE asupan SET 
			id_pasien = '$id_pasien',
			kalori = '$kalori',
			protein = '$protein',
			karbohidrat = '$karbohidrat',
			lemak = '$lemak',
			fa = '$fa',
			fs = '$fs',
			tanggal = '$tanggal',
			waktu = '$waktu',
			protein_gr = '$protein_gr',
			karbo_gr = '$karbo_gr',
			lemak_gr = '$lemak_gr'

			WHERE id = '$id'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM asupan
			WHERE 
			id_pasien LIKE '%$data%' OR
			kalori LIKE '%$data%' OR
			protein LIKE '%$data%' OR
			karbohidrat LIKE '%$data%' OR
			lemak LIKE '%$data%' OR
			fa LIKE '%$data%' OR
			fs LIKE '%$data%' OR
			tanggal LIKE '%$data%' OR
			waktu LIKE '%$data%' OR
			protein_gr LIKE '%$data%' OR
			karbo_gr LIKE '%$data%' OR
			lemak_gr LIKE '%$data%'
	";
	return tampil($query);
}
?>