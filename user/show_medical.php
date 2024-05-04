<?php

include('../database/conn.php');

$order_id = $_GET['odid'];

$sql = "SELECT m.`md_id`, m.`md_name`, m.`md_address`, m.`md_area`, m.`pr_name1`, m.`pr_number1`, m.`pr_name2`, m.`pr_number2`, m.`pr_telephone`, m.`pr_email`, m.`gst_no`, o.md_id, o.order_id FROM `medical_details` m, orders o WHERE m.md_id = o.md_id AND o.order_id = $order_id";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row d-flex justify-content-center px-5">
                <div class="col-lg-12 pt-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4" style="font-weight: bold !important;">Medical Details of Your Order</h1>
                    </div>
                </div>
                <div class="col-lg-12">
                    <form class="user" method="post" action="">
                        <div class="form-group">
                            <label class="d-flex justify-content-center">Medical Name</label>
                            <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user w-50 mx-auto" id="Medical Name" name="md_name" placeholder="Medical Name" value="<?php echo $row['md_name']; ?>" readonly>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Medical Address</label>
                                    <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Medical Address" name="md_address" placeholder="Medical Address" value="<?php echo $row['md_address']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Medical Area</label>
                                    <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Medical Area" name="md_area" placeholder="Medical Area" value="<?php echo $row['md_area']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Medical Owner</label>
                                    <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner Name" name="pr_name1" placeholder="Chemist / Druggist / Pharmacist Name" value="<?php echo $row['pr_name1']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Medical Owner No.</label>
                                    <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Owner No." name="pr_number1" placeholder="Chemist / Druggist / Pharmacist Number" value="<?php echo $row['pr_number1']; ?>" pattern="[0-9]{10}" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Contact Person</label>
                                    <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person Name" name="pr_name2" value="<?php echo $row['pr_name2']; ?>" placeholder="Contact Person Name" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Contact Person No.</label>
                                    <input type="tel" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Contact Person No." name="pr_number2" placeholder="Contact Person No." value="<?php echo $row['pr_number2']; ?>" pattern="[0-9]{10}" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Telephone No.</label>
                                    <input type="text" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Telephone No." name="pr_telephone" value="<?php echo $row['pr_telephone']; ?>" placeholder="Telephone No." pattern="[0-9]+" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="d-flex justify-content-center">Email Address</label>
                                    <input type="email" style="font-size: 1.1rem !important;" class="form-control form-control-user" id="Email" name="pr_email" placeholder="Email Address" value="<?php echo $row['pr_email']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <a href="../user/index.php?page=transaction2.php"> <-- Back </a><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>