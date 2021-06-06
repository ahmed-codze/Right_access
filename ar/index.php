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

  <!-- Template Main CSS File -->
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

    .portfolio #portfolio-flters li {
      font-size: 20px;
    }

    .about .content ul li {
      padding-left: 0px;
      padding-right: 28px;
    }

    .about .content ul i {
      right: 0;
    }

    .portfolio .portfolio-item .portfolio-info .details-link {
      left: 10px;
    }

    .navbar a {
      font-size: unset;
    }
  </style>

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
          <li><a class="nav-link scrollto" href="contact.php">تواصل معنا</a></li>
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
          <li><a class="nav-link scrollto" href="../index.php">English </a></li>
          <li><a class="getstarted scrollto" href="login.php">ابدأ رحلتك </a></li>

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
        <div class="carousel-item active" style="background-image: url(../assets/img/slide/right_access-1.jpg)" dir="rtl">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown"> مرحبا بك في <span> رايت اكسس</span></h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">اقرأ المزيد</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/right_access-2.jpg)" dir="rtl">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">حلول برمجية و تقنية </h2>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">اقرأ المزيد</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(../assets/img/slide/right_access-3.jpg)" dir="rtl">
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
              <li><i class="fas fa-check-double" style="float:right"></i> جوده عاليه</li>
              <li><i class="fas fa-check-double" style="float:right"></i> اسعار تنافسيه</li>
              <li><i class="fas fa-check-double" style="float:right"></i> فريق محترف</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p> رايت اكسس
              هو الشريك المفضل للعديد من الشركات الرائدة في العالم والشركات الصغيرة والمتوسطة ومنافسي التكنولوجيا. نحن نساعد الشركات على رفع قيمتها من خلال تطوير و تصميم المواقع ، وتطبيقات الجوال بجميع انواعها ، وأختبار البرمجيات ، و ايضا تصميم الواجهات للمواقع و التطبيقات
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
              <h3>تطويرات وابتكارات مع خبراء التكنولوجيا</h3>
              <p>
                نقوم بتوظيف وبناء فرق التطوير المخصصة عن بُعد الخاصة بنا والمصممة وفقًا لاحتياجاتك الخاصة.
              </p>
            </div>

            <div class="accordion-list">
              <ul>
                <li>
                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> مهمتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                    <p>
                      نقوم بتطوير و بناء المواقع
                      و التطبيقات و المشاريع المخصصة الخاصة بك والمصممة وفقًا لاحتياجاتك الخاصة. احصل على
                      مطورين محترفين يعملون حصريًا من أجلك كجزء من شركتك. نتعامل مع جميع الجوانب العملية
                      المتعلقة بالبرمجة و التصميم ، مما يوفر لك نصف التكلفة والكثير من الجهد.

                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> رؤيتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      هي إحدى شركات البرمجيات البارزة التي تساعد المؤسسات
                      الأخرى على التحول إلى مؤسسات رقمية. إنها تميزك عن المنافسين
                      في السوق وتوفر مشاركة أفضل مع العملاء والشركاء والموظفين.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> فلسفتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      يحكم الناس على الكتاب من غلافه. قد يكون لدينا أفضل منتج ، وأعلى جودة ، وأكثر البرامج فائدة ،
                      وما إلى ذلك ، إذا قدمناها بطريقة متقطعة ، فسيتم اعتبارها على أنها متقطعة.
                      إذا قدمناها بطريقة إبداعية ومهنية ، سوف نحصل على النتائج المطلوبة.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>03</span> خطتنا <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      على مدار الأعوام الماضية ، درسنا الشركات التي حققت طفرات في الإنجاز والمئات من
                      العملاء من خلال الأبحاث و الدراسات و قد قمنا بتبني جميع الأدوات المرتبطة
                      بها لمساعدتنا على الوصول لتلك الإستراتيجية بشكل أفضل لعملائنا
                      وتوجيه ومراقبة تنفيذ تلك الإستراتيجية مع موظفينا

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
          <p> نبذه من عملاؤنا </p>
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
              <p>عندك شركة او مؤسسة و حابب يكون عندك واجهة اعلانية من خلال موقع إلكتروني مميز يساعك في عرض خدماتك بطريقة إحترافية و أسعار منافسة و وقت قياسي Right access عندها الحل . </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-mobile"></i></div>
              <h4><a> تطوير تطبيقات الجوال </a></h4>
              <p>قم بإنشاء تطبيقك الخاص او تحديث تطبيقك الحالي عن طريق فريقنا الخبير المختص, بحيث يكون تطبيق يسوق نفسه بنفسه من خلال السلاسة و الإحترافية في التصميم مع المحافظة على الجودة العالية. </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fa fa-palette"></i></div>
              <h4><a> تصاميم UI/UX </a></h4>
              <p>قم ببناء التصميم الذي تحتاجه في الوقت المحدد مع فريق متمرس يستخدم منهجا واضحًا وفعالًا, من خلال التواصل الدائم مع العميل للوصول الى النتيجة المرادة إضافة الى تناسب التصميم مع جميع الأجهزة .</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
              <h4><a> فحص و اختبار البرمجيات </a></h4>
              <p>استعن بخبرائنا لإجراء اختبار وتدقيق شامل ومتعدد المراحل لتطبيقك او موقعك بأعلى كفائة مهنية مع تقارير كاملة للاخطاء و المشاكل الموجودة .</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-shopping-cart"></i></div>
              <h4><a> مواقع التجارة الإلكترونية </a></h4>
              <p>ثق بأفكارنا المتميزة للتخلص من نقاط خطط العمل القديمة ، و العمل بأساليب حديثة ، ودمج عصارة تجاربنا في مشروعك. للتسويق لمنتجاتك ب الطريقة الصحيحة</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-tasks"></i></div>
              <h4><a> برامج اداره الشركات </a></h4>
              <p>تبدأ اي شركة ناجحة ببرنامج جيد لإدارة أعمالهم (نظام اداره عملاء ،نظام محاسبة ، نظام اداره موارد بشرية)</p>
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
              <h4>' . $row['client'] . '</h4>
              <p>' . $row['catagory'] . '</p>
              <a href="portfolio-details.php?client=' . $row['client'] . '" class="details-link" title="More Details"><i class="fas fa-plus"></i></a>
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
          <h3>! نحن هنا للاجابه عن اسألتك </h3>
          <p> تبحث عن استشاره ؟ </p>
          <a class="cta-btn" href="contact.php"> تواصل معنا</a>
        </div>

      </div>
    </section><!-- End Cta Section -->



    <!-- start technologies section -->

    <section id="technologies" class="technologies">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2> تقنيات حديثه و متطوره </h2>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#services"> تطوير مواقع</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services"> تطوير تطبيفات</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services"> تصاميم UI/UX </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">فحص و اختبار البرمجيات </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services"> مواقع تجاره الكترونيه </a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services"> براجم اداره الشركات </a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4> انضم لقايمتنا البريديه</h4>
            <form action="https://vuinteriordesign.pythonanywhere.com/contact/20/" method="post">
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