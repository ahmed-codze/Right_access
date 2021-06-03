<?php
$dsn = "mysql:host=localhost;dbname=right_access;";
$user = "root";
$password = "";
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
);
try {
    $con = new PDO($dsn, $user, $password, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "faild connect" . $e->getMessage();
}

//###############################################################################################

                                 // add to database

// $cat_name = $_POST['catagoryname'];
// $stmt = $con->prepare('INSERT INTO catagory (cat_name) VALUES (:catagoryname)');
// $stmt->execute(array(
//     'catagoryname'=> $cat_name,
// ));
// if ($stmt->rowCount() > 1) {
//     echo "<script> alert('sss') </script>";
// }

//#################################################################################################

                                      // check data from database

// $stmt = $con->prepare("SELECT username, pass, phone FROM users WHERE username = ? AND pass = ? AND phone = ? AND GroupID = 0");
// $stmt->execute(array($username, $pass, $phone));
// $count = $stmt->rowCount();
// if ($count > 0) {
//     $_SESSION['username'] = $username;
//     setcookie("name", $username, time() + 3600 * 24, "/");
//     setcookie("login", 1, time() + 3600 * 24, "/");
//     header("location: ../index.php");
//     exit();
// }else {
//     echo "<script>alert('Please, Check your data')
//     </script>";
// } 


//########################################################################################################

                                  // get data from database

// $stmt = $con->prepare("SELECT * FROM catagory");
// $stmt->execute();
// $rows =$stmt->fetchAll();

// // the loop 
// foreach($rows as $row) {
//     echo "<li>";
//     echo $row["cat_name"];
//     echo "</li>"
// }





//############################################################################################################

                                   // delete data from database

// if(isset($_POST['removecatagory'])) {

    // Delete if exist

// $removecatagory = $_POST['removecatagory'];
// $stmt = $con->prepare("SELECT cat_name FROM catagory WHERE cat_name = ?");
// $stmt->execute(array($removecatagory));
// $count = $stmt->rowCount();

// if ($count > 0) {

// $removecatagory = $_POST['removecatagory'];
// $stmt = $con->prepare("DELETE FROM `catagory` WHERE `catagory`.`cat_name` = :catname");
// $stmt->bindParam(":catname", $removecatagory);
// $stmt->execute();
// $count = $stmt->rowCount(); 
// if ($count > 0) {
//     echo "<script> alert('you have delete it') </script>";
// }

// }else {
//     // if not exist
// echo "<script>alert('ther is no catagory with that name');
// </script>";
// } 
// } 

//############################################################################

                                 // update data


// $user_email = $_COOKIE['email'];
// $user_id = $_COOKIE['identy'];
// $new_name = $_POST['username'];
// $new_phone = $_POST['phone'];
// $new_address = $_POST['address'];
// $stmt = $con->prepare('UPDATE users SET username = :nname , phone = :nphone, adress = :naddress WHERE id = :id');

// $stmt->execute(array(
//     'nname'=> $new_name,
//     'nphone' => $new_phone,
//     'naddress' => $new_address,
//     'id' => $user_id,

// ));