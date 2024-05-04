<?php
include('../database/conn.php');

$md_id = $_SESSION['md_id'];

$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, m.md_area, p.pkg, c.cat_name, s.`md_id`, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_id, m.md_id, s.status FROM add_product p, stock s, categories c, medical_details m WHERE p.pd_id = s.pd_id AND p.cat_id = c.cat_id AND m.md_id = s.md_id AND s.status != 'Paid' AND s.md_id != '$md_id'";

$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['type'] == 9) {
        $stock_id = $_POST['stock_id'];
        $pd_id = $_POST['pd_id'];
        $md_id = $_POST['md_id'];
        $status = $_POST['status'];
        $ss_id = $_SESSION['md_id'];

        $req = "INSERT INTO `orders`(`stock_id`, `pd_id`, `md_id`, `status`, `ss_id`) VALUES ('$stock_id','$pd_id','$md_id','$status','$ss_id')";

        if ($conn->query($req) === TRUE) {
            
        } else {
            echo "Error: " . $req . "<br>" . $conn->error;
        }

        $st = "UPDATE `stock` SET `status`='$status' WHERE `stock_id`=$stock_id";

        if ($conn->query($st) === TRUE) { 
            echo "<script> window.location.href='../user/index.php?page=my_request.php';</script>";
      } else {
            echo "Error: " . $st . "<br>" . $conn->error;
        }
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Buy Products</h6>
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php
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
                                <td><?php echo $row['ptr']  ?></td>
                                <td><?php echo $row['mrp']   ?></td>
                                <td><?php echo $row['price']      ?></td>
                                <td>
                                    <a href="#sucess" class="edit" data-toggle="modal">
                                        <i class="fa-solid fa-cart-shopping order" style="font-size: 1.3rem;" data-toggle="tooltip" data-s_id="<?php echo $row["stock_id"]; ?>" data-name="<?php echo $row["pd_name"]; ?>" data-qty="<?php echo $row["quantity"]; ?>" data-pd_id="<?php echo $row["pd_id"]; ?>" data-md_id="<?php echo $row["md_id"]; ?>" data-cmp="<?php echo $row["company"]; ?>" data-cat="<?php echo $row["cat_name"]; ?>" data-pkg="<?php echo $row["pkg"]; ?>" data-exp="<?php echo $row["exp_date"]; ?>" data-price="<?php echo $row["price"]; ?>" data-drug="<?php echo $row["drug_name"]; ?>" data-area="<?php echo $row["md_area"]; ?>" data-ptr="<?php echo $row["ptr"]; ?>" data-mrp="<?php echo $row["mrp"]; ?>" title="Buy">&#xE254; </i>
                                    </a>
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



<div class="modal fade" id="sucess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Product to Seller</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="order_form">

                    <input type="hidden" id="stock_id" name="stock_id" class="form-control" required>

                    <div class="form-group">
                        <label>Product Name</label>
                        <input class="form-control" id="pd_name" name="pd_name" disabled>
                    </div>

                    <div class="form-group">
                        <label>Composition</label>
                        <input class="form-control" id="drug_name" name="drug_name" disabled>
                    </div>

                    <div class="form-group">
                        <label>Quantity</label>
                        <input class="form-control" id="quantity" name="quantity" disabled>
                    </div>

                    <div class="form-group">
                        <label>Company</label>
                        <input class="form-control" id="company" name="company" disabled>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <input class="form-control" id="cat_name" name="cat_name" disabled>
                    </div>

                    <div class="form-group">
                        <label>Area</label>
                        <input class="form-control" id="md_area" name="md_area" disabled>
                    </div>

                    <div class="form-group">
                        <label>PKG</label>
                        <input class="form-control" id="pkg" name="pkg" disabled>
                    </div>

                    <div class="form-group">
                        <label>EXP Date</label>
                        <input class="form-control" id="exp_date" name="exp_date" disabled>
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input class="form-control" id="price" name="price" disabled>
                    </div>

                    <div class="form-group">
                        <label>PTR</label>
                        <input class="form-control" id="ptr" name="ptr" disabled>
                    </div>

                    <div class="form-group">
                        <label>MRP</label>
                        <input class="form-control" id="mrp" name="mrp" disabled>
                    </div>

                    <input type="hidden" id="pd_id" name="pd_id" class="form-control" required>

                    <input type="hidden" id="md_id" name="md_id" class="form-control" required>

                    <input type="hidden" id="status" name="status" class="form-control" value="Request">

                    <input type="hidden" id="ss_id" name="ss_id" class="form-control" disabled>

                    <input type="hidden" value="9" name="type">
                    <input type="submit" value="Request" class="btn btn-success" id="order"></input>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>