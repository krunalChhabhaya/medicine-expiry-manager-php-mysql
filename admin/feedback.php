<?php
include('../database/conn.php');
$i = 1;
$sql = "SELECT m.md_name, f.fd_id, f.fd_issue, f.fd_description, f.fd_attach, f.fd_date, f.fd_status FROM feedback f,medical_details m WHERE f.`md_id`=m.`md_id`";

$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fd_id = $_POST['fd_id'];
    $fd_status = $_POST['fd_status'];

    $fd_st = "UPDATE `feedback` SET `fd_status`='$fd_status' WHERE `fd_id`=$fd_id";

    if ($conn->query($fd_st) === TRUE) {
        echo "<script> window.location.href='../admin/dashboard.php?page=feedback.php';</script>";
    } else {
        echo "Error: " . $fd_st . "<br>" . $conn->error;
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 1.5rem;">Feedbacks</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Medical Name</th>
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
                                <td><?php echo $row['md_name']   ?></td>
                                <?php $img1 = $row['fd_attach']; ?>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        <img class="show-img" src="../user/feedback/<?php echo $row['fd_attach']; ?>" style="width: 55px;" onclick="change(this.src)" data-bs-toggle="modal" data-bs-target="#myModal">
                                    </button>
                                </td>
                                <td><?php echo $row['fd_issue']         ?></td>
                                <td><?php echo $row['fd_description']  ?></td>
                                <td><?php echo $row['fd_date']  ?></td>
                                <td>
                                    <?php if ($row['fd_status'] == 'Request') { ?>
                                        <form method="post">
                                            <input type="hidden" name="fd_id" value="<?php echo $row['fd_id'] ?>">
                                            <input type="submit" name="fd_status" value="✔ Solve"></button>
                                        </form>
                                    <?php
                                    } else
                                        echo "✔ Solved";
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