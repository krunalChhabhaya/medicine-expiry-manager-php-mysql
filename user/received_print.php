<!DOCTYPE html>
<?php
include('../database/conn.php');
session_start();
$md_id = $_SESSION['md_id'];

$sql = "SELECT p.pd_id, p.pd_name, p.drug_name, p.company, p.pkg, c.cat_name, m.`md_name`, s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, s.stock_date, o.ss_id, o.status, o.md_id, o.order_id FROM add_product p, stock s, categories c, medical_details m, orders o WHERE p.pd_id = o.pd_id AND p.cat_id = c.cat_id AND m.md_id = o.ss_id AND o.status = 'Paid' AND s.stock_id = o.stock_id AND o.md_id = '$md_id' ";

$result = $conn->query($sql);

?>
<html lang="en">

<head>
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-yFjZbTYRCJodnuyGlsKamNE/LlEaEAxSUDe5+u61mV8zzqJVFOH7TnULE2/PP/l5vKWpUNnF4VGVkXh3MjgLsg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <style>
        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        .table-striped tbody>tr:nth-child(odd)>td,
        .table-striped tbody>tr:nth-child(odd)>th {
            background-color: #f9f9f9;
        }

        @media print {
            #print {
                display: none;
            }
        }

        @media print {
            #PrintButton {
                display: none;
            }
        }

        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0;
            /* this affects the margin in the printer settings */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <h6> Pharmacy Expiry Manager (Received Transactions) </h6>
                    <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Composition</th>
                            <th>Company</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Seller</th>
                            <th>Pkg</th>
                            <th>Batch No</th>
                            <th>MFG</th>
                            <th>EXP</th>
                            <th>PTR</th>
                            <th>MRP</th>
                            <th>Price</th>
                            <th>Date</th>

                        </tr>
                    </thead>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $ss_id = $row['ss_id'];
                            $nm = "SELECT md_name FROM medical_details WHERE md_id = $ss_id";
                            $result1 = $conn->query($nm);
                            $row1 = $result1->fetch_assoc();
                    ?>
                            <tr>

                                <td><?php echo $row['pd_name']     ?></td>
                                <td><?php echo $row['drug_name']     ?></td>
                                <td><?php echo $row['company']     ?></td>
                                <td><?php echo $row['cat_name']      ?></td>
                                <td><?php echo $row['quantity']     ?></td>
                                <td><?php echo $row1['md_name']  ?></td>
                                <td><?php echo $row['pkg']      ?></td>
                                <td><?php echo $row['batch_no']      ?></td>
                                <td><?php echo $row['mfg_date']      ?></td>
                                <td><?php echo $row['exp_date']     ?></td>
                                <td><?php echo $row['ptr']     ?></td>
                                <td><?php echo $row['mrp']      ?></td>
                                <td><?php echo $row['price']      ?></td>
                                <td><?php echo $row['stock_date']      ?></td>

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
    <center><button id="PrintButton" onclick="PrintPage()">Print</button></center>
    <script type="text/javascript">
        function PrintPage() {
            window.print();
        }
        window.addEventListener('DOMContentLoaded', (event) => {
            PrintPage()
            setTimeout(function() {
                window.close()
            }, 750)
        });
    </script>
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