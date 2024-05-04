<?php

include('../database/conn.php');

$order_id = $_GET['order_id'];

$sql = "SELECT p.`pd_name`, p.`drug_name`, p.`company`, p.`pkg`,c. `cat_name`,m.`md_area`,s.`mrp`, s.`ptr`, s.`batch_no`, s.`quantity`, s.`mfg_date`, s.`exp_date`, s.`price`, o.order_id, o.status, o.ss_id, m.md_name, m.md_address, m.pr_name1, m.pr_number1, o.status, o.payment_date, o.payment_id, m.pr_email FROM `add_product` p, `categories` c, `medical_details` m, stock s, orders o WHERE s.pd_id=p.pd_id and m.md_id=s.md_id AND p.cat_id=c.cat_id AND p.pd_id=o.pd_id AND o.status = 'Paid' AND o.order_id = $order_id";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

?>

<div class="card shadow mb-4">
  <div class="card-body">
    <div class="form-group row text-left mb-0">
      <div class="col-sm-9 d-flex align-items-center">
        <h5 class="font-weight-bold">
          Receipt
        </h5>
        
      </div>
      <div class="col-sm-3 d-flex justify-content-end">
        <h6>
          
        <a href="print.php?order_id=<?php echo $row['order_id']?>" target="_blank" class="btn btn-success pull-right"><span><i class="fa-solid fa-print"></i></span> Print</a>
        </h6>
        
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
    <!-- <div class="form-group row text-left mb-0 py-2">
      <div class="col-sm-4 py-1"></div>
      <div class="col-sm-3 py-1"></div>
      <div class="col-sm-4 py-1">
        <h4>
          Cash Amount: ₱ <?php echo number_format($cash, 2); ?>
        </h4>
        <table width="100%">
          <tr>
            <td class="font-weight-bold">Subtotal</td>
            <td class="text-right">₱ <?php echo $sub; ?></td>
          </tr>
          <tr>
            <td class="font-weight-bold">Less VAT</td>
            <td class="text-right">₱ <?php echo $less; ?></td>
          </tr>
          <tr>
            <td class="font-weight-bold">Net of VAT</td>
            <td class="text-right">₱ <?php echo $net; ?></td>
          </tr>
          <tr>
            <td class="font-weight-bold">Add VAT</td>
            <td class="text-right">₱ <?php echo $add; ?></td>
          </tr>
          <tr>
            <td class="font-weight-bold">Total</td>
            <td class="font-weight-bold text-right text-primary">₱ <?php echo $grand; ?></td>
          </tr>
        </table>
      </div>
      <div class="col-sm-1 py-1"></div>
    </div>
  </div>
</div> -->