<?php
include('../database/conn.php');

$i = 1;

$md_id = $_SESSION['md_id'];

$sql = "SELECT p.`pd_name`, p.`drug_name`, p.`company`, p.`pkg`,c. `cat_name`,m.`md_area`,s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, o.status, o.order_id FROM `add_product` p, `categories` c,`medical_details` m,stock s,orders o WHERE s.pd_id=p.pd_id AND m.md_id=s.md_id AND p.cat_id=c.cat_id AND p.pd_id=o.pd_id AND o.status != 'Paid' AND o.ss_id=$md_id";

$result = $conn->query($sql);

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">My Requests</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>No</th>
                            <th>Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Qty</th>
                            <th>Pkg</th>
                            <th>Exp</th>
                            <th>PTR</th>
                            <th>MRP</th>
                            <th>Price</th>
                            <th>Location</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>

                                <td><?php echo $i ?></td>
                                <td><?php echo $row['pd_name']  ?></td>
                                <td><?php echo $row['drug_name']   ?></td>
                                <td><?php echo $row['company']      ?></td>
                                <td><?php echo $row['cat_name']    ?></td>
                                <td><?php echo $row['quantity']         ?></td>
                                <td><?php echo $row['pkg']         ?></td>
                                <td><?php echo $row['exp_date']   ?></td>
                                <td><?php echo $row['ptr']   ?></td>
                                <td><?php echo $row['mrp']  ?></td>
                                <td><?php echo $row['price']      ?></td>
                                <td><?php echo $row['md_area']    ?></td>
                                <!-- <td><?php print_r($row['order_id']) ?></td> -->
                                <td>
                                    <?php if ($row['status'] == '✔ Accept') { ?>
                                        <form method="POST" action="payment.php">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                                            <input type="submit" value="MakePayment">
                                        </form>
                                    <?php   }
                                     else {
                                        echo $row['status'];
                                    }
                                    ?>
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