<?php


include 'admin/connect.php';

$head_message = '';

// login 

if (isset($_POST['login'])) {

  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

  $stmt = $con->prepare("SELECT email, pass FROM users WHERE email = ? AND pass = ? ");
  $stmt->execute(array($email, $pass));
  $count = $stmt->rowCount();
  if ($count > 0) {

    // get user key

    $stmt = $con->prepare("SELECT user_key FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $rows = $stmt->fetchAll();

    foreach ($rows as $row) {
      $user_key = $row['user_key'];
    }

    setcookie("user", $user_key, time() + 3600 * 24 * 90, "/");
    header("location: profile.php");
    exit();
  } else {
    $head_message = '<h3 class="alert-danger text-center">Please, Check your data</h3>';
  }
}

// create account

if (isset($_POST['signup'])) {

  $email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $name  = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $pass  = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
  $phone  = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

  $stmt = $con->prepare("SELECT email FROM users WHERE email = ?");
  $stmt->execute(array($email));
  $count = $stmt->rowCount();
  if ($count > 0) {
    $head_message = '<h3 class="alert-info text-center">This Email is already exist, you can sign in</h3>';
  } else {

    // create custom key 

    $check_key = 1;

    while ($check_key = 1) {

      $user_key = str_shuffle('d2c63a605ae27c13e43e26fe2c97a36c4556846dd3ef');

      // check if key is exist 

      $stmt = $con->prepare("SELECT user_key FROM users WHERE user_key = ?");
      $stmt->execute(array($user_key));
      $count = $stmt->rowCount();
      if ($count > 0) {
        $check_key = 1;
      } else {

        // add user to data base

        $stmt = $con->prepare('INSERT INTO users (name, email, pass, phone, user_key) 
                              VALUES (:name, :email, :pass, :phone, :key)');
        $stmt->execute(array(
          'name' => $name,
          'email' => $email,
          'pass' => $pass,
          'phone' => $phone,
          'key'   => $user_key
        ));

        $check_key = 0;
        setcookie("user", $user_key, time() + 3600 * 24 * 90, "/");
        header("location: profile.php");
        exit();
      }
    }
  }
}


// logout

if (isset($_GET['logout'])) {
  unset($_COOKIE['user']);
  setcookie('user', null, -1, '/');
  header("location: login.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>login - Right Access</title>
  <meta content="right access is the partner of choice for many of the world???s 
    leading enterprises, SMEs and technology challengers. We help businesses elevate their value 
    through custom software development, product design, QA and consultancy services." name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/logo.jpg" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/font awesome/all.min.css" rel="stylesheet" />


  <!--  Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/login.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.php">Right Access</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto" href="index.php#portfolio">projects</a></li>
          <li><a class="nav-link scrollto " href="index.php#technologies">technologies</a></li>
          <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
          <?Php

          if (isset($_COOKIE['user'])) {
            echo '
          <li><a class="nav-link scrollto " href="profile.php">Profile</a></li>
          <li><a class="nav-link scrollto active" href="login.php?logout=true">log out</a></li>
          ';
          } else {
            echo '
          <li><a class="nav-link scrollto active" href="login.php">log in</a></li>
          ';
          }

          ?>
          <li><a class="nav-link scrollto" href="ar/index.php">?????????????? </a></li>
          <li><a class="getstarted scrollto" href="index.php#about">Get Started</a></li>
        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <section class="inner-page">
      <div class=" text-center" data-aos="fade-up">



        <div class="container">
          <section id="formHolder">

            <div class="row">

              <!-- Brand Box -->
              <div class="col-sm-6 brand">
                <a href="#" class="logo"><img src="assets/img/logo.png" width="60px" height="50px"><span>.</span></a>

                <div class="heading">
                  <h2>Right Access</h2>
                  <p>Your Right Choice</p>
                </div>

              </div>


              <!-- Form Box -->
              <div class="col-sm-6 form">

                <!-- Login Form -->
                <div class="login form-peice ">

                  <?php echo $head_message; ?>
                  <form class="" action="login.php" method="POST">
                    <div class="form-group">
                      <label for="loginemail">Email Adderss</label>
                      <input type="email" name="email" id="loginemail" required>
                    </div>

                    <div class="form-group">
                      <label for="loginPassword">Password</label>
                      <input type="password" name="pass" id="loginPassword" required>
                    </div>

                    <div class="CTAA">
                      <input type="submit" value="Login" name="login">
                      <br>
                      <br>
                      <a href="#" class="switch">Don't have account</a>
                    </div>
                  </form>
                </div><!-- End Login Form -->


                <!-- Signup Form -->
                <div class="signup form-peice switched">
                  <form class="signup-form" action="login.php" method="POST">

                    <div class="form-group">
                      <label for="name">Full Name</label>
                      <input type="text" name="name" id="name" class="name">
                      <span class="error"></span>
                    </div>

                    <div class="form-group">
                      <label for="email">Email Adderss</label>
                      <input type="email" name="email" id="email" class="email">
                      <span class="error"></span>
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" name="phone" id="phone" class="phone">
                      <span class="error"></span>
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="pass" id="password" class="pass">
                      <span class="error"></span>
                    </div>

                    <div class="form-group">
                      <label for="passwordCon">Confirm Password</label>
                      <input type="password" name="passwordCon" id="passwordCon" class="passConfirm">
                      <span class="error"></span>
                    </div>

                    <div class="CTAA">
                      <input type="submit" value="Signup Now" id="submit" name="signup">
                      <br>
                      <br>
                      <a href="#" class="switch">I have an account</a>
                    </div>
                  </form>
                </div><!-- End Signup Form -->
              </div>
            </div>

          </section>



        </div>



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <p>
                Saudi Arabia - Riyadh -
                <br>
                King Fahd Road - Hamad Tower<br><br>
                <strong>Phone : </strong> +966559275722 <br>
                <strong>Email : </strong> info@rightaccess.co<br>
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
            <h4>Join our mail list</h4>
            <form action="https://vuinteriordesign.pythonanywhere.com/contact/20/" method="post">
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
      <div class="credits">
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-chevron-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <!-- <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/js/jquery-3.2.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/login.js"></script>

</body>

</html>