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
        $img = $row['img'];
    }
} else {
    header('location: profile.php');
    exit();
}


if (isset($_POST['update'])) {

    $new_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $new_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $new_phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    if ($new_name == '' or $new_name == ' ') {
        $new_name = $name;
    }
    if ($new_email == '' or $new_email == ' ') {
        $new_email = $email;
    }
    if ($new_phone == '' or $new_phone == ' ') {
        $new_phone = $phone;
    }

    $tmpFilePath = $_FILES['img']['tmp_name'];
    $new_img = $_FILES['img']['name'];

    if ($new_img == '') {
        $new_img = $img;
    } else {
        $new_img = 'assets/img/users/' . $_FILES['img']['name'];
    }


    $expload = explode('.', $new_img);
    $ext     = strtolower(end($expload));

    $allowed = array('jpg', 'png', 'jpeg', '');



    // check if is actually image 

    if (!(in_array($ext, $allowed))) {

        echo '<script> alert("only images allowed") </script>';
    } else {
        move_uploaded_file($tmpFilePath, $new_img);

        // update 

        $stmt = $con->prepare('UPDATE users SET name = :nname , phone = :nphone, email = :email, img = :img WHERE user_key = :key');

        $stmt->execute(array(
            'nname' => $new_name,
            'nphone' => $new_phone,
            'email' => $new_email,
            'img'   => $new_img,
            'key' => $user_key,

        ));
        header('location: profile.php');
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Right Access</title>
    <meta content="" name="description">
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

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

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
                    <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
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
                    <li><a class="getstarted scrollto" href="login.php">Get Started</a></li>
                </ul>
                <i class="fas fa-bars mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <style>
        input {
            margin: 10px 0;
        }

        label {
            margin-top: 10px;
        }
    </style>
    <section>
    </section>

    <main id="main">
        <section style="margin-top: -5em;" class="container">
            <form action="edit_profile.php" method="POST" class="form-group" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6">
                        <label for="img">Choose your image</label>
                        <input type="file" name="img" id="img" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label for="name">Change your name</label>
                        <input type="text" name="name" value="<?php echo $name ?>" id="name" class="form-control" reqiured>
                    </div>

                    <div class="col-md-6">
                        <label for="email">Change your email</label>
                        <input type="email" name="email" value="<?php echo $email ?>" id="email" class="form-control" reqiured>
                    </div>

                    <div class="col-md-6">
                        <label for="phone">Change your phone</label>
                        <input type="text" name="phone" value="<?php echo $phone ?>" id="phone" class="form-control" reqiured>
                    </div>


                    <div class="col-md-12 text-center" style="margin-top: 20px;">
                        <input type="submit" name="update" value="Update" id="update" class="btn btn-primary w-50">
                    </div>

                </div>
            </form>
        </section><!-- End About Section -->

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
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#about">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#services">Services</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Mobile Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> UI/UX Design </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">QA & Testing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> ecommerce website </a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#"> OpenCart Stores </a></li>
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
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>



</body>

</html>