<?php
include('../database/conn.php');
$id1 = $_GET['cat_id'];
$hl = "SELECT * FROM `categories` WHERE cat_id=$id1";

$result1 = $conn->query($hl);

$id = $_GET['cat_id'];
$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name FROM add_product p, categories c WHERE p.cat_id = c.cat_id AND c.cat_id='$id'";

$result = $conn->query($sql);

//Edit Category
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_cat'])) {
        $cat_id = $_GET['cat_id'];
        $cat_name = $_POST['cat_name'];

        $target_dir = "category/";
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
        $cat_img = $_FILES["fileToUpload"]["name"];

        $cat_up = "UPDATE `categories` SET `cat_name`='$cat_name',`cat_img`='$cat_img' WHERE cat_id = $cat_id";

        if ($conn->query($cat_up) === TRUE) {
            echo "<script> window.location.href='../admin/dashboard.php?page=ad_cat.php&&cat_id=$id1';</script>";
        } else {
            echo "Error: " . $cat_up . "<br>" . $conn->error;
        }
    }
}


?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">
                <div class="d-flex justify-content-between">
                    <?php
                    if ($result1->num_rows > 0) {
                        while ($row1 = $result1->fetch_assoc()) {
                            echo $row1['cat_name'];
                    ?>
                            <a href="#updateModal5" class="edit" data-toggle="modal">
                                <i class="fa-solid fa-pen-to-square update5" style="font-size: 1.5rem;" data-toggle="tooltip" data-id="<?php echo $row1['cat_id']; ?>" data-name="<?php echo $row1['cat_name']; ?>" title="Edit">&#xE254; </i>
                            </a>
                    <?php
                        }
                    }
                    ?>
                </div>
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
                            <th>Category</th>
                            <th>Pkg</th>


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
                                <td><?php echo $row['cat_name']      ?></td>
                                <td><?php echo $row['pkg']    ?></td>


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
<!-- Edit Modal -->
<div class="modal fade" id="updateModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" id="update_form5" enctype="multipart/form-data">

                    <input type="text" id="cat_id" name="cat_id" class="form-control" disabled><br>

                    <div class="form-group">
                        <input class="form-control" id="cat_name" name="cat_name" required>
                    </div>

                    <div class="form-group">
                        <label for="visitingcard">Upload Category Picture</label><br>
                        <input type="file" name="fileToUpload" id="cat_img" required>
                    </div>

                    <hr>

                    <input type="submit" class="btn btn-success" name="edit_cat" value="Update" id="update5"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>