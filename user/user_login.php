<?php
include('../database/conn.php');
session_start();
$message3 = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username'])) {
        //$con = mysqli_connect('127.0.0.1:3306','root','','admin') or die('Unable To connect');
        $result3 = mysqli_query($conn, "SELECT * FROM final_reg WHERE username='" . $_POST["username"] . "' and password1 = '" . $_POST["password1"] . "'");

        $row3  = mysqli_fetch_array($result3);

        if (is_array($row3)) {
            $_SESSION["user_id"] = $row3['user_id'];
            $_SESSION["md_id"] = $row3['md_id'];
            $_SESSION["username"] = $row3['username'];
        } else {
            $message3 = "Invalid Username or Password!";
        }

        if (isset($_SESSION["user_id"])) {
            header("Location:../user/index.php?page=home1.php");
        } else {
?>
            <script>
                alert("error : Your name and password is wrong.")
            </script>
<?php
        }
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

    <title>User Login</title>

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
                            <div class="col-lg-6 d-none d-lg-block"><img src="../img/login.jpg" alt="" style="height: 500px; width: 100%;"></div>
                            <div class="col-lg-6">
                                <div class="p-5 mr-5 mt-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <!-- <a href="" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </a> -->
                                        <input type="submit" value="Login" class="btn btn-primary btn-user btn-block">
                                        <div class="d-flex justify-content-between mt-2">
                                            <a href="../user/medical_register.php" class=" justify-content-end">Register Now</a>
                                            <br>
                                            <a class="" href="../user/forgot_pass.php" class="justify-align-content-center">Forgot Password</a>
                                        </div>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>