<?php
include('../database/conn.php');

$show_ann = "SELECT * FROM `announcement`";

$result = $conn->query($show_ann);

?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Announcements</h6>
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
                                        <img class="show-img" src="../admin/announcement/<?php echo $row['an_attach']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['date']    ?></td>
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