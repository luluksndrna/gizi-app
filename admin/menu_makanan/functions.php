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
	$id_menu = htmlspecialchars($data["id_menu"]);
	$id_jenis = htmlspecialchars($data["id_jenis"]);
	$nama_menu = htmlspecialchars($data["nama_menu"]);
	$berat = htmlspecialchars($data["berat"]);
	$kalori = htmlspecialchars($data["kalori"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbo = htmlspecialchars($data["karbo"]);
	$lemak = htmlspecialchars($data["lemak"]);

	$query="INSERT INTO menu_makanan VALUES ('$id_menu',
											'$id_jenis', 
											'$nama_menu',
											'$berat',
											'$kalori', 
											'$protein', 
											'$karbo', 
											'$lemak'
										)";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function hapus($data){
	global $conn;
	$query="SELECT * FROM menu_makanan WHERE id_menu='$data'";
	$sql=mysqli_query($conn,$query);
	$hapus=mysqli_fetch_assoc($sql);
	mysqli_query($conn,"DELETE FROM menu_makanan WHERE id_menu='$data'");
	return mysqli_affected_rows($conn);

}

function ubah($data){
	global $conn;
	$id_menu = $data["id_menu"];
	$nama_menu = htmlspecialchars($data["nama_menu"]);
	$id_jenis = htmlspecialchars($data["id_jenis"]);
	$berat = htmlspecialchars($data["berat"]);
	$kalori = htmlspecialchars($data["kalori"]);
	$protein = htmlspecialchars($data["protein"]);
	$karbo = $data["karbo"];
	$lemak = htmlspecialchars($data["lemak"]);
	
	
	$query="UPDATE menu_makanan SET 
			nama_menu = '$nama_menu',
		    id_jenis = '$id_jenis',
			berat = '$berat',
			kalori = '$kalori',
			protein = '$protein',
			karbo = '$karbo',
			lemak = '$lemak'
			WHERE id_menu = '$id_menu'

		";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($data){
	$query="SELECT * FROM menu_makanan
			WHERE 
			nama_menu LIKE '%$data%' OR
			berat LIKE '%$data%' OR
			kalori LIKE '%$data%' OR
			protein LIKE '%$data%' OR
			karbo LIKE '%$data%' OR
			lemak LIKE '%$data%' 
		
	";
	return tampil($query);
}
?>