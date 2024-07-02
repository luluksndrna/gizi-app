<?php 
session_start();
include 'koneksi.php';
$username=$_POST['username'];
$password=md5($_POST['password']);

$query="SELECT * FROM admin WHERE username='$username' AND password='$password'";
$sql=mysqli_query($conn,$query);
$row=mysqli_fetch_row($sql);
if ($row>0) {
	header("location: admin/index_admin.php");
	$_SESSION['username']=$username;
	$_SESSION['admin']=$username;
	
}else{
	
	header('location: index.php');
	
}
 ?>