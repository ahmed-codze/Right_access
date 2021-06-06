<?Php

include '../admin/connect.php';

$name = '';
$email = '';


if (isset($_COOKIE['user'])) {

    $stmt = $con->prepare("SELECT * FROM users WHERE user_key = ?");
    $stmt->execute(array($_COOKIE['user']));
    $rows = $stmt->fetchAll();
    foreach ($rows as $row) {
        $name = $row['name'];
        $email = $row['email'];
    }
}

?>

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> رايت اكسس - تواصل</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/vendor/font awesome/all.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body >
    <script async="async" src="https://static.mobilemonkey.com/js/business_7284f9b8-1edf-429a-82da-485195b500e9-87930694.js"></script>
    <script>
        window.mmDataLayer = window.mmDataLayer || [];

        function mmData(o) {
            mmDataLayer.push(o);
        }
    </script>
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
          <li><a class="nav-link scrollto" href="index.php#portfolio">معرض اعمالنا</a></li>
          <li><a class="nav-link scrollto " href="index.php#technologies">التقنيات</a></li>
          <li><a class="nav-link scrollto active" href="contact.php">تواصل معنا</a></li>
          <?php

          if (isset($_COOKIE['user'])) {
            echo '
  <li><a class="nav-link scrollto" href="profile.php">البروفايل</a></li>
  <li><a class="nav-link scrollto " href="login.php?logout=true">تسجيل الخروج</a></li>

  ';
          } else {
            echo '
  <li><a class="nav-link scrollto " href="login.php">تسجيل الدخول</a></li>
  ';
          }

          ?>
          <li><a class="nav-link scrollto" href="../index.php">English  </a></li>
          <li><a class="getstarted scrollto" href="login.php">ابدأ رحلتك </a></li>

        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


    <!-- ======= Contact Section ======= -->
    <br>
    <br>

    <section id="contact" class="contact section-bg" dir="rtl">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
        <h2>تواصل</h2>
        <p> تواصل معنا</p>
        </div>

        <div class="row">

        <div class="col-lg-6">

            <div class="row">
            <div class="col-md-12">
                <div class="info-box">
                <i class="fas fa-map-marker-alt"></i>
                <h3> عنواننا </h3>
                <p>المملكة العربية السعودية - الرياض
                    - طريق الملك فهد - برج حمد </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box mt-4">
                <i class="fas fa-envelope"></i>
                <h3> بريدنا الاكتروني</h3>
                <p>info@rightaccess.co<br></p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box mt-4">
                <i class="fas fa-phone-alt"></i>
                <h3> اتصل بنا</h3>
                <p>966550978623+<br></p>
                </div>
            </div>
            </div>

        </div>

        <div class="col-lg-6">
            <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
                <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>" placeholder=" اسمك" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder=" بريدك الاكتروني" required>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="عنوان" required>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="رسالتك" required></textarea>
            </div>
            <div class="my-3">
                <div class="loading">تحميل</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit"> ارسال</button></div>
            </form>
        </div>

        </div>

        </div>
    </section><!-- End Contact Section -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">الرئيسيه</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about"> عنا</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">خدماتنا</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>خدماتنا </h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#"> تطوير مواقع</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#"> تطوير تطبيفات</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#"> تصاميم UI/UX  </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">فحص و اختبار البرمجيات </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">  مواقع تجاره الكترونيه </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">  براجم اداره الشركات </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>   انضم لقايمتنا البريديه</h4>
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
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fab fa-whatsapp fa-2x"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <script src="../assets/vendor/purecounter/purecounter.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>



</body>

</html>