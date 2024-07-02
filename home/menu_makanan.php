<?php
session_start();
if (empty($_SESSION['username']) or empty($_SESSION['user'])) {
  header("location: login.php");
}
?>

<?php
include '../koneksi.php';
$sql = "SELECT * FROM pasien";
$sql1 = "SELECT * FROM menu_makanan WHERE id_jenis=1";
$sql2 = "SELECT * FROM menu_makanan WHERE id_jenis=2";
$sql3 = "SELECT * FROM menu_makanan WHERE id_jenis=3";
$sql4 = "SELECT * FROM menu_makanan WHERE id_jenis=4";
$sql5 = "SELECT * FROM menu_makanan WHERE id_jenis=5";
$sql6 = "SELECT * FROM menu_makanan WHERE id_jenis=6";
$query = mysqli_query($conn, $sql);
$query1 = mysqli_query($conn, $sql1);
$query2 = mysqli_query($conn, $sql2);
$query3 = mysqli_query($conn, $sql3);
$query4 = mysqli_query($conn, $sql4);
$query5 = mysqli_query($conn, $sql5);
$query6 = mysqli_query($conn, $sql6);
// $query7 = mysqli_query($conn, $sql7);

if (isset($_POST['submit'])) {


  $id_pasien = htmlspecialchars($_POST["id_pasien"]);
  $tanggal = htmlspecialchars($_POST["tanggal"]);
  $waktu = htmlspecialchars($_POST["waktu"]);
  $menu_utama = htmlspecialchars($_POST["menu_utama"]);
  $lauk_hewani = htmlspecialchars($_POST["lauk_hewani"]);
  $lauk_nabati = htmlspecialchars($_POST["lauk_nabati"]);
  $sayur = htmlspecialchars($_POST["sayur"]);
  $buah = htmlspecialchars($_POST["buah"]);
  $snack = htmlspecialchars($_POST["snack"]);


  $sqlmenu_utama  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$menu_utama'");
  $querymenu_utama = mysqli_fetch_assoc($sqlmenu_utama);
  $menu_utama_kalori = $querymenu_utama["kalori"];
  $menu_utama_protein = $querymenu_utama["protein"];
  $menu_utama_karbo = $querymenu_utama["karbo"];
  $menu_utama_lemak = $querymenu_utama["lemak"];

  $sqllauk_hewani  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$lauk_hewani'");
  $querylauk_hewani = mysqli_fetch_assoc($sqllauk_hewani);
  $lauk_hewani_kalori = $querylauk_hewani["kalori"];
  $lauk_hewani_protein = $querylauk_hewani["protein"];
  $lauk_hewani_karbo = $querylauk_hewani["karbo"];
  $lauk_hewani_lemak = $querylauk_hewani["lemak"];

  $sqllauk_nabati  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$lauk_nabati'");
  $querylauk_nabati = mysqli_fetch_assoc($sqllauk_nabati);
  $lauk_nabati_kalori = $querylauk_nabati["kalori"];
  $lauk_nabati_protein = $querylauk_nabati["protein"];
  $lauk_nabati_karbo = $querylauk_nabati["karbo"];
  $lauk_nabati_lemak = $querylauk_nabati["lemak"];

  $sqlsayur  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$sayur'");
  $querysayur = mysqli_fetch_assoc($sqlsayur);
  $sayur_kalori = $querysayur["kalori"];
  $sayur_protein = $querysayur["protein"];
  $sayur_karbo = $querysayur["karbo"];
  $sayur_lemak = $querysayur["lemak"];

  $sqlbuah  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$buah'");
  $querybuah = mysqli_fetch_assoc($sqlbuah);
  $buah_kalori = $querybuah["kalori"];
  $buah_protein = $querybuah["protein"];
  $buah_karbo = $querybuah["karbo"];
  $buah_lemak = $querybuah["lemak"];

  $sqlsnack  = mysqli_query($conn, "SELECT * FROM menu_makanan WHERE id_menu='$snack'");
  $querysnack = mysqli_fetch_assoc($sqlsnack);
  $snack_kalori = $querysnack["kalori"];
  $snack_protein = $querysnack["protein"];
  $snack_karbo = $querysnack["karbo"];
  $snack_lemak = $querysnack["lemak"];

  $kalori = $menu_utama_kalori + $lauk_nabati_kalori + $lauk_hewani_kalori + $sayur_kalori + $buah_kalori + $snack_kalori;
  $protein = $menu_utama_protein + $lauk_nabati_protein + $lauk_hewani_protein + $sayur_protein + $buah_protein + $snack_protein;
  $karbo = $menu_utama_karbo + $lauk_nabati_karbo + $lauk_hewani_karbo + $sayur_karbo + $buah_karbo + $snack_karbo;
  $lemak = $menu_utama_lemak + $lauk_nabati_lemak + $lauk_hewani_lemak + $sayur_lemak + $buah_lemak + $snack_lemak;

  $sql2 = "INSERT INTO asupan2 VALUES (
                    
                     '',  
                    '$id_pasien',
                    '$tanggal',
                    '$waktu',
                    '$kalori',
                    '$protein',
                    '$karbo',
                    '$lemak')";

  mysqli_query($conn, $sql2);

  $hasil = mysqli_affected_rows($conn);

  if ($hasil > 0) {
    echo "<script>
                      alert('data berhasil ditambahkan');
              </script>
              ";
  } else {
    echo "<script>
                      alert('data gagal ditambahkan');
              </script>";
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
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">

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
            <center>
                <h2>Data Makanan</h2>
            </center>

            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>

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
                                        <select class="form-control" id="id_pasien" required="required"
                                            name="id_pasien">
                                            <?php while ($data1 = mysqli_fetch_assoc($query)) { ?>
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
                                    <h6>Tanggal</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <input class="form-control" type="text" id="tanggal" required="required"
                                            readonly name="tanggal" value="<?php echo date('Y-m-d') ?>">
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
                                        <select class="form-control" id="waktu" required="required" name="waktu">
                                            <option>-</option>
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
                                    <h6>Menu Utama</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <select class="form-control" name="menu_utama">
                                            <?php while ($data2 = mysqli_fetch_assoc($query1)) { ?>
                                            <option value="<?= $data2['id_menu'] ?>"><?= $data2['nama_menu'] ?>
                                                <?= $data2['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Lauk Hewani</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <select class="form-control" name="lauk_hewani">
                                            <?php while ($data3 = mysqli_fetch_assoc($query2)) { ?>
                                            <option value="<?= $data3['id_menu'] ?>"><?= $data3['nama_menu'] ?>
                                                <?= $data3['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Lauk Nabati</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <select class="form-control" name="lauk_nabati">
                                            <?php while ($data4 = mysqli_fetch_assoc($query3)) { ?>
                                            <option value="<?= $data4['id_menu'] ?>"><?= $data4['nama_menu'] ?>
                                                <?= $data4['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Sayur</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group">
                                        <select class="form-control" name="sayur">
                                            <?php while ($data5 = mysqli_fetch_assoc($query4)) { ?>
                                            <option value="<?= $data5['id_menu'] ?>"><?= $data5['nama_menu'] ?>
                                                <?= $data5['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Buah</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group ">
                                        <select class="form-control" name="buah">
                                            <?php while ($data6 = mysqli_fetch_assoc($query5)) { ?>
                                            <option value="<?= $data6['id_menu'] ?>"><?= $data6['nama_menu'] ?>
                                                <?= $data6['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="row">
                                <div class="col-2">
                                    <h6>Snack</h6>
                                </div>
                                <div class="col-1"></div>
                                <div class="col-9">
                                    <div class="form-group ">
                                        <select class="form-control" name="snack">
                                            <?php while ($data7 = mysqli_fetch_assoc($query6)) { ?>
                                            <option value="<?= $data7['id_menu'] ?>"><?= $data7['nama_menu'] ?>
                                                <?= $data7['berat'] ?> gram </option>
                                            <?php } ?>
                                        </select>
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
                        <button type="submit" name="submit" class="btn btn-primary btn-xl"
                            id="sendMessageButton">Simpan</button></center>
                    </div>
                    <div class="col-6">
                        <a href="home.php" class="btn btn-primary btn-xl">Home</a>
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

    <script src="../assets/js/jquery-3.2.1.min.js"></script>

    <!-- Memanggil Autocomplete.js -->
    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#menu_utama").autocomplete({
            serviceUrl: "menu_utama.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#menu_utama").val("" + suggestion.menu_utama);
            }
        });
    })
    </script>

    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#lauk_hewani").autocomplete({
            serviceUrl: "lauk_hewani.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#lauk_hewani").val("" + suggestion.lauk_hewani);
            }
        });
    })
    </script>

    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#lauk_nabati").autocomplete({
            serviceUrl: "lauk_nabati.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#lauk_nabati").val("" + suggestion.lauk_nabati);
            }
        });
    })
    </script>

    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#sayur").autocomplete({
            serviceUrl: "sayur.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#sayur").val("" + suggestion.sayur);
            }
        });
    })
    </script>

    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#buah").autocomplete({
            serviceUrl: "buah.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#buah").val("" + suggestion.buah);
            }
        });
    })
    </script>

    <script src="../assets/js/jquery.autocomplete.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

        // Selector input yang akan menampilkan autocomplete.
        $("#snack").autocomplete({
            serviceUrl: "snack.php", // Kode php untuk prosesing data.
            dataType: "JSON", // Tipe data JSON.
            onSelect: function(suggestion) {
                $("#snack").val("" + suggestion.snack);
            }
        });
    })
    </script>

</body>

</html>