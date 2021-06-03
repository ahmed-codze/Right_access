<?Php


// login

if (isset($_POST['username'])) {

    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $pass     = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);

    include 'connect.php';

    //check if admin 

    $stmt = $con->prepare("SELECT username, pass FROM admin WHERE username = ? AND pass = ?");
    $stmt->execute(array($username, $pass));
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['admin'] = $username;
        setcookie("admin", $username, time() + 3600 * 24, "/");

        // rediret to index page

        header("location: index.php");

        exit();
    } else {

        // if not admin

        echo "<script>alert('هناك خطأ في البيانات')
    </script>";
    }
}


// logout

if (isset($_GET['logout'])) {
    unset($_COOKIE['admin']);
    setcookie('admin', null, -1, '/');
    header("location: login.php");
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
    <title> رايت اكسس - تسجيل الدخول لوحة التحكم </title>
    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="apple-touch-icon">

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">



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

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form action="login.php" method="POST">
            <img class="mb-4" src="../assets/img/logo.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">من فضلك قم بتسجيل الدخول</h1>
            <input type="text" id="inputEmail" class="form-control" placeholder="اليوزر نيم" required autofocus name="username">
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="الباسورد" required name="pass">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">تسجيل الدخول</button>
        </form>
    </main>

</body>

</html>