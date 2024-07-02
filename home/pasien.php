<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['user'])) {
    header("location: login.php");
}
?>

<?php 
include '../koneksi.php';
$sql1="SELECT * FROM kamar";
$query1=mysqli_query($conn,$sql1);
  $query = "SELECT max(id_pasien) as maxKode FROM pasien";
  $hasil = mysqli_query($conn,$query);
  $data  = mysqli_fetch_array($hasil);
  $id_pasien = $data['maxKode'];

  $noUrut = (int) substr($id_pasien, 3, 3);

  // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
  $noUrut++;


  $char = "PSN";
  $newID = $char . sprintf("%03s", $noUrut);

if (isset($_POST['submit'])) {

  $nama_pasien= htmlspecialchars($_POST['nama_pasien']);
  $gender = htmlspecialchars($_POST["gender"]);
  $tanggal_lahir = htmlspecialchars($_POST["tanggal_lahir"]);
  
        $tl     = new DateTime($tanggal_lahir);
        $today  = new DateTime('today');
        $y      = $today->diff($tl)->y;
        $d      = $today->diff($tl)->d;
    
  $umur   = $y;
  $alamat = htmlspecialchars($_POST["alamat"]);
  $tanggal_masuk = htmlspecialchars($_POST["tanggal_masuk"]);
  $kategori = htmlspecialchars($_POST["kategori"]);
  
  $berat_badan = htmlspecialchars($_POST["berat_badan"]);
  $tinggi_badan = htmlspecialchars($_POST["tinggi_badan"]);
  $kamar = htmlspecialchars($_POST["kamar"]);

  if ($gender=='Pr') {
    # code...
    $BEE=665+(9.6*$berat_badan)+(1.7*$tinggi_badan)-(4.7*$umur);
    $brr=($berat_badan/($tinggi_badan-100))*(1);
  }else{
    $BEE=66+(13.7*$berat_badan)+(5*$tinggi_badan)-(6.8*$umur);
    $brr=($berat_badan/($tinggi_badan-100))*(1);
  }

        $sql2="INSERT INTO pasien VALUES (
                    
                    '$newID',  
                    '$nama_pasien',
                    '$gender',
                    '$tanggal_lahir',
                    '$alamat',
                    '$tanggal_masuk',
                    '$umur',
                    '$kategori',
                    '$berat_badan',
                    '$tinggi_badan',
                    '$kamar',
                    '$BEE',
                    '$brr')";

        mysqli_query($conn,$sql2);

         $hasil1=mysqli_affected_rows($conn);

        if ($hasil1 > 0) {
              echo "<script>
                      return alert('data berhasil ditambahkan');
              </script>";
               header("location: login.php");
          }else{
              echo "<script>
                      return alert('data gagal ditambahkan');
              </script>";
               header("location: login.php");
          }
      }
 ?>


<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rumah Sakit Condong Catur</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

  

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
      <div style="margin-top: -150px; margin-bottom: -80px">
      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/RS1.jpg" alt="">

      <!-- Masthead Heading -->
      <h2 >Rumah Sakit Condong Catur</h2>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Insatalasi Gizi Rumah Sakit</p>
      </div>
    </div>
  </header>

  <!-- Portfolio Section -->
  
  <!-- About Section -->

  <!-- Contact Section -->
  <section class="page-section" style="padding-top: 20px;" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
     <center> <h3>Data Pasien</h3></center>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-5 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="" method="post">
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>ID Pasien</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="id_pasien" type="text" name="id_pasien" value="<?= $newID ?>" readonly>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Nama</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="nama_pasien" type="text"  required="required" data-validation-required-message="Please enter your name." name="nama_pasien">
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Gender</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="gender" type required="required" data-validation-required-message="Please enter your name." name="gender">
                      <option>-</option>
                      <option>Lk</option>
                      <option>Pr</option> 
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Tanggal Lahir</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="tanggal_lahir" type="date" required  name="tanggal_lahir">
                    
                  </div>       
                </div>
              </div>
            </div>
            
           <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Alamat</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="alamat" type="text"  required="required" data-validation-required-message="Please enter your address." name="alamat">
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Tanggal Masuk</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="tanggal_masuk" type="date"  required="required" data-validation-required-message="Please enter your name." name="tanggal_masuk">
                        
                  </div>       
                </div>
              </div>
            </div>
           
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Berat Badan (Kg)</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="berat_badan" type="text"  required="required" data-validation-required-message="Please enter your address." name="berat_badan">
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Tinggi Badan (Cm)</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="tinggi_badan" type="text"  required="required" data-validation-required-message="Please enter your address." name="tinggi_badan">
                  </div>       
                </div>
              </div>
            </div>
            
              <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Kategori Pasien</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="kategori" type required="required" data-validation-required-message="Please enter your name." name="kategori">
                      <option>-</option>
                      <option value="umum">Pasien Umum</option>
                      <option value="dm">Pasien DM</option> 
                    </select>
                  </div>       
                </div>
              </div>
            </div>

            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Kamar</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="kamar" type="text"  required="required" name="kamar">
                      <?php while ($data1=mysqli_fetch_assoc($query1)) { ?>
                        
                        <option><?= $data1['nama'] ?></option>
                      <?php } ?>
                  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <br>
            <div id="success"></div>
            
            <div class="control-group">
              <div class="row">
                <div class="col-6 text-right">
             <a href="home.php" class="btn btn-primary btn-xl">Home</a>
            </div>
             <div class="col-6">
            <button type="submit" name="submit" class="btn btn-primary btn-xl">Simpan</button>
            </div>
          </div>
          </form>
        </div>
      </div>

    </div>
  </section>


  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <img class="img-fluid" src="img/portfolio/pc1.jpg" alt="">
    <small>Copyright &copy; Luluk-Informatika-UNRIYO</small>
    </div>
  </section>

  <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
  <div class="scroll-to-top d-lg-none position-fixed ">
    <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
      <i class="fa fa-chevron-up"></i>
    </a>
  </div>

  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
