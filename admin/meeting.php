<?php

if (!(isset($_COOKIE['admin']))) {
    header('location: login.php');
    exit();
}

include 'connect.php';

// delete a meeting

if (isset($_GET['delete'])) {

    $stmt = $con->prepare("DELETE FROM `meetings` WHERE `meetings`.`id` = :id");
    $stmt->bindParam(":id", $_GET['delete']);
    $stmt->execute();
    $count = $stmt->rowCount();
    header('location: meeting.php');
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
                            <a class="nav-link " aria-current="page" href="index.php">
                                <span data-feather="home"></span>
                                العملاء
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="meeting.php">
                                <span data-feather="file"></span>
                                المواعيد
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="works.php">
                                <span data-feather="work"></span>
                                الأعمال
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add_work.php">
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

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-end">
                <a href="meeting.php" style="color: #000; text-decoration: none;">
                    <h2>المواعيد</h2>
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>حذف الموعد</th>
                                <th>تفاصيل العميل</th>
                                <th>تفاصيل المشروع</th>
                                <th>المشروع</th>
                                <th>العميل</th>
                                <th>حول</th>
                                <th>الساعة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $stmt = $con->prepare("SELECT * FROM meetings ORDER BY id DESC");
                            $stmt->execute();
                            $count = $stmt->rowCount();
                            if ($count > 0) {
                                $rows = $stmt->fetchAll();

                                // the loop 
                                foreach ($rows as $row) {
                                    // user info

                                    $stmt = $con->prepare("SELECT * FROM users WHERE id = ?");
                                    $stmt->execute(array($row['user_id']));
                                    $users = $stmt->fetchAll();

                                    foreach ($users as $user) {
                                        $user_name = $user['name'];
                                        $user_email = $user['email'];
                                    }

                                    // get project name 

                                    $stmt = $con->prepare("SELECT name FROM projects WHERE id = ?");
                                    $stmt->execute(array($row['project_id']));
                                    $projects = $stmt->fetchAll();

                                    foreach ($projects as $project) {
                                        $project_name = $project['name'];
                                    }


                                    echo '
                                    <tr>
                                    <td><a href="meeting.php?delete=' . $row['id'] . '"><div class="btn btn-danger">حذف الموعد</div></a></td>
                                    <td><a href="index.php?info=' . $row['user_id'] . '"><div class="btn btn-success">عرض تفاصيل العميل</div></a></td>
                                    <td><a href="project.php?id=' . $row['user_id'] . '"><div class="btn btn-primary">عرض تفاصيل المشروع</div></a></td>
                                    <td> ' . $project_name . '</td>
                                    <td>' . $user_name . '</td>
                                    <td style="color:' . $row['color'] . '; font-weight: bold">' . $row['about'] . '</td>
                                    <td>' . $row['hour'] . '</td>
                                    <td>' . $row['date'] . '</td>
                                    </tr>
                                    ';
                                }
                            } else {
                                echo '<br>
                                        <h3 class="alert-info text-center">  لا يوجد مواعيد </h3>
                                        <br>';
                            }


                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

</body>

</html>