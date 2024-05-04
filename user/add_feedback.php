<?php
include('../database/conn.php');
$i = 1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $md_id = $_SESSION['md_id'];
    $fd_issue = $_POST['fd_issue'];
    $fd_description = $_POST['fd_description'];
    $fd_status = $_POST['fd_status'];

    $target_dir = "feedback/";
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
    $fd_attach = $_FILES["fileToUpload"]["name"];


    $sql = "INSERT INTO `feedback`(`md_id`, `fd_issue`, `fd_description`, `fd_attach`, `fd_status`) VALUES ($md_id,'$fd_issue','$fd_description','$fd_attach','$fd_status')";


    if ($conn->query($sql) === TRUE) { ?>
        <script>
                swal({
                    title: "Feedback !",
                    text: "Feedback Added !",
                    icon: "success",
                    button: "Okay",
                });
            </script>
      
<?php    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$md_id = $_SESSION['md_id'];

$show_fd = "SELECT * FROM `feedback` WHERE md_id=$md_id";

$result = $conn->query($show_fd);

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">


        <div class="card-header py-3 d-flex  align-items-center">
            <div class="mr-auto">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">Feedback's</h4>
            </div>
            <div class=" d-flex  align-items-center justify-content-end">
                <h4 class="m-0 font-weight-bold mx-2 text-primary">
                    <button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">Add Feedback <i class="fas fa-fw fa-plus "></i></button>
                </h4>
            </div>

        </div>
        <!-- <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Feedback&nbsp;<button="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></button></h4>
        </div> -->

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Feedback Image</th>
                            <th>Issue / Title</th>
                            <th>Description</th>
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
                                <?php $img1 = $row['fd_attach']; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="feedback/<?php echo $row['fd_attach']; ?>" style="width: 55px;" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['fd_issue']         ?></td>
                                <td><?php echo $row['fd_description']  ?></td>
                                <td><?php echo $row['fd_date'] ?> </td>
                                <td><?php if ($row['fd_status'] == 'Request') {
                                        echo $row['fd_status'];
                                    } else {
                                        echo "✔ Solved";
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


<!-- Feedback Modal-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Feedback</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype="multipart/form-data">



                    <div class="form-group">
                        <input class="form-control" placeholder="Issue / Title" name="fd_issue" value="" required>
                    </div>

                    <div class="form-group">
                        <textarea rows="5" cols="50" textarea" class="form-control" placeholder="Description" name="fd_description" required></textarea>
                    </div>


                    <div class="form-group">
                        <label for="Feedback Attachment">Feedback Attachment</label><br>
                        <input type="file" name="fileToUpload" id="Feedback Attachment">
                    </div>

                    <input type="hidden" id="fd_status" name="fd_status" class="form-control" value="Request">

                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Save</button>
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
                <img class="show-img" src="feedback/<?php echo $img1; ?>" alt="certificate" width="100%">
            </div>
        </div>
    </div>
</div>