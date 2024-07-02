<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['user'])) {
    header("location: login.php");
}
?>

<?php 
include '../koneksi.php';
$sql1="SELECT * FROM pasien WHERE kategori = 'umum'";
$query1=mysqli_query($conn,$sql1);

if (isset($_POST['submit'])) {

  $id_pasien= htmlspecialchars($_POST['id_pasien']);
  $protein = htmlspecialchars($_POST["protein"]);
  $karbohidrat = htmlspecialchars($_POST["karbohidrat"]);
  $lemak = htmlspecialchars($_POST["lemak"]);
  $fa = htmlspecialchars($_POST["fa"]);
  $fs = htmlspecialchars($_POST["fs"]);
  $tanggal  = date("Y-m-d");
  $waktu = htmlspecialchars($_POST["waktu"]);
  

  $sqlBEE  = mysqli_query($conn,"SELECT * FROM pasien WHERE id_pasien='$id_pasien'");
  $queryBEE=mysqli_fetch_assoc($sqlBEE);
  $BEE=$queryBEE["BEE"];
  $kalori=$BEE*$fa*$fs;
  $protein_gr=($kalori*($protein/100))/4;
  $karbo_gr=($kalori*($karbohidrat/100))/4;
  $lemak_gr=($kalori*($lemak/100))/9;

  $query_cek=mysqli_query($conn,"SELECT * FROM asupan WHERE id_pasien='$id_pasien' and tanggal='$tanggal' and waktu='$waktu'  ");
  $hasil_cek=mysqli_num_rows($query_cek);
    if ($hasil_cek > 0) {
    echo "<script>
                alert('data gagal ditambahkan karena sudah ada');
        </script>";
    }
    else{
        $sql2="INSERT INTO asupan VALUES (
                    
                    '', 
                    '$id_pasien',
                    '$kalori', 
                    '$protein',
                    '$karbohidrat',
                    '$lemak',
                    '$fa',
                    '$fs',
                    '$tanggal',
                    '$waktu',
                    '$protein_gr',
                    '$karbo_gr',
                    '$lemak_gr')";

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
      <center><h2>Hitung Sisa Makanan</h2></center>

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
                  <h6>Id Pasien</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="id_pasien" required="required"  name="id_pasien">
                      <?php while ($data1=mysqli_fetch_assoc($query1)) { ?>
                        
                        <option><?= $data1['id_pasien'] ?></option>
                      <?php } ?>
                  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
           <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Protein</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="name" type="text"  required="required" name="protein">
                      <option>-</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option> 
                      <option>18</option> 
                      <option>19</option>
                      <option>20</option>  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
           <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Karbohidrat</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <select class="form-control" id="karbohidrat" type="text"  required="required" name="karbohidrat">
                      <option>-</option>
                      <option>60</option>
                      <option>61</option>
                      <option>62</option> 
                      <option>63</option> 
                      <option>64</option>
                      <option>65</option>
                      <option>66</option>
                      <option>67</option>
                      <option>68</option> 
                      <option>69</option> 
                      <option>70</option> 
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Lemak</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="lemak" type="text" name="lemak">
                      <option>-</option>
                      <option>15</option>
                      <option>16</option>
                      <option>17</option> 
                      <option>18</option> 
                      <option>19</option>
                      <option>20</option>  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Faktor Aktifitas</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="fa" required="required" data-validation-required-message="Please enter your name." name="fa">
                      <option>-</option>
                      <option>1.2</option>
                      <option>1.3</option>
                      <option>1.4</option> 
                      <option>1.5</option> 
                      <option>1.75</option>  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Faktor Stress</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="fs" required="required"  name="fs">
                      <option>-</option>
                      <option>1</option>
                      <option>1.2</option>
                      <option>1.35</option> 
                      <option>1.3</option> 
                      <option>1.5</option>
                      <option>2.1</option>
                      <option>1.6</option>  
                    </select>
                  </div>       
                </div>
              </div>
            </div>
            
            <div class="control-group">
              <div class="row">
                <div class="col-2">
                  <h6>Waktu</h6>
                </div>
                 <div class="col-1"></div>
                <div class="col-9">
                  <div class="form-group floating-label-form-group controls mb-0 pb-2">
                    <select class="form-control" id="waktu"  name="waktu">
                      <option>-</option>
                      <option>Pagi</option>
                      <option>Siang</option>
                      <option>Malam</option> 
                    </select>
                  </div>       
                </div>
              </div>
            </div>

            </div>
            </div>
          </div>
            <br>
            
            <div id="success"></div>
            <div class="form-group"><center>
            <button type="submit" name="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Hitung</button></center>
              </div>
               <center>
             <div class="col-6">
              <a href="home.php" class="btn btn-primary btn-xl">Home</a></center>
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