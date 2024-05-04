<?php
include('../database/conn.php');

$md_id = $_SESSION["md_id"];

$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, c.cat_name, p.pkg FROM add_product p,categories c WHERE p.`cat_id`=c.`cat_id`;";

$result = $conn->query($sql);

$i = 1;

$show_ph = "SELECT * FROM `medical_details`";

$result4 = $conn->query($show_ph);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $pd_id = $_POST['pd_id'];
    $md_id = $_SESSION["md_id"];
    $mrp = $_POST['mrp'];
    $ptr = $_POST['ptr'];
    $batch_no = $_POST['batch_no'];
    $quantity = $_POST['quantity'];
    $mfg_date = $_POST['mfg_date'];
    $exp_date = $_POST['exp_date'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sell_pro = "INSERT INTO `stock`(`pd_id`,`md_id`, `mrp`, `ptr`, `batch_no`, `quantity`, `mfg_date`, `exp_date`, `price`, `status`) VALUES ('$pd_id','$md_id','$mrp','$ptr','$batch_no','$quantity','$mfg_date','$exp_date','$price','$status')";

    if ($conn->query($sell_pro) === TRUE) { ?>
        <script>
            swal({
                title: "Added !",
                text: "Product Added Successfully !",
                icon: "success",
                button: "Okay",
            });
        </script>
<?php } else {
        echo "Error: " . $sell_pro . "<br>" . $conn->error;
    }
}
?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Sell Products</h6>
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
                            <th>Pkg</th>
                            <th>Sell</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr id="<?php echo $row["pd_id"]; ?>">
                                <td><?php echo $i ?></td>
                                <td><?php echo $row['pd_name']         ?></td>
                                <td><?php echo $row['drug_name']  ?></td>
                                <td><?php echo $row['company']   ?></td>
                                <td><?php echo $row['cat_name']      ?></td>
                                <td><?php echo $row['pkg']    ?></td>
                                <td>
                                    <a href="#salesModal" class="edit" data-toggle="modal">
                                        <i class="fa-solid fa-arrow-up-from-bracket update" style="font-size: 25px;" data-toggle="tooltip" data-id="<?php echo $row["pd_id"]; ?>" title="Edit">&#xE254;</i>
                                    </a>
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

<div class="modal fade" id="salesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sell Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="">

                    <div class="form-group">
                        <input type="text" id="id_u" name="pd_id" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Add Quantity (per pkg)" name="quantity" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Batch No." name="batch_no" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="PTR (per pkg)" name="ptr" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="MRP (per pkg)" name="mrp" value="" required>
                    </div>

                    <div class="d-flex">
                        <div class="form-group">
                            <label class="ml-5 pl-5">MFG</label>
                            <input type="text" class="form-control" name="mfg_date" value="" pattern="[0-9]{2},[0-9]{4}" placeholder="MM,YYYY" required>
                        </div>

                        <div class="form-group">
                            <label class="ml-5 pl-5">EXP</label>
                            <input type="text" class="form-control ml-2" name="exp_date" value="" pattern="[0-9]{2},[0-9]{4}" placeholder="MM,YYYY" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Selling Price (according to total quantity)" name="price" value="" required>
                    </div>

                    <input type="hidden" id="status" name="status" class="form-control" value="Pending">

                    <hr>
                    <button type="submit" class="btn btn-success" id="sell_pro"><i class="fa fa-check fa-fw"></i>Upload</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>