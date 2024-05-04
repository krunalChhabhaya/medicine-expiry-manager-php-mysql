<?php
include('../database/conn.php');

$md_id = $_SESSION['md_id'];

$sql = "SELECT * FROM `medical_details` WHERE md_id=$md_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_name = $_POST['md_name'];
    $md_address = $_POST['md_address'];
    $md_area = $_POST['md_area'];
    $pr_name1 = $_POST['pr_name1'];
    $pr_number1 = $_POST['pr_number1'];
    $pr_name2 = $_POST['pr_name2'];
    $pr_number2 = $_POST['pr_number2'];
    $pr_telephone = $_POST['pr_telephone'];
    $pr_email = $_POST['pr_email'];
    $drug_no = $_POST['drug_no'];
    $gst_no = $_POST['gst_no'];

    $up_ph = "UPDATE `medical_details` SET `md_name`='$md_name',`md_address`='$md_address',`md_area`='$md_area',`pr_name1`='$pr_name1',`pr_number1`='$pr_number1',`pr_name2`='$pr_name2',`pr_number2`='$pr_number2',`pr_telephone`='$pr_telephone',`pr_email`='$pr_email',`drug_no`='$drug_no',`gst_no`='$gst_no' WHERE `md_id`=$md_id";

    if ($conn->query($up_ph) === TRUE) {
        echo "<script> window.location.href='../user/index.php?page=edit_medical.php';</script>";
    } else {
        echo "Error: " . $up_ph . "<br>" . $conn->error;
    }
}

?>

<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row d-flex justify-content-center px-5">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg-12 pt-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold !important;">Medical Details</h1>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <form class="user" method="post" action="">
                            <div class="form-group">
                                <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user w-50 mx-auto" id="Medical Name" name="md_name" placeholder="Medical Name" value="<?php echo $row['md_name']; ?>" readonly>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Medical Address" name="md_address" placeholder="Medical Address" value="<?php echo $row['md_address']; ?>" required><br>
                                    </div>
                                    <div class="form-group">
                                        <select name="md_area" class="form-control rounded-pill" required style="height: 49px; padding-right:10px; font-size: 1.1rem !important;">
                                            <option selected><?php echo $row['md_area']; ?></option>
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
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner Name" name="pr_name1" placeholder="Chemist / Druggist / Pharmacist Name" value="<?php echo $row['pr_name1']; ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner No." name="pr_number1" placeholder="Chemist / Druggist / Pharmacist Number" value="<?php echo $row['pr_number1']; ?>" pattern="[0-9]{10}" required>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person Name" name="pr_name2" value="<?php echo $row['pr_name2']; ?>" placeholder="Contact Person Name">
                                    </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person No." name="pr_number2" placeholder="Contact Person No." value="<?php echo $row['pr_number2']; ?>" pattern="[0-9]{10}">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Telephone No." name="pr_telephone" value="<?php echo $row['pr_telephone']; ?>" placeholder="Telephone No." pattern="[0-9]+">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="email" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Email" name="pr_email" placeholder="Email Address" value="<?php echo $row['pr_email']; ?>" required>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Drug License No." name="drug_no" value="<?php echo $row['drug_no']; ?>" placeholder="Drug License No." readonly>
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="GST No." pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" value="<?php echo $row['gst_no']; ?>" name="gst_no" placeholder="GST No." readonly>
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