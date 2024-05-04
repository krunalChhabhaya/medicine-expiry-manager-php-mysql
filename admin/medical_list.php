<?php
include('../database/conn.php');
$i = 1;
$show_md = "SELECT m.`md_id`, m.`md_name`, m.`md_address`, m.`md_area`, m.`pr_name1`, m.`pr_number1`, m.`pr_name2`, m.`pr_number2`, m.`pr_telephone`, m.`pr_email`, m.`drug_no`, m.`gst_no`, b.`account_no`, b.`bank_name`, b.`bank_branch`, b.`bank_ifsc`, b.`bank_cheque`, u.`pan_no`, u.`pan_img`, u.`bill_img`, u.`card_img`, f.username FROM `medical_details` m,bank_details b, upload_doc u,final_reg f WHERE  m.`md_id`=b.`md_id`AND m.`md_id`=u.`md_id` AND m.`md_id`=f.`md_id`";

$result = $conn->query($show_md);
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Medical List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Area</th>
                            <th>Owner</th>
                            <th>Phone</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Drug License</th>
                            <th>GST</th>
                            <th>A/C No</th>
                            <th>Bank</th>
                            <th>Branch</th>
                            <th>IFSC</th>
                            <th>Cheque</th>
                            <th>Pan No</th>
                            <th>Pan Img</th>
                            <th>Bill</th>
                            <th>Visiting Card</th>

                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>

                                <td><?php echo $i ?></td>
                                <td><?php echo $row['md_name']?>(<?php echo $row['md_id']?>)</td>
                                <td><?php echo $row['md_address']  ?></td>
                                <td><?php echo $row['md_area']   ?></td>
                                <td><?php echo $row['pr_name1']      ?></td>
                                <td><?php echo $row['pr_number1']    ?></td>
                                <td><?php echo $row['pr_telephone']  ?></td>
                                <td><?php echo $row['pr_email']   ?></td>
                                <td><?php echo $row['drug_no']      ?></td>
                                <td><?php echo $row['gst_no']    ?></td>
                                <td><?php echo $row['account_no']         ?></td>
                                <td><?php echo $row['bank_name']  ?></td>
                                <td><?php echo $row['bank_branch']   ?></td>
                                <td><?php echo $row['bank_ifsc']      ?></td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/banking/<?php echo $row['bank_cheque']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['pan_no']  ?></td>


                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/banking/<?php echo $row['pan_img']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal2">
                                    </button>
                                </td>


                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/banking/<?php echo $row['bill_img']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal3">
                                    </button>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/banking/<?php echo $row['card_img']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal4">
                                    </button>
                                </td>

                            </tr>

                    <?php
                            $i++;
                        }
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- The Image Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <img class="show-img" src="" id="main" alt="certificate" width="100%">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- The Image Modal -->
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <img class="show-img" src="" id="main" alt="certificate" width="100%">
            </div>
        </div>
    </div>
</div>

<!-- The Image Modal -->
<div class="modal" id="myModal3">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img class="show-img" src="" id="main" alt="certificate" width="100%">
            </div>
        </div>
    </div>
</div>


<!-- The Image Modal -->
<div class="modal" id="myModal4">
    <div class="modal-dialog">
        <div class="modal-content">
         <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <img class="show-img" src="" id="main" alt="certificate" width="100%">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const change = src => {
        document.getElementById('main').src = src
    }
</script>