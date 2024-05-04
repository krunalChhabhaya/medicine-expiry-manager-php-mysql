<?php
include('../database/conn.php');

$md_id = $_SESSION['md_id'];
$sql = "SELECT * FROM `upload_doc` WHERE md_id=$md_id";
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
                            <h1 class="h4 text-gray-900 mb-4">Documents</h1>
                        </div>
                        <form class="user" method="post" enctype="multipart/form-data">
                            <div class="form-group">

                                <label>Enter Pancard Number</label>
                                <input type="text" class="form-control form-control-user" style="font-size: 1.1rem !important;" id="Pancard No." name="pan_no" placeholder="Pancard No." value="<?php echo $row['pan_no']; ?>" disabled>

                                <hr>
                                <div class="form-group d-flex flex-column aaa">
                                    <label>Pancard</label>
                                    <img src="../user/banking/<?php echo $row['pan_img'] ?>" alt="">
                                </div>
                                <hr>
                                <div class="form-group d-flex flex-column bbb">
                                    <label>Business Bill</label>
                                    <img src="../user/banking/<?php echo $row['bill_img'] ?>" alt="">
                                </div>
                                <hr>
                                <div class="form-group d-flex flex-column aaa">
                                    <label>Visiting Card</label>
                                    <img src="../user/banking/<?php echo $row['card_img'] ?>" alt="">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>