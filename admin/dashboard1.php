<?php
$show_cat = "SELECT * FROM `categories` ORDER BY `categories`.`cat_name` ASC";

$result = $conn->query($show_cat);

?>

<div class="row">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="dashboard.php?page=cat_dash.php&&cat_id=<?php echo $row['cat_id'] ?>">
                    <div class="card border-left-primary shadow h-100 py-2 www">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-8 ">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $row['cat_name'] ?></div>
                                    <!-- <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$row1[0]";  ?></div> -->
                                </div>
                                <div class="col-4 ms-auto">
                                    <img src="../admin/category/<?php echo $row['cat_img'] ?>" class="w-75" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
    <?php
        }
    }
    ?>
</div>