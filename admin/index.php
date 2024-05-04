<?php
include('../database/conn.php');
session_start();
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //$con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect');
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_name='" . $_POST["admin_name"] . "' and admin_pass = '" . $_POST["admin_pass"] . "'");
    $row  = mysqli_fetch_array($result);

    if (is_array($row)) {
        $_SESSION["admin_id"] = $row['admin_id'];
        $_SESSION["admin_name"] = $row['admin_name'];
    } else {
        $message = "Invalid Username or Password!";
    }

    if (isset($_SESSION["admin_id"])) {
        echo "<script> window.location.href='../admin/dashboard.php?page=ad_dashboard.php';</script>";
    } else {
?>
        <script>
            alert("error : Your name and password is wrong.")
        </script>
<?php
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Login</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient" style="background-color: lightgrey;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img src="../img\login.jpg" alt="" style="height: 500px; width: 100%;"></div>
                            <div class="col-lg-6">
                                <div class="p-5 mr-5 mt-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="admin_name" aria-describedby="emailHelp" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="admin_pass" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>

                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>