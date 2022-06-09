<?php
  include_once 'database.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>APerfume : Invoice</title>
  <style>
    body {
      background-image: url('images/Background 2.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>
</head>
<body>
  <center>
    <br>
    <font size="5" color="#1d0936"><b>APerfume Corner Sdn. Bhd. </b></font><br>
    <i>-- Fragrance For All -- </i> <br>
    Lot 44-45 Taman Nabira <br>
    05350 Alor Setar Kedah <br>
    <br>
    <br>   
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a174807, tbl_staffs_a174807_pt2, tbl_customers_a174807_pt2, tbl_orders_details_a174807 WHERE tbl_orders_a174807.fld_staff_num = tbl_staffs_a174807_pt2.fld_staff_num AND tbl_orders_a174807.fld_customer_num = tbl_customers_a174807_pt2.fld_customer_num AND tbl_orders_a174807.fld_order_num = tbl_orders_details_a174807.fld_order_num AND tbl_orders_a174807.fld_order_num = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    <font color="33344a"><b>Order ID: </b></font><?php echo $readrow['fld_order_num'] ?> &ensp;|&ensp;
    <font color="33344a"><b>Order Date: </b></font><?php echo $readrow['fld_order_date'] ?>
    <br>
    <font color="33344a"><b>Staff: </b></font><?php echo $readrow['fld_staff_name'] ?> &ensp;|&ensp;
    <font color="33344a"><b>Customer ID: </b></font><?php echo $readrow['fld_customer_name'] ?> &ensp;|&ensp;
    <font color="33344a"><b>Date: </b></font><?php echo date("d M Y"); ?>
    <br>
    <br>
    <table border="1" cellpadding="6">
      <tr bgcolor="#3a235b">
        <td><center><font color="fdfdfd"><b>No</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Product</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Quantity</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Price(RM)/Unit</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Total(RM)</b></font></center></td>
      </tr>
      <?php
      $grandtotal = 0;
      $counter = 1;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a174807, tbl_products_a174807_pt2 where  tbl_orders_details_a174807.fld_product_num = tbl_products_a174807_pt2.fld_product_num AND fld_order_num = :oid");
        $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
          $oid = $_GET['oid'];
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $detailrow) {
      ?>
      <tr bgcolor="#fdfdfd">
        <td><center><?php echo $counter; ?></center></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><center><?php echo $detailrow['fld_order_detail_quantity']; ?></center></td>
        <td><center><?php echo $detailrow['fld_product_price']; ?></center></td>
        <td><center><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity']; ?></center></td>
      </tr>
      <?php
        $grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity'];
        $counter++;
      } // while
      $conn = null;
      ?>
      <tr bgcolor="#fdfdfd">
        <td colspan="4" align="right"><font color="1d0936"><b>Grand Total</b></font></td>
        <td><center><?php echo $grandtotal ?></center></td>
      </tr>
    </table>
    <br>
    <br>
    <b>Computer-generated invoice. No signature is required.</b>
 
  </center>
</body>
</html>