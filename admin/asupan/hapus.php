<?php 
session_start();
if(empty($_SESSION['username']) or  empty($_SESSION['admin'])) {
    header("location:../../index.php");
    exit;
}

?>
<?php 
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['admin'])) {
	header("location:../../index.php");
    exit;
}

require 'functions.php';
$id=$_GET['id'];
if (hapus($id)>0) {
	echo "<script>
				alert('data berhasil dihapus');
				document.location.href='index.php';

		</script>


		";
}else{
	echo "<script>
				alert('data gagal dihapus');
				document.location.href='index.php';

		</script>
		";
}

?>