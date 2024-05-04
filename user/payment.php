<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
session_start();
include('../database/conn.php');

$order_id = $_POST['order_id'];


$od = "SELECT o.`ss_id`, s.price, o.order_id FROM `orders` o, stock s WHERE o.stock_id = s.stock_id AND o.order_id = '$order_id'";

$result = $conn->query($od);

($row = $result->fetch_assoc());

$oid = "ORDS" . rand(10000,99999999);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Merchant Check Out Page</title>
    <meta name="GENERATOR" content="Evrsoft First Page">
</head>

<body>
    <h1>Merchant Check Out Page</h1>
    <pre>
	</pre>
    <form method="post" action="pgRedirect.php" name="frmpayment">
        <table border="1">
            <tbody>
                <tr>
                    <th>S.No</th>
                    <th>Label</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td><label>ORDER_ID::*</label></td>
                    <td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $oid ?>">
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><label>CUSTID ::*</label></td>
                    <td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $row['ss_id']; ?>"></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><label>INDUSTRY_TYPE_ID ::*</label></td>
                    <td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail"></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><label>Channel ::*</label></td>
                    <td><input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><label>txnAmount*</label></td>
                    <td><input title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?php echo $row['price']; ?>">
                    </td>
                </tr>
                <input type="hidden" name="order_id" value="<?php echo $row['order_id'] ?>">
                <tr>
                    <td></td>
                    <td></td>
                    <td><input value="CheckOut" type="submit" onclick=""></td>
                </tr>
            </tbody>
        </table>
        * - Mandatory Fields
    </form>
    <script type="text/javascript">
        document.frmpayment.submit();
    </script>
</body>

</html>