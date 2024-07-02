<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['user'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

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

  <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

      <!-- Masthead Avatar Image -->
      <img class="masthead-avatar mb-5" src="img/RS1.jpg" alt="">

      <!-- Masthead Heading -->
      <h3 class=" ">Rumah Sakit Condong Catur</h3>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>


      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Instalasi Gizi Rumah Sakit</p>

    </div>
  </header>

  <!-- Portfolio Section -->
  <section class="page-section portfolio" id="portfolio">
    <div class="container">

      <!-- Portfolio Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Menu</h2>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Portfolio Grid Items -->
      <div class="row">
        <!-- Portfolio Item 1 -->
        <div class="col-4" style="margin-bottom: 80px;">
          <a href="info.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/format.png" alt="">
          </div>
         <center><p class="name"><b>Informasi Gizi</b></p>
          </a>
        </div>                 
        <!-- Portfolio Item 2 -->
        <div class="col-4">
          <a href="hitung1.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/kal.png" alt="">
          </div>
          <center><p class="name"><b>Hitung Asupan Pasien</b></p>
            </a>
        </div>
        <!-- Portfolio Item 3 -->
        <div class="col-4">
          <a href="laporan.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/lprn.png" alt="">
          </div>
          <center><p class="name"><b>Laporan Comstock</b></p>
            </a>
        </div>
        <!-- Portfolio Item 4 -->
        <div class="col-4">
          <a href="pasien.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/psnn.png" alt="">
          </div>
          <center><p class="name"><b>Pasien</b></p>
            </a>
        </div>
        <!-- Portfolio Item 4 -->
        <div class="col-4">
          <a href="menu_makanan.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/food.png" alt="">
          </div>
          <center><p class="name"><b>Menu Makanan</b></p>
            </a>
        </div>



        <!-- Portfolio Item 6 -->
        <div class="col-4">
          <a href="abt.php">
          <div class="portfolio-item mx-auto" data-toggle="modal">
            <img class="img-fluid" src="img/portfolio/apkl.png" alt="">
          </div>
          <center><p class="name"><b>Tentang Aplikasi</b></p>
          </center>
        </a>
        </div>

      </div>
      <!-- /.row -->

    </div>
  </section>

  <!-- About Section -->

 

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Location -->
        <center>
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Location</h4>
          <p class="lead mb-0">Jl. Manggis No.6, Gempol, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta
            <br> 55581</p>
        </div></center>

        <!-- Footer Social Icons -->
       

        <!-- Footer About Text -->
       

      </div>
    </div>
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
