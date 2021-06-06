<?php

include 'admin/connect.php';

if (isset($_GET['client'])) {

  // check if client exist

  $client = filter_var($_GET['client'], FILTER_SANITIZE_STRING);

  $stmt = $con->prepare("SELECT en_client FROM portfolio WHERE en_client = ?");
  $stmt->execute(array($client));
  $count = $stmt->rowCount();
  if ($count > 0) {

    // get work information 

    $stmt = $con->prepare("SELECT * FROM portfolio WHERE en_client = ?");
    $stmt->execute(array($client));
    $rows = $stmt->fetchAll();

    // the loop 
    foreach ($rows as $row) {
      $catagory = $row['en_catagory'];
      $description = $row['en_description'];
      $first_img = $row['first_img'];
      $sec_img = $row['sec_img'];
      $third_img = $row['third_img'];
      if ($row['en_catagory'] == 'Apps') {
        $link = '
        <li><a href="' . $row['ios_link'] . '"><strong>IOS url</strong></a>&nbsp;&nbsp;&nbsp;<a href="' . $row['android_link'] . '"><strong>Android url</strong></a></li>
        ';
      } else {
        $link = '
        <li><strong>Project URL</strong>: <a href="' . $row['link'] . '">' . $row['link'] . '</a></li>

        ';
      }
    }
  } else {
    header('location: index.php');
    exit();
  }
} else {
  header('location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio Details - Right Access </title>
  <meta content="right access is the partner of choice for many of the world’s 
    leading enterprises, SMEs and technology challengers. We help businesses elevate their value 
    through custom software development, product design, QA and consultancy services." name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/font awesome/all.min.css" rel="stylesheet" />
  <!--   Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto " href="index.php">Home</a></li>
            <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
            <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
            <li><a class="nav-link scrollto active" href="index.php#portfolio">projects</a></li>
            <li><a class="nav-link scrollto " href="index.php#technologies">technologies</a></li>
            <li><a class="nav-link scrollto " href="profile.php">Profile</a></li>
            <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
            <?php

            if (isset($_COOKIE['user'])) {
              echo '
<li><a class="nav-link scrollto" href="profile.php">Profile</a></li>
<li><a class="nav-link scrollto " href="login.php?logout=true">log out</a></li>

';
            } else {
              echo '
<li><a class="nav-link scrollto " href="login.php">login</a></li>
';
            }

            ?> 
            <li><a class="nav-link scrollto" href="ar/index.php">العربيه  </a></li>
            <li><a class="getstarted scrollto" href="login.php">Get Started</a></li>
          </ul>
          <i class="fas fa-bars mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">

    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8 portfolio-details-slider-pictures">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/<?php echo $third_img; ?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="assets/img/portfolio/<?php echo $sec_img; ?>" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="assets/img/portfolio/<?php echo $first_img; ?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Category</strong>: <?php echo $catagory; ?></li>
                <li><strong>Client</strong>: <?php echo $client; ?></li>
                <?php echo $link; ?>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>An example of Work details</h2>
              <p>
                <?php echo $description; ?>
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Right Access</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>

            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Mobile Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> UI/UX Design </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">QA & Testing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> ecommerce website </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">   ERP software </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Right Access</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!--   Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>