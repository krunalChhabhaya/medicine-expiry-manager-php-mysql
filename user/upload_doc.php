<?php
include('../database/conn.php');

$pan_noErr = "";

$pan_no = "";

$md_name  = $_GET['md_name'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_id = $_POST['md_id'];
    $md_name = test_input($_POST['md_name']);
    $pan_no = test_input($_POST['pan_no']);
    // if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $pan_no)) {
    //     $pan_noErr = "* Enter a Valid Pan Number *";
    // }

    $target_dir = "banking/";
    $target_file = $target_dir . basename($_FILES["pan_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["pan_img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["pan_img"]["tmp_name"], $target_file);
    }
    $pan_img = $_FILES["pan_img"]["name"];


    $target_dir = "banking/";
    $target_file = $target_dir . basename($_FILES["bill_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["bill_img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["bill_img"]["tmp_name"], $target_file);
    }
    $bill_img = $_FILES["bill_img"]["name"];


    $target_dir = "banking/";
    $target_file = $target_dir . basename($_FILES["card_img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["card_img"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["card_img"]["tmp_name"], $target_file);
    }
    $card_img = $_FILES["card_img"]["name"];

    if ($pan_no != null) {

        $reg_doc = "INSERT INTO `upload_doc`(`md_id`, `pan_no`, `pan_img`, `bill_img`, `card_img`) VALUES ('$md_id','$pan_no','$pan_img','$bill_img','$card_img')";

        if ($conn->query($reg_doc) === TRUE) {
            header("Location: ../user/user_regi.php?md_name=$md_name");
        } else {
            echo "Error: " . $reg_doc . "<br>" . $conn->error;
        }
    }
}

$md = "SELECT `md_id` FROM `medical_details` WHERE `md_name` =  '$md_name'";


$result = $conn->query($md);

$row = $result->fetch_assoc();


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

    <title>Upload Documents</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Upload Documents</h1>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <div class="form-group">

                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical Name" name="md_name" value="<?php echo  $md_name ?>" readonly>

                                    <input type="hidden" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical ID" name="md_id" value="<?php echo $row['md_id'] ?>">
                                    <br>
                                   
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Pancard No." name="pan_no" placeholder="Pancard No." pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}" required>
                                
                                    <hr>
                                    <div class="form-group">
                                        <label for="Pancard Image" style="font-size: 1.1rem !important;">Upload Pancard</label><br>
                                        <input type="file" name="pan_img" id="Pancard image">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="Bill Image" style="font-size: 1.1rem !important;">Upload Bill</label><br>
                                        <input type="file" name="bill_img" id="Bill image">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="Visiting Card Image" style="font-size: 1.1rem !important;">Upload Visiting Card</label><br>
                                        <input type="file" name="card_img" id="Visiting Card image">
                                    </div>
                                </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Save Documents"><br>
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