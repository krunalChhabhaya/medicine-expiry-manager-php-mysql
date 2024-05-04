<?php
include('../database/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['req_pd'])) {
        $md_id = $_SESSION['md_id'];
        $req_name = $_POST['req_name'];
        $req_drug = $_POST['req_drug'];
        $req_company = $_POST['req_company'];
        $req_pack = $_POST['req_pack'];
        $req_category = $_POST['req_category'];
        $req_mrp = $_POST['req_mrp'];
        $status = $_POST['status'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
        $req_img = $_FILES["fileToUpload"]["name"];


        $sql = "INSERT INTO `req_product`(`md_id`, `req_img`, `req_name`, `req_drug`, `req_company`, `req_pack`, `req_category`, `req_mrp`, `status`) VALUES ('$md_id','$req_img','$req_name','$req_drug','$req_company','$req_pack','$req_category','$req_mrp','$status')";


        if ($conn->query($sql) === TRUE) { ?>
            <script>
                swal({
                    title: "Requested !",
                    text: "Product Requested to Admin !",
                    icon: "success",
                    button: "Okay",
                });
            </script>
    <?php    } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$i = 1;

$md_id = $_SESSION['md_id'];

$show_req = "SELECT * FROM `req_product` WHERE md_id=$md_id";

$result = $conn->query($show_req);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['req_ed'])) {
        $req_id = $_POST['req_id'];
        $req_name = $_POST['req_name'];
        $req_drug = $_POST['req_drug'];
        $req_company = $_POST['req_company'];
        $req_pack = $_POST['req_pack'];
        $req_category = $_POST['req_category'];
        $req_mrp = $_POST['req_mrp'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
        $req_img = $_FILES["fileToUpload"]["name"];

        $up_pd = "UPDATE `req_product` SET `req_img`='$req_img',`req_name`='$req_name',`req_drug`='$req_drug',`req_company`='$req_company',`req_pack`='$req_pack',`req_category`='$req_category',`req_mrp`='$req_mrp' WHERE `req_id`='$req_id'";

        if ($conn->query($up_pd) === TRUE) {
            echo "<script> window.location.href='../user/index.php?page=request_medicine.php';</script>";
        } else {
            echo "Error: " . $up_pd . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_pd'])) {

        $req_id = $_POST['req_id1'];

        $del_pd = "DELETE FROM `req_product` WHERE `req_id` = $req_id  ";

        if ($conn->query($del_pd) === TRUE) {
            echo "<script> window.location.href='../user/index.php?page=request_medicine.php';</script>";
        } else {
            echo "Error: " . $del_pd . "<br>" . $conn->error;
        }
    }
}

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">


        <div class="card-header py-3 d-flex  align-items-center">
            <div class="mr-auto">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">Requested Product's</h4>
            </div>
            <div class=" d-flex  align-items-center justify-content-end">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">
                    <button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">Request Product <i class="fas fa-fw fa-plus "></i></button>
                </h4>
            </div>

        </div>
        <!-- <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Request Product&nbsp;<button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></button></h4>
        </div> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Pkg</th>
                            <th>Category</th>
                            <th>MRP</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr id="<?php echo $row["req_id"]; ?>">
                                <td><?php echo $i ?></td>
                                <?php $img1 = $row['req_img']; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="uploads/<?php echo $row['req_img']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['req_name']         ?></td>
                                <td><?php echo $row['req_drug']  ?></td>
                                <td><?php echo $row['req_company']  ?></td>
                                <td><?php echo $row['req_pack']   ?></td>
                                <td><?php echo $row['req_category']      ?></td>
                                <td><?php echo $row['req_mrp']    ?></td>
                                <td><?php if ($row['status'] == 'Request') {
                                        echo "Requested";
                                    } elseif ($row['status'] == '✔ Add') {
                                        echo "✔ Added";
                                    } ?></td>
                                <td>
                                    <?php if ($row['status'] == 'Request') { ?>
                                        <a href="#updateModal3" class="edit" data-toggle="modal">
                                            <i class="fa-solid fa-pen-to-square update3" style="font-size: 1.3rem;" data-toggle="tooltip" data-id="<?php echo $row["req_id"]; ?>" data-name="<?php echo $row["req_name"]; ?>" data-drug="<?php echo $row["req_drug"]; ?>" data-company="<?php echo $row["req_company"]; ?>" data-cat="<?php echo $row["req_pack"]; ?>" data-pkg="<?php echo $row["req_category"]; ?>" data-mrp="<?php echo $row["req_mrp"]; ?>" title="Edit">&#xE254; </i>
                                        </a>
                                        <a href="#deleteModal2" class="delete" data-id="<?php echo $row["req_id"]; ?>" data-toggle="modal">
                                            <i class="fa-solid fa-trash delete2 " style="font-size: 1.2rem; margin-left: 10px;" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                        </a>
                                    <?php
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





<!-- Product Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="req_name" value="" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" textarea" class="form-control" placeholder="Composition" name="req_drug" required></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Company" name="req_company" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Packaging" name="req_pack" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Category" name="req_category" value="" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="MRP" name="req_mrp" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="Product Image">Upload Product Image</label><br>
                        <input type="file" name="fileToUpload" id="Product image">
                    </div>

                    <input type="hidden" id="status" name="status" class="form-control" value="Request">

                    <hr>
                    <input type="submit" name="req_pd" value="Save" class="btn btn-success"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
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



<!-- Edit Modal-->
<div class="modal fade" id="updateModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Request Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="update_form3" enctype="multipart/form-data">

                    <input type="text" id="req_id" name="req_id" class="form-control" readonly><br>

                    <div class="form-group">
                        <input class="form-control" id="req_name" name="req_name" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" textarea" class="form-control" id="req_drug" name="req_drug" required></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="req_company" name="req_company" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="req_pack" name="req_pack" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="req_category" name="req_category" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="req_mrp" name="req_mrp" required>
                    </div>
                    <div class="form-group">
                        <label for="Product Image">Upload Product Image</label><br>
                        <input type="file" name="fileToUpload" id="Product image">
                    </div>

                    <hr>

                    <input type="submit" name="req_ed" value="Edit" class="btn btn-success" id="update3">
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="">

                    <input type="text" id="id" name="req_id1" class="form-control" readonly>
                    <br>

                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-danger">This action cannot be undone.</p>

                    <hr>

                    <input type="submit" class="btn btn-danger" name="delete_pd" id="del_id" value="Delete"></input>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const change = src => {
        document.getElementById('main').src = src
    }
</script>