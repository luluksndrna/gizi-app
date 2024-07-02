<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['user'])) {
    header("location: login.php");
}
?>

<?php 
include '../koneksi.php';
$sql1="SELECT * FROM pasien";

$query1=mysqli_query($conn,$sql1);


if (isset($_POST['submit'])) {
  $id_pasien= htmlspecialchars($_POST['id_pasien']);
  
  $sql2="SELECT * FROM pasien WHERE id_pasien='$id_pasien'";
  $query2=mysqli_query($conn,$sql2);
  $data_kamar=mysqli_fetch_assoc($query2);
  $waktu = htmlspecialchars($_POST["waktu"]);
  $diet = htmlspecialchars($_POST["diet"]);
  $kamar = $data_kamar['kamar'];
  $tanggal  = date("Y-m-d");
  $menu_utama = htmlspecialchars($_POST["menu_utama"]);
  $lauk_hewani = htmlspecialchars($_POST["lauk_hewani"]);
  $lauk_nabati = htmlspecialchars($_POST["lauk_nabati"]);
  $sayur = htmlspecialchars($_POST["sayur"]);
  $buah = htmlspecialchars($_POST["buah"]);
  $snack = htmlspecialchars($_POST["snack"]);

  $query_cek=mysqli_query($conn,"SELECT * FROM laporan WHERE id_pasien='$id_pasien' AND waktu='$waktu' AND tanggal='$tanggal'");
  $hasil_cek=mysqli_num_rows($query_cek);
    if ($hasil_cek > 0) {
    echo "<script>
                alert('data gagal ditambahkan karena sudah ada');
        </script>";
    }
    else{
        $sql2="INSERT INTO laporan VALUES (
                    
                    '', 
                    '$id_pasien', 
                    '$waktu',
                    '$kamar',
                    '$diet',
                    '$tanggal',
                    '$menu_utama',
                    '$lauk_hewani',
                    '$lauk_nabati',
                    '$sayur',
                    '$buah',
                    '$snack')";

        mysqli_query($conn,$sql2);
        $hasil=mysqli_affected_rows($conn);

        if ($hasil > 0) {
              echo "<script>
                      alert('data berhasil ditambahkan');
              </script>
              ";
          }else{
              echo "<script>
                      alert('data gagal ditambahkan');
              </script>";
          }
        }

 
}


 ?>


<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rumah Sakit Condog Catur</title>

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
      <h2>Rumah Sakit Condong Catur</h2>

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
  </header>

  <!-- Portfolio Section -->
  
  <!-- About Section -->

  <!-- Contact Section -->
  <section class="page-section" style="padding-top: 20px;" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <center><h2>Data Laporan Makanan Pasien</h2></center>

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
                  <h5>Id Pasien</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="id_pasien" name="id_pasien">
                      <?php while ($data1=mysqli_fetch_assoc($query1)) { ?>
                        
                        <option><?= $data1['id_pasien'] ?></option>
                      <?php } ?>
                  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <!-- <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Tanggal</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="name" type="date"  name="tanggal" readonly value="date" >
                  </div>       
                </div>
              </div>
            </div> -->
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Waktu</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" required="required" data-validation-required-message="Please enter your name." name="waktu">
                      <option>Pagi</option>
                      <option>Siang</option>
                      <option>Malam</option>  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
           
              <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Diet</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <input class="form-control" id="name" type="text"  name="diet">
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Menu Utama</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" required="required" data-validation-required-message="Please enter your name." name="menu_utama">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Lauk Hewani</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" required="required" data-validation-required-message="Please enter your name." name="lauk_hewani">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
              <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Lauk Nabati</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" required="required" data-validation-required-message="Please enter your name." name="lauk_nabati">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
              <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Sayur</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" required="required" data-validation-required-message="Please enter your name." name="sayur">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Buah</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" type="date"  required="required" data-validation-required-message="Please enter your name." name="buah">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h5>Snack</h5>
                </div>
                <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" type="date"  required="required" data-validation-required-message="Please enter your name." name="snack">
                      <option>0%</option>
                      <option>10%</option>
                      <option>25%</option>
                      <option>50%</option>
                      <option>75%</option>
                      <option>90%</option>
                      <option>100%</option>
                      </select>
                  </div>       
                </div>
              </div>
            </div>
            
            
            </div>
            </div>
            </div>
            <br>
            <div class="control-group">
              <div class="row">
                <div class="col-6 text-right">
                <button type="submit" name="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Simpan</button>
            </div>
             <div class="col-6">
              <a href="home.php" class="btn btn-primary btn-xl">Home</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <center>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Jl. Manggis No.6, Gempol, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta
            <br>Clark, MO 65243</p>
        </div></center>

        <!-- Footer Social Icons -->
       

        <!-- Footer About Text -->
        
  </footer>

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

  <!-- Portfolio Modals -->

  <!-- Portfolio Modal 1 -->
  
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
