<?Php

include 'admin/connect.php';

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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">projects</a></li>
          <li><a class="nav-link scrollto " href="#technologies">technologies</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
          <li><a class="getstarted scrollto" href="login.php">Get Started</a></li>

        </ul>
        <i class="fas fa-bars mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/right_access-1.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Right Access</span></h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/right_access-2.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">POWERFUL DIGITAL SOLUTIONS</h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/right_access-3.jpg)">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">Your Partner for Software Innovation</h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon fas fa-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon fas fa-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>About Us</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p style="font-size: 20px;">
              Your Partner for Software Innovation
            </p>
            <ul>
              <li><i class="fas fa-check-double"></i> High quality</li>
              <li><i class="fas fa-check-double"></i> Competitive prices</li>
              <li><i class="fas fa-check-double"></i> Be on time</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Right Access is the partner of choice for many of the world’s leading enterprises,
              SMEs and technology challengers. We help businesses elevate their value through
              custom software development, product design, QA and consultancy services.
            </p>
            <a href="#why-us" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">

          <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="330" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Happy Clients</strong></p>
              <a href="#why-us">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="850" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Project Done</strong> </p>
              <a href="#why-us">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Team Advisors</strong> </p>
              <a href="#why-us">Find out more &raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("assets/img/why-us.jpg");' data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>Improve and Innovate with the Tech Trends</h3>
              <p>
                We hire and build your own remote dedicated development teams tailored to your specific needs.
                Get professional fulltime developers who work exclusively for you as a part of your company.
                We handle all the practical aspects related to hiring and hosting your team at our premises,
                thus saving you half a cost and a lot of efforts.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Our Mission <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      Our mission is to promote business growth for our customers through creative
                      design and development and deliver high quality solutions that define the market and
                      create competitive value and reliable advantage for customers worldwide.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Our Vision <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      It is one of the leading software companies that helps other organizations become digital organizations.
                      It sets you apart from competitors in the market and provides better engagement with customers, partners and employees. </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Our Philosophy <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      People do judge a book by its cover. We may have the best product,
                      the highest quality, the most useful software, etc, if we present them in a slipshod manner,
                      they will be perceived as slipshod. If we present them in a creative, professional manner,
                      we will impute the desired qualities.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>03</span> Our Strategy <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Over the past years, we have studied companies that have achieved breakthroughs in
                      achievement and hundreds of customers through research and studies and have adopted
                      all associated tools to help us better reach that strategy for our customers and guide and
                      monitor the implementation of that strategy with our employees.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Check our Services</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-laptop"></i></div>
              <h4><a>Web Development</a></h4>
              <p>We carry more than just good coding skills. Our experience makes us stand out from other web development.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-mobile"></i></div>
              <h4><a>Mobile Development</a></h4>
              <p>Create complex enterprise software, ensure reliable software integration, modernise your legacy system.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-palette"></i></div>
              <h4><a> UI/UX Design </a></h4>
              <p>Build the product you need on time with an experienced team that uses a clear and effective design.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
              <h4><a>QA & Testing</a></h4>
              <p>Turn to our experts to perform comprehensive, Right Access-stage testing and auditing of your software.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-shopping-cart"></i></div>
              <h4><a>ecommerce website </a></h4>
              <p>Trust our top minds to eliminate workflow pain points, implement new tech, and consolidate app.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fab fa-opencart"></i></div>
              <h4><a> OpenCart Stores </a></h4>
              <p>Over the past decade, our customers succeeded by leveraging Intellectsoft’s process of building, motivating.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->




    <!-- ======= Portfolio Section ======= -->

    <!-- </section> End Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Portfolio</h2>
          <p>Check our Portfolio</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-Apps">Apps</li>
              <li data-filter=".filter-Websites">Websites</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">


          <?php

          $stmt = $con->prepare("SELECT * FROM portfolio");
          $stmt->execute();
          $rows = $stmt->fetchAll();

          // the loop 
          foreach ($rows as $row) {

            echo '
            <div class="col-lg-4 col-md-6 portfolio-item filter-' . $row['en_catagory'] . '">
            <img src="assets/img/portfolio/' . $row['first_img'] . '" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>' . $row['en_client'] . '</h4>
              <p>' . $row['en_catagory'] . '</p>
              <a href="assets/img/portfolio/' . $row['sec_img'] . '" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 1"><i class="fas fa-plus"></i></a>
              <a href="portfolio-details.php?client=' . $row['en_client'] . '" class="details-link" title="More Details"><i class="fas fa-link"></i></a>
            </div>
          </div>
            ';
          }


          ?>




        </div>

      </div>
    </section><!-- End Portfolio Section -->


    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
      <div class="container" data-aos="zoom-in">

        <div class="text-center">
          <h3>// ! We are here to answer your questions </h3>
          <p> Need a Consultation </p>
          <a class="cta-btn" href="#contact">Contact Us</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- start technologies section -->

    <section id="technologies" class="technologies">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> use efficient Tech </h2>
          <p>Technologies we use</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item  " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/8.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/9.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/10.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/11.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/12.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/13.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/14.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="assets/img/portfolio/15.png" class="img-fluid" alt="">
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- end technologies section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact Us</p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="fas fa-map-marker-alt"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="fas fa-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="fas fa-phone-alt"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55<br></p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6">
            <form action="" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" value="<?php echo $name; ?>" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fab fa-whatsapp fa-2x"></i></a>

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