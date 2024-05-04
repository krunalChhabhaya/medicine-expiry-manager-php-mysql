<!DOCTYPE html>
<?php
include('../database/conn.php');
session_start();
$order_id = $_GET['order_id'];

$sql = "SELECT p.`pd_name`, p.`drug_name`, p.`company`, p.`pkg`,c. `cat_name`,m.`md_area`,s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, o.order_id, o.status, o.ss_id, m.md_name, m.md_address, m.pr_name1, m.pr_number1, o.status, o.payment_date, o.payment_id, m.pr_email FROM `add_product` p, `categories` c, `medical_details` m, stock s, orders o WHERE s.pd_id=p.pd_id and m.md_id=o.ss_id AND p.cat_id=c.cat_id AND p.pd_id=o.pd_id AND o.status = 'Paid' AND o.order_id = $order_id";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
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
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="form-group row text-left mb-0">
				<div class="col-sm-9">
					<h5 class="font-weight-bold">
						PHARMACY EXPIRY MANAGER
					</h5>

				</div>
				<div class="col-sm-3 d-flex justify-content-around">
					<h5>
					Receipt
						
					</h5>

				</div>

			</div>
			<hr>
			<div class="form-group row text-left mb-0 py-2">
				<div class="col-sm-4 py-1">
					<h6 class="font-weight-bold">
						Medical:<?php echo $row['md_name']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Address: <?php echo $row['md_address']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Area: <?php echo $row['md_area']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Person Name: <?php echo $row['pr_name1']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Email: <?php echo $row['pr_email']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Mobile No: <?php echo $row['pr_number1']; ?>
					</h6>
				</div>
				<div class="col-sm-4 py-1"></div>
				<div class="col-sm-4 py-1">
					<h6 class="font-weight-bold">
						Transaction id: <?php echo $row['payment_id']; ?>
					</h6>
					<h6 class="font-weight-bold">
						Date: <?php echo $row['payment_date']; ?>
					</h6>
				</div>
			</div>
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<!-- <th width="8%">Qty</th> -->

						<th>Name</th>
						<th>Composition</th>
						<th>Company</th>
						<th>Category</th>
						<th>Batch No</th>
						<th>Qty</th>
						<th>Pkg</th>
						<th>Mfg</th>
						<th>Exp</th>
						<th>PTR</th>
						<th>MRP</th>
						<th>Price</th>
					</tr>
				</thead>
				<tbody>

					<td><?php echo $row['pd_name']  ?></td>
					<td><?php echo $row['drug_name']   ?></td>
					<td><?php echo $row['company']      ?></td>
					<td><?php echo $row['cat_name']    ?></td>
					<td><?php echo $row['batch_no']      ?></td>
					<td><?php echo $row['quantity']         ?></td>
					<td><?php echo $row['pkg']         ?></td>
					<td><?php echo $row['mfg_date']  ?></td>
					<td><?php echo $row['exp_date']   ?></td>
					<td><?php echo $row['ptr']      ?></td>
					<td><?php echo $row['mrp']  ?></td>
					<td><?php echo $row['price']      ?></td>


				</tbody>
			</table>
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