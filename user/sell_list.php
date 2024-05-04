<?php
include('../database/conn.php');

$i = 1;

$md_id = $_SESSION['md_id'];

// $sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_date, p.pkg, o.status, s.md_id FROM add_product p, stock s, categories c, orders o WHERE p.pd_id = s.pd_id AND p.cat_id = c.cat_id AND s.md_id='$md_id'";
$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_date, p.pkg, s.status FROM add_product p, stock s, categories c WHERE p.pd_id = s.pd_id AND p.cat_id = c.cat_id AND md_id=$md_id";




$result = $conn->query($sql);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Sell Product List</h6>
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
                            <th>Batch No.</th>
                            <th>PTR</th>
                            <th>MRP</th>
                            <th>MFG</th>
                            <th>EXP</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['pd_name'] ?></td>
                                <td><?php echo $row['drug_name']         ?></td>
                                <td><?php echo $row['company']  ?></td>
                                <td><?php echo $row['cat_name']  ?></td>
                                <td><?php echo $row['quantity']   ?></td>
                                <td><?php echo $row['pkg']      ?></td>
                                <td><?php echo $row['batch_no']    ?></td>
                                <td><?php echo $row['ptr']    ?></td>
                                <td><?php echo $row['mrp']    ?></td>
                                <td><?php echo $row['mfg_date']    ?></td>
                                <td><?php echo $row['exp_date']    ?></td>
                                <td><?php echo $row['price']    ?></td>
                                <td><?php echo $row['stock_date']    ?></td>
                                <td><?php  echo $row['status']   ?></td> 
                                
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
