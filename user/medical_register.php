<?php
include('../database/conn.php');
//Error Value Empty
$md_nameErr = $pr_name1Err = $pr_number1Err = $pr_name2Err = $pr_number2Err = $pr_telephoneErr = $pr_emailErr =  $gst_noErr = "";
//Field Value Empty
$md_name = $md_address = $md_area = $pr_name1 = $pr_number1 = $pr_name2 = $pr_number2 = $pr_telephone = $pr_email = $drug_no = $gst_no = "";

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_name = test_input($_POST['md_name']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $md_name)) {
        $md_nameErr = "* Only letters and white space allowed *";
    }
    $md_address = test_input($_POST['md_address']);

    $md_area = test_input($_POST['md_area']);

    $pr_name1 = test_input($_POST['pr_name1']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $pr_name1)) {
        $pr_name1Err = "* Only letters and white space allowed *";
    }
    $pr_number1 = test_input($_POST['pr_number1']);
    // if(!preg_match("/(6|7|8|9)\d{9}/", $pr_number1)) {
    //     $pr_number1Err = "* Insert a Valid Mobile Number *";
    // }
    $pr_name2 = test_input($_POST['pr_name2']);
    if (!preg_match("/^[a-zA-Z-' ]*$/", $pr_name2)) {
        $pr_name2Err = "* Only letters and white space allowed *";
    }
    $pr_number2 = test_input($_POST['pr_number2']);
    // if (!preg_match("/^[6-9][0-9]{9}$/", $pr_number2)); {
    //     $pr_number2Err = "* Insert a Valid Mobile Number *";
    // }
    $pr_telephone = test_input($_POST['pr_telephone']);
    // if (!preg_match("/^[2-9][0-9]{9}$/", $pr_telephone)); {
    //     $pr_telephoneErr = "* Insert a Valid Mobile Number *";
    // }
    $pr_email = test_input($_POST['pr_email']);
    if (!filter_var($pr_email, FILTER_VALIDATE_EMAIL)) {
        $pr_emailErr = "* Invalid email format *";
    }
    $drug_no = test_input($_POST['drug_no']);

    $gst_no = test_input($_POST['gst_no']);
    if (!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-5])([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}([a-zA-Z0-9]){1}([a-zA-Z]){1}([0-9]){1}?$/", $gst_no)); {
        $gst_noErr = "* Insert a Valid GST Number *";
    }
    if ($md_name != null && $pr_name1 != null && $pr_number1 != null && $pr_email != null) {
        $reg_ph = "INSERT INTO `medical_details`(`md_name`, `md_address`, `md_area`, `pr_name1`, `pr_number1`, `pr_name2`, `pr_number2`, `pr_telephone`, `pr_email`, `drug_no`, `gst_no`) VALUES ('$md_name','$md_address','$md_area','$pr_name1','$pr_number1','$pr_name2','$pr_number2','$pr_telephone','$pr_email','$drug_no','$gst_no')";

        if ($conn->query($reg_ph) === TRUE) {
            header("Location: ../user/bank_details.php?md_name=$md_name");
        } else {
            echo "Error: " . $reg_ph . "<br>" . $conn->error;
        }
        echo $md_name;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <style>
        .error2 {
            color: #ff6666;
            font-size: 1rem;
            margin-left: 130px;
        }
    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Add Medical Details</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row d-flex justify-content-center px-5">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12 pt-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold !important;">Add Medical</h1>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form class="user" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                            <div class="form-group">
                                <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user w-50 mx-auto" id="Medical Name" name="md_name" placeholder="Medical Name" required>
                                <span class="error2"><?php echo $md_nameErr; ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Medical Address" name="md_address" placeholder="Medical Address" required><br>
                                    </div>
                                    <div class="form-group">
                                        <select name="md_area" class="form-control rounded-pill" required style="height: 49px; padding-right:10px; font-size: 1.1rem !important;">
                                            <option selected>--- Select Area ---</option>
                                            <option value="Majura Gate">Majura Gate</option>
                                            <option value="Umarwada">Umarwada</option>
                                            <option value="Khatodrawadi">Khatodrawadi</option>
                                            <option value="Rustampura">Rustampura</option>
                                            <option value="Begampura">Begampura</option>
                                            <option value="Sagrampura">Sagrampura</option>
                                            <option value="Athwa Gate">Athwa Gate</option>
                                            <option value="Nanpura">Nanpura</option>
                                            <option value="Haripura">Haripura</option>
                                        </select>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner Name" name="pr_name1" placeholder="Chemist / Druggist / Pharmacist Name" required>
                                        <span class="error2"><?php echo $pr_name1Err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner No." name="pr_number1" placeholder="Chemist / Druggist / Pharmacist Number" pattern="[0-9]{10}" required>
                                        <span class="error2"><?php echo $pr_number1Err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person Name" name="pr_name2" placeholder="Contact Person Name">
                                        <span class="error2"><?php echo $pr_name2Err; ?></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person No." name="pr_number2" placeholder="Contact Person No." pattern="[0-9]{10}">
                                        <span class="error2"><?php echo $pr_number2Err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Telephone No." name="pr_telephone" placeholder="Telephone No." pattern="[0-9]+">
                                        <span class="error2"><?php echo $pr_telephoneErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Email" name="pr_email" placeholder="Email Address" required>
                                        <span class="error2"><?php echo $pr_emailErr; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Drug License No." name="drug_no" placeholder="Drug License No." required>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="GST No." pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" name="gst_no" placeholder="GST No." required>
                                        <span class="error2"><?php echo $gst_noErr; ?></span>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" style="font-size: 1.1rem !important;" class="btn btn-primary btn-user btn-block" value="Save Medical"><br>
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