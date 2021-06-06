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

  <title> رايت اكسس</title>
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

  <style>
  .about .content ul li {
    padding-left : 0px ;
    padding-right : 28px ;
  }
  .about .content ul i{
    right :0;
  }

  </style>

</head>

<body >
  <script async="async" src="https://static.mobilemonkey.com/js/business_7284f9b8-1edf-429a-82da-485195b500e9-87930694.js"></script>
  <script>
    window.mmDataLayer = window.mmDataLayer || [];

    function mmData(o) {
      mmDataLayer.push(o);
    }
  </script>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" dir="rtl">
    <div class="container d-flex align-items-center justify-content-between">

      <!-- <h1 class="logo"><a href="index.php">Right Access</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">الرئيسيه</a></li>
          <li><a class="nav-link scrollto" href="#about">عنا</a></li>
          <li><a class="nav-link scrollto" href="#services">خدماتنا</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">معرض اعمالنا</a></li>
          <li><a class="nav-link scrollto " href="#technologies">التقنيات</a></li>
          <li><a class="nav-link scrollto" href="#contact">تواصل معنا</a></li>
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" >
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

      <div class="carousel-inner" role="listbox" >

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(../assets/img/slide/right_access-1.jpg)"  dir="rtl">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown"> مرحبا بك في <span> رايت اكسس</span></h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">اقرأ المزيد</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/right_access-2.jpg)"  dir="rtl">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">حلول رقمية قوية </h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">اقرأ المزيد</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/right_access-3.jpg)"  dir="rtl">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">شريكك في ابتكار البرمجيات </h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">اقرأ المزيد</a>
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

  <main id="main" dir="rtl">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>عنا</h2>
          <p>عن رايت اكسس</p>
        </div>

        <div class="row content">
          <div class="col-lg-6">
            <p style="font-size: 20px;">
              شريكك في ابتكار البرمجيات 
            </p>
            <ul>
              <li><i class="fas fa-check-double" style="float:right"></i>  جوده عاليه</li>
              <li><i class="fas fa-check-double" style="float:right"></i>  اسعار تنافسيه</li>
              <li><i class="fas fa-check-double" style="float:right"></i>  فريق محترف</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
               رايت اكسس هي الشريك المفضل للعديد من الشركات الرائدة في العالم ،
               الشركات الصغيرة والمتوسطة  في مجال التكنولوجيا. نحن نساعد الشركات على رفع قيمتها من خلال
               تطوير البرمجيات المخصصة وتصميم المنتجات وضمان الجودة والخدمات الاستشارية. 
            </p>
            <a href="#why-us" class="btn-learn-more"> اعرف المزيد</a>
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
              <p><strong> عملاء سعداء</strong></p>
              <a href="#why-us">اعرف المزيد&raquo;</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="850" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong> مشاريع مكتمله</strong> </p>
              <a href="#why-us">اعرف المزيد&raquo;</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>مستشاري الفريق </strong> </p>
              <a href="#why-us">اعرف المزيد&raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
      <div class="container-fluid" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-5 align-items-stretch video-box" style='background-image: url("../assets/img/why-us.jpg");' data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch">

            <div class="content">
              <h3>تحسين وابتكار مع الاتجاهات التقنية </h3>
              <p>
                 نقوم بتوظيف وبناء فرق التطوير المخصصة عن بُعد الخاصة بك والمصممة وفقًا لاحتياجاتك الخاصة.
                 احصل على مطورين محترفين بدوام كامل يعملون حصريًا من أجلك كجزء من شركتك.
                 نتعامل مع جميع الجوانب العملية المتعلقة بالتوظيف واستضافة فريقك في مقرنا ،
                 مما يوفر عليك نصف التكلفة والكثير من الجهد.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> مهمتنا  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                       مهمتنا هي تعزيز نمو الأعمال لعملائنا من خلال الإبداع
                       تصميم وتطوير وتقديم حلول عالية الجودة تحدد السوق و
                       خلق قيمة تنافسية وميزة موثوقة للعملاء في جميع أنحاء العالم. 
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> رؤيتنا  <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      إنها واحدة من شركات البرمجيات الرائدة التي تساعد المؤسسات الأخرى على أن تصبح مؤسسات رقمية.
                       يميزك عن المنافسين في السوق ويوفر مشاركة أفضل مع العملاء والشركاء والموظفين. 
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>  فلسفتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      يحكم الناس على الكتاب من غلافه. قد يكون لدينا أفضل منتج ،
                       أعلى جودة ، وأكثر البرامج فائدة ، وما إلى ذلك ، إذا قدمناها بطريقة متقطعة ،
                       سوف يُنظر إليهم على أنهم مبتذلون. إذا قدمناها بطريقة إبداعية ومهنية ،
                       سوف ننسب الصفات المطلوبة. 
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>03</span>  خطتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                     على مدار السنوات الماضية ، قمنا بدراسة الشركات التي حققت اختراقات في
                       إنجاز ومئات من العملاء من خلال البحوث والدراسات واعتمدوها
                       جميع الأدوات المرتبطة لمساعدتنا في الوصول إلى هذه الإستراتيجية لعملائنا بشكل أفضل وتوجيه و
                       مراقبة تنفيذ تلك الإستراتيجية مع موظفينا.
                    </p>
                  </div>
                </li>

              </ul>
            </div>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= client Section ======= -->
    <section class="clients">
      <div class="container">
        <div class="section-title">
          <h2>عملاؤنا</h2>
          <p>  نبذه من عملاؤنا </p>
        </div>

        <div class="row text-center">
          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/logo.png" style="width: 55%" alt="" srcset="">
            </div>
          </div>

          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/logo.png" style="width: 55%" alt="" srcset="">
            </div>
          </div>

          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/logo.png" style="width: 55%" alt="" srcset="">
            </div>
          </div>

          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/logo.png" style="width: 55%" alt="" srcset="">
            </div>
          </div>

          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/logo.png" style="width: 55%" alt="" srcset="">
            </div>
          </div>

          <div class="col-6 col-md-3 " data-aos="zoom-in">
            <div class="client-img">
              <img src="../assets/img/awaits.png" style="width: 50%" alt="" srcset="">
            </div>
          </div>

        </div>
      </div>


    </section>
    <!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>خدماتنا</h2>
          <p> نبذه من خدماتنا</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-laptop"></i></div>
              <h4><a> تطوير المواقع الالكترونيه</a></h4>
              <p>نحن نحمل أكثر من مجرد مهارات برمجه جيدة. تجربتنا تجعلنا نتميز عن غيرها من مطوري الويب. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-mobile"></i></div>
              <h4><a> تكوير تطبيفات الويب</a></h4>
              <p>قم بإنشاء تطبيفات مؤسسة معقدة ، ضمان تكامل موثوق للبرامج ، تحديث نظامك القديم. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-palette"></i></div>
              <h4><a>  تصاميم UI/UX </a></h4>
              <p>قم ببناء المنتج الذي تحتاجه في الوقت المحدد مع فريق متمرس يستخدم تصميمًا واضحًا وفعالًا.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
              <h4><a> ضمان الجوده  </a></h4>
              <p>استعن بخبرائنا لإجراء اختبار شامل ومراحل الوصول الصحيح ومراجعة برامجك.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-shopping-cart"></i></div>
              <h4><a> مواقع التجارة الإلكترونية  </a></h4>
              <p>ق بأفكارنا المتميزة للتخلص من نقاط ضعف سير العمل ، وتنفيذ تقنية جديدة ، ودمج التطبيق. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tasks"></i></div>
              <h4><a>   برامج اداره الشركات </a></h4>
              <p>تبدأ اي شركة ناجحة ببرنامج جيد لإدارة أعمالهم   (نظام اداره عملاء ،نظام محاسبة ، نظام اداره موارد بشرية)</p>
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
          <h2>معرض اعمالنا</h2>
          <p> نبذه من مشاريعنا </p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">الكل</li>
              <li data-filter=".filter-Apps">تطبيقات</li>
              <li data-filter=".filter-Websites">مواقع</li>
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
            <img src="../assets/img/portfolio/' . $row['first_img'] . '" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>' . $row['en_client'] . '</h4>
              <p>' . $row['en_catagory'] . '</p>
              <a href="portfolio-details.php?client=' . $row['en_client'] . '" class="details-link" title="More Details"><i class="fas fa-plus"></i></a>
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
          <h3>// ! نحن هنا للاجابه عن اسألتك  </h3>
          <p> تبحث عن استشاره ؟ </p>
          <a class="cta-btn" href="#contact"> تواصل معنا</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- start technologies section -->

    <section id="technologies" class="technologies">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>  تقنيات حديثه و متطوره </h2>
          <p> التقنيات التي نستخدمها</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/2.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/3.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/4.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item  " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/5.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/6.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/7.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item d" data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/8.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/9.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/10.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/11.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/12.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/13.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/14.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 technologies-item " data-aos="fade-up" data-aos-delay="200">
            <div class="imageee text-center">
              <img src="../assets/img/portfolio/15.png" class="img-fluid" alt="">
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">ضمان الجوده</a></li>
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