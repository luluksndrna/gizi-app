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
	$nama_pasien = htmlspecialchars($data["nama_pasien"]);
	$gender = htmlspecialchars($data["gender"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tanggal_masuk = htmlspecialchars($data["tanggal_masuk"]);
	$umur = htmlspecialchars($data["umur"]);
	$berat_badan = htmlspecialchars($data["berat_badan"]);
	$tinggi_badan = htmlspecialchars($data["tinggi_badan"]);
	$kamar = htmlspecialchars($data["kamar"]);

	if ($gender=='Pr') {
    # code...
	    $BEE=665+(9.6*$berat_badan)+(1.7*$tinggi_badan)-(4.7*$umur);
	    $e_basal=25*$berat_badan;
	  }else{
	    $BEE=66+(13.7*$berat_badan)+(5*$tinggi_badan)-(6.8*$umur);
	    $e_basal=30*$berat_badan;
	  }
	

	$query="INSERT INTO pasien VALUES (
									'$id_pasien', 
									'$nama_pasien',
									'$gender', 
									'$tanggal_lahir', 
									'$alamat',
									'$tanggal_masuk',
									'$umur',
									'$berat_badan',
									'$tinggi_badan',
									'$kamar',
									'$BEE', 
									'$e_basal')
									";

	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM pasien WHERE id_pasien='$data'";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM pasien WHERE id_pasien='$data'");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_pasien = $data["id_pasien"];
	$nama_pasien = htmlspecialchars($data["nama_pasien"]);
	$gender = htmlspecialchars($data["gender"]);
	$tanggal_lahir = htmlspecialchars($data["tanggal_lahir"]);
	$alamat = htmlspecialchars($data["alamat"]);
	$tanggal_masuk = htmlspecialchars($data["tanggal_masuk"]);
	$umur = htmlspecialchars($data["umur"]);
	$berat_badan = htmlspecialchars($data["berat_badan"]);
	$tinggi_badan = htmlspecialchars($data["tinggi_badan"]);
	$kamar = htmlspecialchars($data["kamar"]);
	$kamar = htmlspecialchars($data["BEE"]);

	$query="UPDATE pasien SET 
			nama_pasien = '$nama_pasien',
			gender = '$gender',
			tanggal_lahir = '$tanggal_lahir',
			alamat = '$alamat',
			tanggal_masuk = '$tanggal_masuk',
			umur = '$umur',
			berat_badan = '$berat_badan',
			tinggi_badan = '$tinggi_badan',
			kamar = '$kamar',
			BEE = '$BEE'
			WHERE id_pasien = '$id_pasien'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM pasien
			WHERE 
			nama_pasien LIKE '%$data%' OR
			gender LIKE '%$data%' OR
			tanggal_lahir LIKE '%$data%' OR
			alamat LIKE '%$data%' OR
			tanggal_masuk LIKE '%$data%' OR
			umur LIKE '%$data%' OR
			berat_badan LIKE '%$data%' OR
			tinggi_badan LIKE '%$data%' OR
			kamar LIKE '%$data%' OR
			BEE LIKE '%$data%'
			 
' 
	";
	return tampil($query);
}
?>