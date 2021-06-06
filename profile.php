<?Php

if (!isset($_COOKIE['user'])) {
  header('location: login.php');
}

include 'admin/connect.php';

$user_key = filter_var($_COOKIE['user'], FILTER_SANITIZE_STRING);


// check if user exist 

$stmt = $con->prepare("SELECT user_key FROM users WHERE user_key = ?");
$stmt->execute(array($user_key));
$count = $stmt->rowCount();

if ($count > 0) {

  // get user info

  $stmt = $con->prepare("SELECT * FROM users WHERE user_key = ?");
  $stmt->execute(array($user_key));
  $rows = $stmt->fetchAll();

  foreach ($rows as $row) {
    $name = $row['name'];
    $email = $row['email'];
    $phone = $row['phone'];
    $user_id = $row['id'];
    $user_img = $row['img'];

    // get fist name 

    $name_arr = explode(" ", $name);
    $first_name = $name_arr[0];
  }
} else {
  header('location: login.php');
  exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile - Right Access</title>
  <meta content="right access is the partner of choice for many of the world’s 
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
  <link href="assets/css/profile.css" rel="stylesheet">

</head>

<body>
  <script async="async" src="https://static.mobilemonkey.com/js/business_7284f9b8-1edf-429a-82da-485195b500e9-87930694.js"></script>
  <script>
    window.mmDataLayer = window.mmDataLayer || [];

    function mmData(o) {
      mmDataLayer.push(o);
    }
  </script>
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
              <li><a class="nav-link scrollto active" href="profile.php">Profile</a></li>
              <li><a class="nav-link scrollto " href="login.php?logout=true">log out</a></li>
              ';
          } else {
            echo '
              <li><a class="nav-link scrollto " href="login.php">log in</a></li>
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

    <section class="inner-page">

      <section class="welcome container">
        <h3>welcome <?Php echo $first_name; ?> </h3>
      </section>

      <div class="row gutters-sm main-card">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="<?php echo $user_img; ?>" alt="img" class="" style="border-radius: 10px;" width="150" height="150px">
                <div class="mt-3">
                  <h4><?php echo $first_name; ?></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $name ?>
                </div>
              </div>
              <hr>

              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $email ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <?php echo $phone ?>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-info " href="edit_profile.php">Edit</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr style="width: 80%;margin:auto">




      <?Php

      // check if there is any project

      $stmt = $con->prepare("SELECT id FROM projects WHERE user_id = ?");
      $stmt->execute(array($user_id));
      $count = $stmt->rowCount();
      if ($count > 0) {
        echo '
            <div class="projects container">
            <h3>projects</h3>
    
            <div class="row">
            ';


        // get projects

        $stmt = $con->prepare("SELECT * FROM projects WHERE user_id = ?");
        $stmt->execute(array($user_id));
        $rows = $stmt->fetchAll();

        foreach ($rows as $row) {
          $project_id = $row['id'];
          echo '
              <div class="col-md-6" style="margin-bottom: 20px;">
              <div class="project-card">
                <h1>' . $row['name'] . '</h1>
                <hr>
                <p>project description</p>
                <p>' . $row['discription'] .  ' </p>
                <hr>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: ' . $row['progress_num'] . '%;" aria-valuenow=" ' . $row['progress_num'] . '" aria-valuemin="0" aria-valuemax="100">' . $row['progress_num'] . '%</div>
                </div>
                <hr>
                <div class="date row ">
                  <div class="col-6">
                    <h3>start date : </h3>
                    <p style="margin-left: 20px;">' . $row['start_time'] . '</p>
                  </div>
                  <div class="col-6">
                    <h3>dead line : </h3>
                    <p style="margin-left: 20px;"> ' . $row['dead_line'] .  ' </p>
                  </div>
                  </div>
                  ';
          $stmt = $con->prepare("SELECT * FROM meetings WHERE project_id = ?");
          $stmt->execute(array($project_id));
          $meetings = $stmt->fetchAll();

          // the loop 
          foreach ($meetings as $meeting) {
            echo '
                            <div class="col-6" style="font-weight: bold; font-size: 16px; margin: 5px 20px;">
                            ' . $meeting['date'] .  '
                          </div>
                          <hr style="margin: 8px 0; height: 1.5px; background-color: #000; width: 88%;">
                          <div class="row" style=" margin: 5px 20px;">
                            <div class="col-3">
                            ' . $meeting['hour'] .  '
                            </div>
                            <div class="col-9">
                              <span style="width: 15px;height: 15px;display: inline-block;background-color: ' . $meeting['color'] .  ';border-radius: 50%;margin: 0 10px;line-height: 0.75;">.</span>
                              ' . $meeting['about'] .  '
                            </div>
                            <hr style="margin: 8px -15px; height: 1.5px; background-color: #000; width: 89%;">
                          </div>
                                ';
          }
          echo '
          </div>
          </div>
          ';
        }




        echo '
            
      </div>
      </div>
            ';
      }



      ?>






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


</body>

</html>