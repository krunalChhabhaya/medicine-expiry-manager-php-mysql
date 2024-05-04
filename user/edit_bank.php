<?php
include('../database/conn.php');

// $bank_id = $_GET['bank_id'];
$md_id = $_SESSION['md_id'];
$sql = "SELECT * FROM `bank_details` WHERE md_id=$md_id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>


<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Banking Details</h1>
                        </div>
                        <form class="user" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Enter Account No.</label>
                                <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Account No." name="account_no" placeholder="Account No." value="<?php echo $row['account_no'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Select Bank Name</label>
                                <select name="bank_name" class="form-control rounded-pill" required style="height: 49px; padding-right:10px; font-size: 1.1rem !important;" disabled>
                                    <option selected="selected" value="0"><?php echo $row['bank_name']; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Enter Bank Branch</label>
                                <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Bank Branch" name="bank_branch" placeholder="Bank Branch" value="<?php echo $row['bank_branch'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label>Enter IFSC No.</label>
                                <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="IFSC No." name="bank_ifsc" placeholder="IFSC Number" value="<?php echo $row['bank_ifsc'] ?>" disabled>
                            </div>

                            <div class="form-group d-flex flex-column aaa">
                                <label>Bank Cheque</label>
                                <img src="../user/banking/<?php echo $row['bank_cheque'] ?>" alt="">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>