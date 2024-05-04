<?php
include('../database/conn.php');

$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name, m.`md_name`, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_date, s.status FROM add_product p, stock s, categories c, medical_details m WHERE p.pd_id = s.pd_id AND p.cat_id = c.cat_id AND m.md_id = s.md_id AND s.status != 'Paid'";

$result = $conn->query($sql);
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Inventory</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Name</th>
                                            <th>Seller</th>
                                            <th>Category</th>
                                            <th>Pkg</th>
                                            <th>BatchNo</th>
                                            <th>Mfg</th>
                                            <th>Exp</th>
                                            <th>PTR</th>
                                            <th>MRP</th>
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
                                         
                                                <td><?php echo $row['quantity']     ?></td>
                                                <td><?php echo $row['pd_name']     ?></td>
                                                <td><?php echo $row['md_name']      ?></td>
                                                <td><?php echo $row['cat_name']      ?></td>
                                                <td><?php echo $row['pkg']      ?></td>
                                                <td><?php echo $row['batch_no']      ?></td>
                                                <td><?php echo $row['mfg_date']      ?></td>
                                                <td><?php echo $row['exp_date']     ?></td>
                                                <td><?php echo $row['ptr']     ?></td>
                                                <td><?php echo $row['mrp']      ?></td>
                                                <td><?php echo $row['price']      ?></td>
                                                <td><?php echo $row['stock_date']      ?></td>
                                                <td><?php echo $row['status'] ?></td>
                                                
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


