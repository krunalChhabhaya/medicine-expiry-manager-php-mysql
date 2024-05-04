<?php
include('../database/conn.php');
$id1 = $_GET['cat_id'];
$hl = "SELECT * FROM `categories` WHERE cat_id=$id1";

$result1 = $conn->query($hl);

$id = $_GET['cat_id'];
$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, m.md_area, p.pkg, c.cat_name, s.`md_id`, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.status FROM add_product p, stock s, categories c, medical_details m WHERE p.pd_id = s.pd_id AND p.cat_id = c.cat_id AND m.md_id = s.md_id AND s.status != 'Paid' AND c.cat_id=$id";

$result = $conn->query($sql);
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;"><?php 
            if ($result1->num_rows > 0) {
                while ($row1 = $result1->fetch_assoc()) { echo $row1['cat_name']; } } ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Area</th>
                            <th>Qty</th>
                            <th>Category</th>
                            <th>Pkg</th>
                            <th>Exp</th>
                            <th>PTR</th>
                            <th>MRP</th>
                            <th>Price</th>

                        </tr>
                    </thead><?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?> 
                            <tr>

                                <td><?php echo $row['pd_name']         ?></td>
                                <td><?php echo $row['drug_name']  ?></td>
                                <td><?php echo $row['company']   ?></td>
                                <td><?php echo $row['md_area'] ?></td>
                                <td><?php echo $row['quantity']   ?></td>
                                <td><?php echo $row['cat_name']      ?></td>
                                <td><?php echo $row['pkg']    ?></td>
                                <td><?php echo $row['exp_date']  ?></td>
                                <td><?php echo $row['ptr']         ?></td>
                                <td><?php echo $row['mrp']   ?></td>
                                <td><?php echo $row['price']      ?></td>

                            </tr>
                    <?php
                                }
                            }
                    ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->