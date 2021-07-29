<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portofolio Salman Alfarissy</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/S.png" rel="icon">
  <link href="assets/img/S.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style1.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v1.5.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/profile-img1.jpg" alt="" class="img-fluid rounded-circle">
        <h1 class="text-light"><a href="index.html">Salman Alfarissy</a></h1>
        <div class="social-links mt-3 text-center">
          <a href="https://www.facebook.com/salman.alfarissy.5" class="facebook" target="_blank"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/alfarissy26/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
          <a href="https://mail.google.com/" class="mail" target="_blank"><i class="bx bx-mail-send"></i></a>
          <a href="https://api.whatsapp.com/send?phone=6282285032741" class="whatsapp" target="_blank"><i class="bx bxl-whatsapp"></i></a>
        </div>
      </div>

      <nav class="nav-menu">
        <ul>
          <li><a href="index.php"><i class="bx bx-home"></i> <span>Home</span></a></li>
          <li><a href="index.php?#about"><i class="bx bx-user"></i> <span>About</span></a></li>
          <li><a href="index.php?#resume"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>
          <li class="active"><a href="#portfolio-details"><i class="bx bx-book-content"></i> Portfolio</a></li>
          <!-- <li><a href="#services"><i class="bx bx-server"></i> Services</a></li> -->
          <li><a href="index.php?#contact"><i class="bx bx-envelope"></i> Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portfoio Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Portfoio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
            <?php 
            include "koneksi.php";
              $query = mysqli_query($koneksi,"SELECT * FROM project join kategori using(id_kategori) where project_id = '$_GET[project_id]'");
              $tampil=mysqli_fetch_array($query);
              echo "<img src='admin/image/slide1/$tampil[slide1]'' class='img-fluid' alt=''>";
              echo "<img src='admin/image/slide2/$tampil[slide2]'' class='img-fluid' alt=''>";
              echo "<img src='admin/image/slide3/$tampil[slide3]'' class='img-fluid' alt=''>";
              echo "<img src='admin/image/slide4/$tampil[slide4]'' class='img-fluid' alt=''>";
              echo "<img src='admin/image/slide5/$tampil[slide5]'' class='img-fluid' alt=''>";
            ?>
          </div>

          <div class="portfolio-info">
            <h3>Project Information</h3>
            <ul>
              <?php 
              $tanggal = date("j F, Y", strtotime($tampil['tanggal_project']));
              echo "<li><strong>Category</strong>: $tampil[nama_kategori] </li>
              <li><strong>Project Name</strong>: $tampil[nama_project]</li>
              <li><strong>Project date</strong>: $tanggal</li>
              <li><strong>Project URL</strong>: <a href='$tampil[url_project]' target='_blank'>$tampil[url_project]</a></li>"
              
              ?>

            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>Portfolio Detail</h2>
          <?php 
          echo $tampil['detail_project'];
          ?>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        <!-- &copy; Copyright <strong><span>iPortfolio</span></strong> -->
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>