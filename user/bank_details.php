<?php
include('../database/conn.php');

$account_noErr = $bank_ifscErr = "";

$account_no = $bank_name = $bank_branch = $bank_ifsc = "";

$md_name  = $_GET['md_name'];

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_id = test_input($_POST['md_id']);
    $md_name = test_input($_POST['md_name']);

    $account_no = test_input($_POST['account_no']);
    // if (!preg_match("^(\d){9,18}$", $account_no)); {
    //     $account_noErr = "* Insert a Valid Bank Account Number *";
    // }
    $bank_name = test_input($_POST['bank_name']);

    $bank_branch = test_input($_POST['bank_branch']);

    $bank_ifsc = test_input($_POST['bank_ifsc']);
    // if (!preg_match("/^[A-Za-z]{4}\d{7}$/", $bank_branch)) {
    //     $bank_branchErr = "* Enter a valid IFSC code *";
    // }

    $target_dir = "banking/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }
    $bank_cheque = $_FILES["fileToUpload"]["name"];

    if ($account_no != null && $bank_ifsc != null) {
        $reg_bk = "INSERT INTO `bank_details`(`md_id`, `account_no`, `bank_name`, `bank_branch`, `bank_ifsc`, `bank_cheque`) VALUES ('$md_id','$account_no','$bank_name','$bank_branch','$bank_ifsc','$bank_cheque')";

        if ($conn->query($reg_bk) === TRUE) {
            $md_name = $_POST['md_name'];
            print_r($md_name);
           

            header("Location: ../user/upload_doc.php?md_name=$md_name");
           
        } else {
            echo "Error: " . $reg_bk . "<br>" . $conn->error;
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

    <title>Add Banking Details</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Add Banking Details</h1>
                            </div>
                            <form class="user" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <!-- <label for="md_id">Your Medical</label> -->
                                <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Medical Name" name="md_name" value="<?php echo  $md_name ?>" readonly>
                                <br>
                                
                                <input type="hidden" class="form-control form-control-user" id="Medical ID" name="md_id" value="<?php echo $row['md_id'] ?>">

                                <div class="form-group">
                                    <!-- <label>Enter Account No.</label> -->
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Account No." name="account_no" placeholder="Account No." pattern="[0-9]{9,18}" required>
                                    
                                </div>
                                <div class="form-group">
                                    <!-- <label>Select Bank Name</label> -->
                                    <select name="bank_name" class="form-control rounded-pill" style="height: 49px; padding-right:10px; font-size: 1.1rem;" required>
                                        <option selected="selected" value="">-- Select Bank --</option>
                                        <option value="ALLAHABAD BANK">ALLAHABAD BANK</option>
                                        <option value="ANDHRA BANK">ANDHRA BANK</option>
                                        <option value="AXIS BANK">AXIS BANK</option>
                                        <option value="STATE BANK OF INDIA">STATE BANK OF INDIA</option>
                                        <option value="BANK OF BARODA">BANK OF BARODA</option>
                                        <option value="UCO BANK">UCO BANK</option>
                                        <option value="UNION BANK OF INDIA">UNION BANK OF INDIA</option>
                                        <option value="BANK OF INDIA">BANK OF INDIA</option>
                                        <option value="BANDHAN BANK LIMITED">BANDHAN BANK LIMITED</option>
                                        <option value="CANARA BANK">CANARA BANK</option>
                                        <option value="GRAMIN VIKASH BANK">GRAMIN VIKASH BANK</option>
                                        <option value="CORPORATION BANK">CORPORATION BANK</option>
                                        <option value="INDIAN BANK">INDIAN BANK</option>
                                        <option value="INDIAN OVERSEAS BANK">INDIAN OVERSEAS BANK</option>
                                        <option value="ORIENTAL BANK OF COMMERCE">ORIENTAL BANK OF COMMERCE</option>
                                        <option value="PUNJAB AND SIND BANK">PUNJAB AND SIND BANK</option>
                                        <option value="PUNJAB NATIONAL BANK">PUNJAB NATIONAL BANK</option>
                                        <option value="RESERVE BANK OF INDIA">RESERVE BANK OF INDIA</option>
                                        <option value="SOUTH INDIAN BANK">SOUTH INDIAN BANK</option>
                                        <option value="UNITED BANK OF INDIA">UNITED BANK OF INDIA</option>
                                        <option value="CENTRAL BANK OF INDIA">CENTRAL BANK OF INDIA</option>
                                        <option value="VIJAYA BANK">VIJAYA BANK</option>
                                        <option value="DENA BANK">DENA BANK</option>
                                        <option value="BHARATIYA MAHILA BANK LIMITED">BHARATIYA MAHILA BANK LIMITED</option>
                                        <option value="FEDERAL BANK LTD ">FEDERAL BANK LTD </option>
                                        <option value="HDFC BANK LTD">HDFC BANK LTD</option>
                                        <option value="ICICI BANK LTD">ICICI BANK LTD</option>
                                        <option value="IDBI BANK LTD">IDBI BANK LTD</option>
                                        <option value="PAYTM BANK">PAYTM BANK</option>
                                        <option value="FINO PAYMENT BANK">FINO PAYMENT BANK</option>
                                        <option value="INDUSIND BANK LTD">INDUSIND BANK LTD</option>
                                        <option value="KARNATAKA BANK LTD">KARNATAKA BANK LTD</option>
                                        <option value="KOTAK MAHINDRA BANK">KOTAK MAHINDRA BANK</option>
                                        <option value="YES BANK LTD">YES BANK LTD</option>
                                        <option value="SYNDICATE BANK">SYNDICATE BANK</option>
                                        <option value="BANK OF INDIA">BANK OF INDIA</option>
                                        <option value="BANK OF MAHARASHTRA">BANK OF MAHARASHTRA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Enter Bank Branch</label> -->
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Bank Branch" name="bank_branch" placeholder="Bank Branch" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label>Enter IFSC No.</label> -->
                                    <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="IFSC No." name="bank_ifsc" placeholder="IFSC Number" pattern="[A-Z|a-z]{4}[0][a-zA-Z0-9]{6}$" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="Blank Cheque">Upload Blank Cheque Picture</label><br>
                                    <input type="file" name="fileToUpload" id="Bank Cheque">
                                </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Save Bank Details"><br>
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