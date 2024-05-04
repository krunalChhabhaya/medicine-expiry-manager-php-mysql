<?php
include('../database/conn.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['an_up'])) {
        $an_title = $_POST['an_title'];
        $description = $_POST['description'];

        $target_dir = "announcement/";
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
        $an_attach = $_FILES["fileToUpload"]["name"];


        $add_ann = "INSERT INTO `announcement`(`an_title`, `description`, `an_attach`) VALUES ('$an_title','$description','$an_attach')";

        if ($conn->query($add_ann) === TRUE) { ?>
            <script>
                swal({
                    title: "Added !",
                    text: "Announcement Added Successfully !",
                    icon: "success",
                    button: "Okay",
                });
            </script>
<?php    } else {
            echo "Error: " . $add_ann . "<br>" . $conn->error;
        }
    }
}

$show_ann = "SELECT * FROM `announcement`";

$result = $conn->query($show_ann);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['up_an'])) {
        $an_id = $_POST['an_id'];
        $an_title = $_POST['an_title'];
        $description = $_POST['description'];

        $target_dir = "announcement/";
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
        $an_attach = $_FILES["fileToUpload"]["name"];

        $an_edit = "UPDATE `announcement` SET `an_title`='$an_title',`description`='$description',`an_attach`='$an_attach' WHERE `an_id`=$an_id";

        if ($conn->query($an_edit) === TRUE) {
            echo "<script> window.location.href='../admin/dashboard.php?page=announcement.php';</script>";
        } else {
            echo "Error: " . $an_edit . "<br>" . $conn->error;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_an'])) {

        $an_id = $_POST['an_id1'];


        $del_an = "DELETE FROM `announcement` WHERE `an_id` = $an_id";

        if ($conn->query($del_an) === TRUE) {
            echo "<script> window.location.href='../admin/dashboard.php?page=announcement.php';</script>";
        } else {
            echo "Error: " . $del_an . "<br>" . $conn->error;
        }
    }
}
?>

<!-- Announcement Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Announcement</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <input class="form-control" placeholder="Title" name="an_title" value="" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" textarea" class="form-control" placeholder="Description" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="Announcement Image">Upload Attachment</label><br>
                        <input type="file" name="fileToUpload" id="Announcement Image">
                    </div>

                    <hr>
                    <input type="submit" value="Save" name="an_up" class="btn btn-success"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex  align-items-center">
            <div class="mr-auto">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">Announcement's</h4>
            </div>
            <div class=" d-flex  align-items-center justify-content-end">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">
                    <button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">Add Announcement <i class="fas fa-fw fa-plus "></i></button>
                </h4>
            </div>

        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Attachment</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?php echo $row['an_id']       ?></td>
                                <td><?php echo $row['an_title']     ?></td>
                                <td><?php echo $row['description']    ?></td>
                                <?php $img1 = $row['an_attach']; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="announcement/<?php echo $row['an_attach']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['date']    ?></td>
                                <td>
                                    <a href="#updateModal2" class="edit" data-toggle="modal">
                                        <i class="fa-solid fa-pen-to-square update2" style="font-size: 1.3rem;" data-toggle="tooltip" data-id="<?php echo $row["an_id"]; ?>" data-name="<?php echo $row["an_title"]; ?>" data-des="<?php echo $row["description"]; ?>" title="Edit">&#xE254; </i>
                                    </a>
                                    <a href="#deleteModal1" class="delete" data-id="<?php echo $row["an_id"]; ?>" data-toggle="modal">
                                        <i class="fa-solid fa-trash delete1 " style="font-size: 1.2rem; margin-left: 10px;" data-toggle="tooltip" title="Delete">&#xE872;</i>
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

<!-- The Image Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post" enctype="multipart/form-data">
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

<!-- Edit Announcement Modal -->
<div class="modal fade" id="updateModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Announcement</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form role="form" method="post" id="update_form2" enctype="multipart/form-data">
                    <input type="text" id="an_id" name="an_id" class="form-control" readonly><br>

                    <div class="form-group">
                        <input class="form-control" id="an_title" name="an_title" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="visitingcard">Upload Category Picture</label><br>
                        <input type="file" name="fileToUpload" id="an_attach" required>
                    </div>


                    <hr>

                    <input type="submit" class="btn btn-success" name="up_an" value="Update" id="update2"></input>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Reset</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Announcement</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="">

                    <input type="text" id="id" name="an_id1" class="form-control" readonly>
                    <br>

                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-danger">This action cannot be undone.</p>

                    <hr>

                    <input type="submit" class="btn btn-danger" name="delete_an" id="del_id" value="Delete"></input>
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