<?php

include '../admin/connect.php';

if (isset($_GET['client'])) {

  // check if client exist

  $client = filter_var($_GET['client'], FILTER_SANITIZE_STRING);

  $stmt = $con->prepare("SELECT client FROM portfolio WHERE client = ?");
  $stmt->execute(array($client));
  $count = $stmt->rowCount();
  if ($count > 0) {

    // get work information 

    $stmt = $con->prepare("SELECT * FROM portfolio WHERE client = ?");
    $stmt->execute(array($client));
    $rows = $stmt->fetchAll();

    // the loop 
    foreach ($rows as $row) {
      $catagory = $row['catagory'];
      $description = $row['description'];
      $first_img = $row['first_img'];
      $sec_img = $row['sec_img'];
      $third_img = $row['third_img'];
      if ($row['en_catagory'] == 'Apps') {
        $link = '
        <li><a href="' . $row['ios_link'] . '"><strong>رابط Ios</strong></a>&nbsp;&nbsp;&nbsp;<a href="' . $row['android_link'] . '"><strong>رابط الاندرويد</strong></a></li>
        ';
      } else {
        $link = '
        <li><strong>رابط الموقع</strong>: <a href="' . $row['link'] . '">' . $row['link'] . '</a></li>

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
  <meta content="Right access هو الشريك المفضل للعديد 
  من الشركات الرائدة في العالم والشركات الصغيرة والمتوسطة
   ومنافسي التكنولوجيا. نحن نساعد الشركات على
    رفع قيمتها من خلال تطوير و تصميم المواقع  ، وتطبيقات الجوال بجميع انواعها  
   ، وأختبار البرمجيات  ،  و ايضا تصميم الواجهات للمواقع و التطبيقات ." name="description">  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/vendor/font awesome/all.min.css" rel="stylesheet" />
  <!--   Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <style>
    *,
    .why-us .accordion-list a,
    #hero .btn-get-started,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .counts .count-box a,
    .section-title p,
    .cta .cta-btn,
    .about .content .btn-learn-more {
      font-family: 'Cairo', sans-serif;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" dir="rtl">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.php">Right Access</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php#hero">الرئيسيه</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">عنا</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">خدماتنا</a></li>
          <li><a class="nav-link scrollto active" href="index.php#portfolio">معرض اعمالنا</a></li>
          <li><a class="nav-link scrollto " href="index.php#technologies">التقنيات</a></li>
          <li><a class="nav-link scrollto" href="contact.php">تواصل معنا</a></li>
          <?php

          if (isset($_COOKIE['user'])) {
            echo '
  <li><a class="nav-link scrollto " href="profile.php">البروفايل</a></li>
  <li><a class="nav-link scrollto " href="login.php?logout=true">تسجيل الخروج</a></li>

  ';
          } else {
            echo '
  <li><a class="nav-link scrollto " href="login.php">تسجيل الدخول</a></li>
  ';
          }

          ?>
          <li><a class="nav-link scrollto" href="../index.php">English </a></li>
          <li><a class="getstarted scrollto" href="login.php">ابدأ رحلتك </a></li>

        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->
  </div>
  </header><!-- End Header -->

  <main id="main" dir="rtl">

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
                  <img src="../assets/img/portfolio/<?php echo $third_img; ?>" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="../assets/img/portfolio/<?php echo $sec_img; ?>" alt="">
                </div>
                <div class="swiper-slide">
                  <img src="../assets/img/portfolio/<?php echo $first_img; ?>" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3> معلومات المشروع</h3>
              <ul>
                <li><strong>القسم</strong>: <?php echo $catagory; ?></li>
                <li><strong>اسم العميل</strong>: <?php echo $client; ?></li>
                <?php echo $link; ?>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>تفاصيل العمل</h2>
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
  <footer id="footer" dir="rtl">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <p>
                المملكة العربية السعودية - الرياض
                <br>
                - طريق الملك فهد - برج حمد<br><br>
                <strong>هاتف : </strong> 966559275722+ <br>
                <strong>ايميل : </strong> info@rightaccess.co<br>
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
            <h4> روابط سريعه</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#">الرئيسيه</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about"> عنا</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">خدماتنا</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>خدماتنا </h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> تطوير مواقع</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> تطوير تطبيفات</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> تصاميم UI/UX </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">فحص و اختبار البرمجيات </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> مواقع تجاره الكترونيه </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services"> براجم اداره الشركات </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4> انضم لقايمتنا البريديه</h4>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="انضم">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; حقوق ملكيه <strong><span>Right Access</span></strong> .كل الحقوق محفوظه
      </div>
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!--   Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>