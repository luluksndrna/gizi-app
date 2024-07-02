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
	
	$username = htmlspecialchars($data["username"]);
	$password = md5 ($data["password"]);

	$query="INSERT INTO user VALUES ('', '$nama', '$username','$password')";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM user WHERE id_user=$data";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM user WHERE id_user=$data");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id_user = $data["id_user"];
	$nama = htmlspecialchars($data["nama"]);
	$username = htmlspecialchars($data["username"]);
	

	$query="UPDATE user SET 
			nama = '$nama',
			username = '$username'
			WHERE id_user = '$id_user'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM user
			WHERE 
			nama LIKE '%$data%' OR
			username LIKE '%$data%'  
	";
	return tampil($query);
}
?>