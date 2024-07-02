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
	$nama = htmlspecialchars($data["nama"]);
	

	$query="INSERT INTO kamar VALUES ('', '$nama')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM kamar WHERE id_kamar=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM kamar WHERE id_kamar=$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_kamar = $data["id_kamar"];
	$nama = htmlspecialchars($data["nama"]);
	
	
	$query="UPDATE kamar SET 
			nama = '$nama' 
			
			WHERE id_kamar = '$id_kamar'";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM kamar
			WHERE 
			nama LIKE '%$data%' 
			 
	";
	return tampil($query);
}
?>