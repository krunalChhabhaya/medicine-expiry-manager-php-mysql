<?php
include('../database/conn.php');
session_start();
if (!isset($_SESSION["md_id"])) {
    header("Location:../user/user_login.php");
}

$show_ph = "SELECT * FROM `medical_details` WHERE md_id=$_SESSION[md_id]";

$result4 = $conn->query($show_ph);
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Expiry Manager</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="../js/sweetalert.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/img.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clinic-medical" style="height: 30px;"></i>
                </div>
                <div class="sidebar-brand-text mx-3">
                    Expiry Manager
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../user/index.php?page=home1.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                List of Products
            </div>


            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=buy_product.php">
                    <i class="fa-solid fa-cart-plus"></i>
                    <span>Buy Products</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=sell_product.php">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    <!-- <i class="fa-solid fa-arrow-up-from-bracket"></i> -->
                    <span>Sell Products</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=sell_list.php">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    <span>Sell Products List</span>
                </a>

            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=my_request.php">
                    <i class="fa-solid fa-arrow-up"></i>
                    <span>My Requests</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=new_requests.php">
                    <i class="fa-solid fa-arrow-down"></i>
                    <span>New Requests</span>
                </a>

            </li>



            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=transaction.php">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Transactions</span>
                </a> -->

            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <span>Transactions</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Payment:</h6>
                        <a class="collapse-item" href="../user/index.php?page=transaction.php">Received</a>
                        <a class="collapse-item" href="../user/index.php?page=transaction2.php">Paid</a>

                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=request_medicine.php">
                    <i class="fa-solid fa-notes-medical"></i>
                    <span>Request Products</span>
                </a>

            </li>



            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=announcement.php">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Announcements</span>
                </a>

            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=add_feedback.php">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <span>Feedbacks</span>
                </a>

            </li>
            <hr class="sidebar-divider my-0">
            <br>

            <!-- Heading -->
            <div class="sidebar-heading">
                Edit Profile
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=edit_medical.php">
                    <i class="fa-solid fa-book-medical"></i>
                    <span>Medical Details</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=edit_bank.php">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>Bank Details</span>
                </a>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=edit_doc.php">
                    <i class="fa-solid fa-file-arrow-up"></i>
                    <span>Documents</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="../user/index.php?page=edit_pass.php">
                    <i class="fa-solid fa-key"></i>
                    <span>Change Password</span>
                </a>

            </li>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                        <h2 style="color: #4e73df; font-weight: bold;">
                            <?php
                            if (isset($_SESSION["md_id"])) {

                                $show_ph = "SELECT md_name, md_area FROM `medical_details` WHERE md_id=$_SESSION[md_id]";

                                $result4 = $conn->query($show_ph);
                                if ($result4->num_rows > 0) {
                                    while ($row = $result4->fetch_assoc()) {
                                        $ph_name = "SELECT `md_name`, md_area FROM `medical_details` WHERE `md_name`= $row[md_name]";
                                        echo $row['md_name']; ?> (<?php echo $row['md_area']; ?>)
                            <?php
                                    }
                                }
                            }
                            ?>
                        </h2>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" title="Search">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                        <!-- <span class="badge badge-danger badge-counter">3+</span> -->
                        <!-- </a> -->
                        <!-- Dropdown - Alerts -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div> -->
                        <!-- </li>  -->

                        <!-- Nav Item - Messages -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                        <!-- <span class="badge badge-danger badge-counter">7</span> -->
                        <!-- </a> -->
                        <!-- Dropdown - Messages -->
                        <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown"> -->
                        <!-- <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_1.svg" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div> -->
                        <!-- </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_2.svg" alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a> -->
                        <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="../img/undraw_profile_3.svg" alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a> -->
                        <!-- <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a> -->
                        <!-- <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>  -->

                        <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

                        <!-- Nav Item - User Information -->
                        <!-- <li class="nav-item dropdown no-arrow"> -->
                        <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> </span>
                                <img class="img-profile rounded-circle" alt="Profile Image" src="../img/undraw_profile.svg">
                            </a> -->
                        <!-- Dropdown - User Information -->
                        <!-- <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"> -->
                        <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>  -->
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <!-- <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> -->
                            <i class="fa-solid fa-power-off "></i>

                            <!-- Logout -->
                        </a>
                        <!-- </div> -->
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- Content Row -->
                    <div class="row">

                        <?php
                        if (isset($_REQUEST['page']) && $_REQUEST['page'] != null) {
                            if ($_GET['page'] == 'buy_product.php')
                                include('buy_product.php');
                            else
                                if ($_GET['page'] == 'sell_product.php')
                                include('sell_product.php');
                            else
                            if ($_GET['page'] == 'sell_list.php')
                                include('sell_list.php');
                            else
                                if ($_GET['page'] == 'my_request.php')
                                include('my_request.php');
                            else
                                if ($_GET['page'] == 'new_requests.php')
                                include('new_requests.php');
                            else
                                if ($_GET['page'] == 'transaction.php')
                                include('transaction.php');
                            else
                                if ($_GET['page'] == 'request_medicine.php')
                                include('request_medicine.php');
                            else
                                    if ($_GET['page'] == 'announcement.php')
                                include('announcement.php');
                            else
                                if ($_GET['page'] == 'add_feedback.php')
                                include('add_feedback.php');
                            else
                                if ($_GET['page'] == 'edit_medical.php')
                                include('edit_medical.php');
                            else
                                if ($_GET['page'] == 'edit_bank.php')
                                include('edit_bank.php');
                            else
                                if ($_GET['page'] == 'edit_doc.php')
                                include('edit_doc.php');
                            else
                                if ($_GET['page'] == 'edit_pass.php')
                                include('edit_pass.php');
                            else
                            if ($_GET['page'] == 'cat_user.php')
                                include('cat_user.php');
                            else
                            if ($_GET['page'] == 'show_medical.php')
                                include('show_medical.php');
                            else
                                if ($_GET['page'] == 'receipt.php')
                                include('receipt.php');
                            else
                                if ($_GET['page'] == 'receipt_av.php')
                                include('receipt_av.php');
                            else
                                if ($_GET['page'] == 'transaction2.php')
                                include('transaction2.php');

                            else
                                include('home1.php');
                        } else
                            include('home1.php');

                        ?>


                    </div>


                </div>



            </div>





            <!-- Content Row -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">

                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>

    <script src="../js/ajax.js"></script>
</body>

</html>