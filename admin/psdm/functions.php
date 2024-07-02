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
	$tanggal = htmlspecialchars($data["tanggal"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$e_basal = htmlspecialchars($data["e_basal"]);
	$koreksiu = htmlspecialchars($data["koreksiu"]);
	$aktifitas = htmlspecialchars($data["aktifitas"]);
	$koreksibb = htmlspecialchars($data["koreksibb"]);
	$total_energi = htmlspecialchars($data["total_energi"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbo = htmlspecialchars($data["karbo"]);
	$lemak = htmlspecialchars($data["lemak"]);
	$ku = htmlspecialchars($data["ku"]);
	$ka = htmlspecialchars($data["ka"]);
	$kbb = htmlspecialchars($data["kbb"]);
	

	$query="INSERT INTO pasiendm VALUES ('', '$id','$id_pasien','$tanggal','$waktu', '$e_basal','$koreksiu','$aktifitas','$koreksibb','$total_energi','$protein','$karbo','$lemak','$ku','$ka','$kbb','$protein_gr','$karbo_gr','$lemak_gr')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM pasiendm WHERE id=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM pasiendm WHERE id=$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id = $data["id"];
	$id_pasien = htmlspecialchars($data["id_pasien"]);
	$tanggal = htmlspecialchars($data["tanggal"]);
	$waktu = htmlspecialchars($data["waktu"]);
	$e_basal = htmlspecialchars($data["e_basal"]);
	$koreksiu = htmlspecialchars($data["koreksiu"]);
	$aktifitas = htmlspecialchars($data["aktifitas"]);
	$koreksibb = htmlspecialchars($data["koreksibb"]);
	$total_energi = htmlspecialchars($data["total_energi"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbo = htmlspecialchars($data["karbo"]);
	$lemak = htmlspecialchars($data["lemak"]);
	$ku = htmlspecialchars($data["ku"]);
	$ka = htmlspecialchars($data["ka"]);
	$kbb = htmlspecialchars($data["kbb"]);

	$query="UPDATE pasiendm SET 
			id_pasien = '$id_pasien',
			tanggal = '$tanggal',
			waktu = '$waktu',
			e_basal = '$e_basal',
			koreksiu = '$koreksiu',
			aktifitas = '$aktifitas',
			koreksibb = '$koreksibb',
			total_energi = '$total_energi',
			protein = '$protein',
			karbo = '$karbo',
			lemak = '$lemak',
			ku = '$ku',
			ka = '$ka',
			kbb = '$kbb',
			protein_gr = '$protein_gr',
			karbo_gr = '$karbo_gr',
			lemak_gr = '$lemak_gr'

			WHERE id = '$id'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM pasiendm
			WHERE 
			id_pasien LIKE '%$data%' OR
			tanggal LIKE '%$data%' OR
			waktu LIKE '%$data%' OR
			e_basal LIKE '%$data%' OR
			koreksiu LIKE '%$data%' OR
			aktifitas LIKE '%$data%' OR
			koreksibb LIKE '%$data%' OR
			total_energi LIKE '%$data%' OR
			protein LIKE '%$data%' OR
			karbo LIKE '%$data%' OR
			lemak LIKE '%$data%' OR
			ku LIKE '%$data%' OR
			ka LIKE '%$data%' OR
			kbb LIKE '%$data%' OR
			protein_gr LIKE '%$data%' OR
			karbo_gr LIKE '%$data%' OR
			lemak_gr LIKE '%$data%'
	";
	return tampil($query);
}
?>