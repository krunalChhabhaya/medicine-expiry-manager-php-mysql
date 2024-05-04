<?php
include('../database/conn.php');

$md_name  = $_GET['md_name'];

$md = "SELECT `md_id` FROM `medical_details` WHERE `md_name` =  '$md_name'";

$result = $conn->query($md);

$row = $result->fetch_assoc();


$kk = "SELECT `username` FROM `final_reg`";

$result1 = $conn->query($kk);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_id = $_POST['md_id'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $count = 0;
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            if ($row1['username'] == $username) {
                $count++;
            }
        }
    }
    if($count > 0) { ?>
        <script>
        alert("error : Choose diffrent username!")
    </script> 
   <?php }
   else {

    $reg_user = "INSERT INTO `final_reg`(`md_id`,`username`, `password1`, `password2`) VALUES ('$md_id','$username','$password1','$password2')";

    if ($conn->query($reg_user) === TRUE) {
        header("Location: ../user/user_login.php");
    } else {
        echo "Error: " . $reg_user . "<br>" . $conn->error;
    }
    if ($_POST["password1"] !== $_POST["password2"]) { ?>
    <script>
        alert("error : Password and Confirm password should match!")
    </script>  <?php
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

    <title>Final Registration</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row d-flex justify-content-center">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Set Username & Password</h1>
                            </div>
                            <form class="user" method="post" action="">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical Name" name="md_name" value="<?php echo  $md_name ?>" readonly>
                                <br>
                                <input type="hidden" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical ID" name="md_id" value="<?php echo $row['md_id'] ?>">
                                
                                    <!-- <label>Add Username</label> -->
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Username" name="username" placeholder="Set Username" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Set Password</label> -->
                                    <input type="password" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Password" name="password1" placeholder="Set Password" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Confirm Password</label> -->
                                    <input type="password" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Confirm Password" name="password2" placeholder="Confirm Password" required>
                                </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Save Registration"><br>
                        </form>
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