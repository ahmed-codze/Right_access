<?php

if (!(isset($_COOKIE['admin']))) {
    header('location: login.php');
    exit();
}

include 'connect.php';

// add new project 

if (isset($_POST['add_project'])) {

    $stmt = $con->prepare('INSERT INTO projects (name, discription, start_time, dead_line, user_id, progress_num, progress_name) 
                                    VALUES (:name ,:desc,:start, :end, :user, :prog_num, :prog_name)');
    $stmt->execute(array(
        'name' => $_POST['name'],
        'desc' => $_POST['discription'],
        'start' => $_POST['start_time'],
        'end'  => $_POST['dead_line'],
        'user' => $_POST['user_id'],
        'prog_num' => 10,
        'prog_name' => $_POST['progress_name'],
    ));
    header('location: project.php?id=' . $_POST['user_id']);
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
        .nav-link {
            color: #000;
        }

        .nav-link.active {
            color: #4154f1;
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
                            <a class="nav-link active" aria-current="page" href="index.php">
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
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span>
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span>
                                Reports
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span>
                                Integrations
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-center" style="margin-top: 30px;">

                <div class="row g-3">
                    <div class="col-md-12 col-lg-12">
                        <h4 class="mb-3">اضافة مشروع جديد</h4>
                        <form class="needs-validation" action="add_project.php" method="POST">
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <label for="name" class="form-label">اسم المشروع</label>
                                    <input type="text" class="form-control" placeholder="اسم المشروع" name="name" required>
                                </div>

                                <div class="col-sm-12">
                                    <label for="discription" class="form-label">وصف المشروع</label>
                                    <input type="text" class="form-control" placeholder="وصف المشروع" name="discription" required>
                                </div>

                                <div class="col-sm-6">
                                    <label for="dead_line" class="form-label">تاريخ الانتهاء</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" name="dead_line" placeholder="تاريخ الانتهاء" required>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="start_time" class="form-label">تاريخ بداية العمل</label>
                                    <input type="date" class="form-control" name="start_time" placeholder="day/month/year" required>
                                </div>

                                <div class="col-12">
                                    <label for="progress_name" class="form-label">اسم المرحلة الحالية</label>
                                    <input type="text" class="form-control" name="progress_name" placeholder="اسم المرحلة الان" required>
                                </div>
                                <input type="text" hidden value="<?php echo $_GET['id']; ?> " name="user_id">
                            </div>

                            <hr class="my-4">

                            <button class="w-100 btn btn-primary btn-lg" name="add_project" type="submit">اضافة مشروع</button>
                        </form>
                    </div>
                </div>
            </main>

            <script src="../assets/js/jquery-3.2.1.min.js"></script>
            <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
</body>

</html>