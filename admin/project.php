<?php

if (!(isset($_COOKIE['admin']))) {
    header('location: login.php');
    exit();
}

include 'connect.php';



// add new meeting 

if (isset($_POST['date'])) {

    $stmt = $con->prepare('INSERT INTO meetings (user_id, project_id, date, hour, about, color) 
                                VALUES (:user, :project, :date, :hour, :about, :color)');
    $stmt->execute(array(
        'user' => $_POST['user_id'],
        'project' => $_POST['project_id'],
        'date'   => $_POST['date'],
        'hour'   => $_POST['hour'],
        'about'  => $_POST['about'],
        'color'  => $_POST['color']
    ));
    echo "<script> alert('تم اضافة موعد جديد'); </script>";
    header('location: project.php?id=' . $_POST['user_id']);
    exit();
}

// delete a project

if (isset($_GET['delete'])) {

    $stmt = $con->prepare("DELETE FROM `projects` WHERE `projects`.`id` = :id");
    $stmt->bindParam(":id", $_GET['delete']);
    $stmt->execute();
    $count = $stmt->rowCount();
    header('location: project.php?id=' . $_GET['user_id']);
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

        .project-card {
            margin: 5px;
            padding: 10px;
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
            transition: 0.3s;
            margin-top: 20px;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">رايت اكسس</a>
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

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 text-center">
                <h2>المشاريع</h2>

                <div class="row" dir="rtl">

                    <?php
                    $user_id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);

                    $stmt = $con->prepare("SELECT user_id FROM projects WHERE user_id = ?");
                    $stmt->execute(array($user_id));
                    $count = $stmt->rowCount();
                    if ($count > 0) {

                        // if there is any projects

                        $stmt = $con->prepare("SELECT * FROM projects WHERE user_id = ?");
                        $stmt->execute(array($user_id));
                        $rows = $stmt->fetchAll();

                        // the loop 
                        foreach ($rows as $row) {
                            echo '
                                <div class="col-md-6">
                                <div class="project-card ">
                                <h1 style="color: #4154f1;">' . $row['name'] . '</h1>
                                <hr>
                                <p >وصف المشروع</p>
                                <p>' . $row['discription'] . '</p>
                                <hr>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: ' . $row['progress_num'] . '%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">' . $row['progress_num'] . '%</div>
                                </div>
                                <br>
                                <strong>المرحلة</strong>: <span>' . $row['progress_name'] . '</span>
                                <hr>
                                <div class="date row ">
                                    <div class="col-6">
                                        <h3>start date : </h3>
                                        <p style="margin-left: 20px;">' . $row['start_time'] . '</p>
                                    </div>
                                    <div class="col-6">
                                        <h3>dead line : </h3>
                                        <p style="margin-left: 20px;"> ' . $row['dead_line'] . '</p>
                                    </div>
                                    <div class="col-12">
                                    <div class="btn btn-info add-meeting">اضافة موعد</div>
                                    <a href="edit_project.php?id=' . $row['id'] . '" >
                                    <div class="btn btn-warning">تعديل المشروع</div>
                                    </a>
                                    
                                    <a href="project.php?delete=' . $row['id'] . '&user_id=' . $row['user_id']  . '">
                                    <div class="btn btn-danger">حذف المشروع</div>
                                    </a>
                                    <form action="project.php" method="POST" style="display: none; margin: 15px 0;" class="meeting">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="date" class="form-control" name="date" placeholder="3-5-2021" required/>
                                        </div>
                                        <div class="col-6">
                                        <input type="time" class="form-control" name="hour" placeholder="10:30AM" required/>
                                        </div>
                                        <div class="col-6">
                                        <input type="text" class="form-control" name="about" placeholder="about" required/>
                                        </div>
                                        
                                        <div class="col-6" style="margin-top: 2px;">
                                        <label>اللون</label>
                                        <input type="color" class="form-control" name="color" placeholder="color" required/>
                                        </div>
                                        <input type="text" hidden name="user_id" value="' . $row['user_id']  . '">
                                        <input type="text" hidden name="project_id" value="' . $row['id'] . '">
                                        <div class="col-12" style="margin-top: 10px;">
                                            <input type="submit" value="اضافة" class="btn btn-success w-50">
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                                ';
                        }
                    } else {
                        echo '<br>
                                <h3 class="alert-danger"> للاسف لا يوجد مشاريع </h3>';
                    }

                    ?>




                </div>
                <br>
                <a href="add_project.php?id=<?Php echo $_GET['id']; ?>">
                    <div class="btn btn-primary">اضافة مشروع جديد</div>
                </a>
                </a>
            </main>
        </div>
    </div>

    <script src="../assets/js/jquery-3.2.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script>
        $('.add-meeting').click(function() {
            $(this).siblings('form').slideDown('slow');
        })
    </script>
</body>

</html>