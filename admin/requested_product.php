<?php
include('../database/conn.php');

$show_req = "SELECT m.`md_name`, r.`req_id`, r.`req_img`, r.`req_name`, r.`req_drug`, r.`req_company`, r.`req_pack`, r.`req_category`, r.`req_mrp`, r.`status`, r.`created_at` FROM `req_product` r, medical_details m WHERE m.md_id = r.md_id";

$result = $conn->query($show_req);
$i = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $req_id = $_POST['req_id'];
    $status = $_POST['status'];

    $req_st = "UPDATE `req_product` SET `status`='$status' WHERE `req_id`='$req_id'";


    if ($conn->query($req_st) === TRUE) {
        echo "<script> window.location.href='../admin/dashboard.php?page=requested_product.php';</script>";
    } else {
        echo "Error: " . $req_st . "<br>" . $conn->error;
    }
}
?>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Requested Products</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Medical Name</th>
                            <th>Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Pkg</th>
                            <th>Category</th>
                            <th>MRP</th>
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
                                <?php $img1 = $row['req_img']; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/uploads/<?php echo $row['req_img']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['md_name']         ?></td>
                                <td><?php echo $row['req_name']         ?></td>
                                <td><?php echo $row['req_drug']  ?></td>
                                <td><?php echo $row['req_company']  ?></td>
                                <td><?php echo $row['req_pack']   ?></td>
                                <td><?php echo $row['req_category']      ?></td>
                                <td><?php echo $row['req_mrp']    ?></td>
                                <td><?php echo $row['created_at']         ?></td>
                                <td>
                                    <?php if ($row['status'] == 'Request') { ?>
                                        <form method="post">
                                            <input type="hidden" name="req_id" value="<?php echo $row['req_id'] ?>">
                                            <input type="submit" name="status" value="✔ Add">
                                        </form>
                                    <?php
                                    } else
                                        echo "✔ Added";
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
        </div>
    </div>
</div>

<script type="text/javascript">
    const change = src => {
        document.getElementById('main').src = src
    }
</script>