<?php
include('../database/conn.php');
$i = 1;
$md_id = $_SESSION['md_id'];
$sql = "SELECT p.`pd_name`, p.`drug_name`, p.`company`, p.`pkg`,c. `cat_name`,m.`md_area`,s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, o.order_id, o.status, o.ss_id, s.stock_id FROM `add_product` p, `categories` c,`medical_details` m, stock s, orders o WHERE s.pd_id=p.pd_id and m.md_id=s.md_id AND p.cat_id=c.cat_id AND p.pd_id=o.pd_id AND o.status != 'Paid' AND m.md_id=$md_id";

$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];
    $stock_id = $_POST['stock_id'];

    $st = "UPDATE `orders` SET `status`='$status' WHERE `order_id`=$order_id";
    if ($conn->query($st) === TRUE) {
        echo '';
    } else {
        echo "Error: " . $st . "<br>" . $conn->error;
    }

    $ps = "UPDATE `stock` SET `status`='$status' WHERE `stock_id`=$stock_id";

    if ($conn->query($ps) === TRUE) {
        echo "<script> window.location.href='../user/index.php?page=new_requests.php';</script>";
    } else {
        echo "Error: " . $ps . "<br>" . $conn->error;
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">New Requests</h6>
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
                            <th>Mfg</th>
                            <th>Exp</th>
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
                                <td><?php echo $row['batch_no']   ?></td>
                                <td><?php echo $row['mfg_date']  ?></td>
                                <td><?php echo $row['exp_date']   ?></td>
                                <td><?php echo $row['mrp']  ?></td>
                                <td><?php echo $row['price']      ?></td>
                                <td><?php echo $row['md_area']    ?></td>
                                <td>
                                    <?php if ($row['status'] == 'Request') { ?>
                                        <form method="post">
                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                                            <input type="hidden" name="stock_id" value="<?php echo $row['stock_id'] ?>">
                                            <input type="submit" name="status" value="✔ Accept">

                                            <input type="submit" name="status" value="❌ Decline">
                                        </form>
                                    <?php
                                    } else {
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
