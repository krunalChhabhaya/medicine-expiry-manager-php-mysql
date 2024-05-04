<?php
include('../database/conn.php');

$i = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_pd'])) {
        $pd_name = $_POST['pd_name'];
        $drug_name = $_POST['drug_name'];
        $company = $_POST['company'];
        $cat_id = $_POST['cat_id'];
        $pkg = $_POST['pkg'];

        $sql = "INSERT INTO `add_product`(`pd_name`, `drug_name`, `company`, `cat_id`, `pkg`) VALUES ('$pd_name','$drug_name','$company','$cat_id','$pkg')";

        if ($conn->query($sql) === TRUE) { ?>
            <script>
                swal({
                    title: "Added !",
                    text: "Product Added Successfully !",
                    icon: "success",
                    button: "Okay",
                });
            </script>
        <?PHP  } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo '';
    }
}

//Add Category (Admin)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_cat'])) {

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
                $im_req = "File is not an image.";
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

        $add_cat = "INSERT INTO `categories`(`cat_name`, `cat_img`) VALUES ('$cat_name','$cat_img')";

        if ($conn->query($add_cat) === TRUE) { ?>
            <script>
                swal({
                    title: "Added !",
                    text: "Category Added Successfully !",
                    icon: "success",
                    button: "Okay",
                });
            </script>

        <?php  } else {
            echo "Error: " . $add_cat . "<br>" . $conn->error;
        }
    } else {
        echo '';
    }
}
//View Products
$show_pd = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, c.cat_name, p.pkg FROM add_product p,categories c WHERE p.`cat_id`=c.`cat_id`;";

$result = $conn->query($show_pd);

// Edit Product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_pd'])) {
        $pd_id = $_POST['pd_id'];
        $pd_name = $_POST['pd_name'];
        $drug_name = $_POST['drug_name'];
        $company = $_POST['company'];
        $pkg = $_POST['pkg'];

        $up_pd = "UPDATE `add_product` SET `pd_name`='$pd_name',`drug_name`='$drug_name',`company`='$company',`pkg`='$pkg' WHERE `pd_id`='$pd_id'";

        if ($conn->query($up_pd) === TRUE) {  
            echo "<script> window.location.href='../admin/dashboard.php?page=product_list.php';</script>";
        } else {
            echo "Error: " . $up_pd . "<br>" . $conn->error;
        }
    }
}

// Delete Product
//if (count($_POST) > 0) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_pd'])) {

        $pd_id = $_POST['pd_id1'];


        $del_pd = "DELETE FROM `add_product` WHERE `pd_id` = $pd_id  ";

        if ($conn->query($del_pd) === TRUE) {               
            echo "<script> window.location.href='../admin/dashboard.php?page=product_list.php';</script>";
   } else {
            echo "Error: " . $del_pd . "<br>" . $conn->error;
        }
    }
}

?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex  align-items-center">
            <div class="mr-auto">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">Product List</h4>
            </div>
            <div class=" d-flex  align-items-center justify-content-end">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">
                    <button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">Add Product <i class="fas fa-fw fa-plus "></i></button>
                </h4>
                <h4 class="m-0 font-weight-bold text-primary">
                    <button="#" data-toggle="modal" data-target="#bModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">Add Category <i class="fas fa-fw fa-plus"></i></button>
                </h4>
            </div>
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
                            <th>Action</th>
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
                                    <a href="#updateModal" class="edit" data-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square update1" style="font-size: 1.3rem;" data-toggle="tooltip" data-id="<?php echo $row["pd_id"]; ?>" data-name="<?php echo $row["pd_name"]; ?>" data-drug="<?php echo $row["drug_name"]; ?>" data-company="<?php echo $row["company"]; ?>" data-cat="<?php echo $row["cat_name"]; ?>" data-pkg="<?php echo $row["pkg"]; ?>" title="Edit">&#xE254; </i>
                                    </a>
                                    <a href="#deleteModal" class="delete" data-id="<?php echo $row["pd_id"]; ?>" data-toggle="modal">
                                        <i class="fa-solid fa-trash delete " style="font-size: 1.2rem; margin-left: 10px;" data-toggle="tooltip" title="Delete">&#xE872;</i>
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

<!-- Product Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="">

                    <div class="form-group">
                        <input class="form-control" placeholder="Name" name="pd_name" value="" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" textarea" class="form-control" placeholder="Composition" name="drug_name" required></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" placeholder="Company" name="company" value="" required>
                    </div>

                    <div class="form-group">
                        <select class='form-control' name='cat_id' required>
                            <option disabled selected hidden>Category</option>
                            <?php
                            $catquery = mysqli_query($conn, "SELECT `cat_id`,`cat_name` FROM `categories` ORDER BY `cat_id`");
                            while ($row = mysqli_fetch_array($catquery))
                                echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name']  .   "</option>";
                            ?>
                    </div>

                    <div class="form-group">
                        <input class="form-control mt-3" placeholder="Packaging" name="pkg" value="" required>
                    </div>
                    <hr>

                    <input type="submit" name="add_pd" value="Save" class="btn btn-success"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Category Modal-->
<div class="modal fade" id="bModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="cat_name" name="cat_name" placeholder="Category Name">
                    </div>

                    <div class="form-group">
                        <label for="visitingcard">Upload Category Picture</label><br>
                        <input type="file" name="fileToUpload" id="cat_img" required>
                    </div>

                    <hr>

                    <input type="submit" name="add_cat" value="Save" class="btn btn-success"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" id="update_form" action="">
                    <input type="text" id="pd_id" name="pd_id" class="form-control" readonly><br>

                    <div class="form-group">
                        <input class="form-control" id="pd_name" name="pd_name" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" class="form-control" id="drug_name" name="drug_name" required></textarea>
                    </div>

                    <div class="form-group">
                        <input class="form-control" id="company" name="company" required>
                    </div>

                    <!-- <div class="form-group"> -->
                    <!-- <select class='form-control' name='cat_id' id="cat_id"> -->
                    <!-- <option selected hidden>Category</option> -->
                    <!-- <option id="cat_id">dfdfdf</option> -->


                    <!-- <option id="cat_id" selected></option> -->
                    <!-- </select> -->
                    <!-- <input class="form-control" id="cat_id" name="cat_id" required> -->
                    <!-- <div id="cat_id">

                        </div> -->
                    <!-- </div> -->

                    <!-- <div class="form-group">
                        <input class="form-control" id="cat_id" name="cat_id" required>
                    </div> -->

                    <div class="form-group">
                        <input class="form-control mt-3" id="pkg" name="pkg" required>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-success" name="edit_pd" value="Update" id="update1"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <input type="text" id="id" name="pd_id1" class="form-control" readonly>
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