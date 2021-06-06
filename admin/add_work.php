<?php

if (!(isset($_COOKIE['admin']))) {
    header('location: login.php');
    exit();
}

include 'connect.php';

if (isset($_POST['link'])) {

    $fImg   = $_FILES['upload']['name'][0];
    $secimg = $_FILES['upload']['name'][1];
    $thimg  = $_FILES['upload']['name'][2];

    // Count # of uploaded files in array
    $total = count($_FILES['upload']['name']);

    // Loop through each file
    for ($i = 0; $i < $total; $i++) {

        //Get the temp file path
        $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

        //Make sure we have a file path
        if ($tmpFilePath != "") {
            //Setup our new file path
            $newFilePath = "../assets/img/portfolio/" . $_FILES['upload']['name'][$i];

            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            }
        }
    }
    $new_client = $_POST['client'];
    $new_enclient = $_POST['en_client'];
    $new_link = $_POST['link'];
    $new_cat = $_POST['catagory'];
    $new_encat = $_POST['en_catagory'];
    $new_desc = $_POST['description'];
    $new_endesc = $_POST['en_description'];

    $stmt = $con->prepare('INSERT INTO portfolio (first_img, sec_img, third_img, link, client, en_client, catagory, en_catagory, description, en_description) 
                            VALUES (:fimg, :simg, :thimg, :link, :client, :enclient, :cat, :encat, :des, :endes)');

    $stmt->execute(array(
        'fimg' => $fImg,
        'simg' => $secimg,
        'thimg' => $thimg,
        'link' => $new_link,
        'client' => $new_client,
        'enclient' => $new_enclient,
        'cat' => $new_cat,
        'encat' => $new_encat,
        'des' => $new_desc,
        'endes' => $new_endesc
    ));

    header('location: works.php');
    exit();
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>رايت اكسس - لوحة التحكم</title>

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="apple-touch-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- font awesom icons -->
    <link href="../assets/vendor/font awesome/all.min.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .nav-link {
            color: #000;
        }

        .nav-link.active {
            color: #4154f1;
        }

        input,
        select,
        textarea {
            margin: 10px 0;
        }

        label {
            margin-top: 10px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">رايت اكسس</a>
        <div class=" navbar-dark  flex-md-nowrap p-0 shadow" style=" position:absolute;top:10px; right:10px">
            <div class="navbar-toggler d-md-none collapsed  " type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span>
                    <i class="fas fa-bars " style="color: white; font-size:25px;"></i>
                </span>
            </div>
        </div>
        <form class="form-group w-100" action="index.php" method="POST">
            <input class="form-control form-control-dark w-100" type="text" placeholder="ابحث عن احد العملاء" aria-label="Search" name="search">
        </form>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="login.php?logout=true">تسجيل الخروج</a>
            </li>
        </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">
                                <span data-feather="home"></span>
                                العملاء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="meeting.php">
                                <span data-feather="file"></span>
                                المواعيد
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="works.php">
                                <span data-feather="work"></span>
                                الأعمال
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="add_work.php">
                                <span data-feather="users"></span>
                                اضافة عمل جديد
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clients.php">
                                <span data-feather="users"></span>
                                صور عملاؤنا
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-end" dir="rtl">
                <form action="add_work.php" method="POST" class="form-group" style="margin: 20px;" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="img">اختر 3 صور للعمل</label>
                            <br>
                            <input type="file" name="upload[]" class="form-control" multiple required>
                        </div>
                        <div class="col-md-6">
                            <label for="link">رابط العمل</label>
                            <br>
                            <input type="text" name="link" class="form-control" placeholder="link">
                        </div>
                        <div class="col-md-6">
                            <label for="catagory">القسم</label>
                            <br>
                            <input type="text" list="catagory" class="form-control" name="catagory" />
                            <datalist id="catagory">
                                <option>المواقع</option>
                                <option>التطبيقات</option>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="en_catagory">Category</label>
                            <br>
                            <input type="text" list="en_catagory" class="form-control" name="en_catagory" />
                            <datalist id="en_catagory">
                                <option>Websites</option>
                                <option>Apps</option>
                            </datalist>
                        </div>
                        <div class="col-md-6">
                            <label for="client">اسم العميل</label>
                            <br>
                            <input type="text" class="form-control" id="client" name="client">
                        </div>
                        <div class="col-md-6">
                            <label for="en_client">Client name</label>
                            <br>
                            <input type="text" class="form-control" id="en_client" name="en_client">
                        </div>
                        <div class="col-md-6">
                            <label for="description">وصف العمل</label>
                            <br>
                            <textarea class="form-control" id="description" name="description" style="height: 200px;"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="en_description">description</label>
                            <br>
                            <textarea class="form-control" id="description" name="en_description" style="height: 200px;"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary w-50" type="submit">اضافة</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>