<?php
include('../database/conn.php');



$count = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $md_id = $_POST['md_id'];
    $pr_email = $_POST['pr_email'];
    $username = $_POST['u_name'];
    $kk = "SELECT m.`md_id`, f.`username`, m.pr_email FROM `final_reg` f, medical_details m WHERE f.md_id = m.md_id AND m.pr_email = '$pr_email' AND f.username = '$username'";

    $result1 = $conn->query($kk);
  
    if ($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $row1['u_name'] == $username;
            if ($row1['pr_email'] == $pr_email) {
                $count++;
            }
        }
    }
    if ($count > 0) {
        header("Location: ../user/ch_pass.php?pr_email=$pr_email&&u_name=$username");
    } else { ?>
        <script>
            alert("error : Email didn't matched !")
        </script>
<?php  }
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

    <title>Forgot Password</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Enter Email Address</h1>
                            </div>
                            <form class="user" method="post" action="">

                                <!-- <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical Name" name="md_name" value="" readonly>
                                <br>
                                <input type="hidden" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical ID" name="md_id" value=""> -->
                                <div class="form-group">
                                    <!-- <label>Add Username</label> -->
                                    <input type="email" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Email" name="pr_email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Add Username</label> -->
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Username" name="u_name" placeholder="Enter Username" required>
                                </div>
                                
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Check Email"><br>
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