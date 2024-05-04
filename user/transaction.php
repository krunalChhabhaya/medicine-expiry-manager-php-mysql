<?php
include('../database/conn.php');

$md_id = $_SESSION['md_id'];

$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name, m.`md_name`, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_date, o.ss_id, o.status, o.md_id, o.order_id FROM add_product p, stock s, categories c, medical_details m, orders o WHERE p.pd_id = o.pd_id AND p.cat_id = c.cat_id AND m.md_id = o.ss_id AND o.status = 'Paid' AND s.stock_id = o.stock_id AND o.md_id = '$md_id' ";

$result = $conn->query($sql);
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Transactions (Received)</h6>
            <a href="received_print.php" target="_blank" class="btn btn-success pull-right"><span><i class="fa-solid fa-print"></i></span> Print</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Buyer</th>
                            <th>Pkg</th>
                            <th>Batch No</th>
                            <th>MFG</th>
                            <th>EXP</th>
                            <th>PTR</th>
                            <th>MRP</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ss_id = $row['ss_id'];
                            $nm = "SELECT md_name FROM medical_details WHERE md_id = $ss_id";
                            $result1 = $conn->query($nm);
                            $row1 = $result1->fetch_assoc();
                    ?>
                            <tr>

                                <td><?php echo $row['pd_name']     ?></td>
                                <td><?php echo $row['drug_name']     ?></td>
                                <td><?php echo $row['company']     ?></td>
                                <td><?php echo $row['cat_name']      ?></td>
                                <td><?php echo $row['quantity']     ?></td>
                                <td><?php echo $row1['md_name']  ?></td>
                                <td><?php echo $row['pkg']      ?></td>
                                <td><?php echo $row['batch_no']      ?></td>
                                <td><?php echo $row['mfg_date']      ?></td>
                                <td><?php echo $row['exp_date']     ?></td>
                                <td><?php echo $row['ptr']     ?></td>
                                <td><?php echo $row['mrp']      ?></td>
                                <td><?php echo $row['price']      ?></td>
                                <td><?php echo $row['stock_date']      ?></td>
                                <td>
                                    <form method="POST" action="index.php?page=receipt_av.php&order_id=<?php echo $row['order_id'] ?>">
                                        <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                                        <input type="submit" value="View Details">
                                    </form>
                                </td>
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