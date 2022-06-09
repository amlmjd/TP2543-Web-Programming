<?php
  include_once 'orders_details_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Orders Details</title>
  <style>
    body {
      background-image: url('images/Background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: 100% 100%;
    }
  </style>
</head>
<body>
  <table width="100%" height="15" border="0">
    <tr>>
        <center>
        <br>
           <a href="index.php"><font face="Candara" size="5"><b>Home</b></font></a>&ensp;&ensp;|&ensp;&ensp;
          <a href="products.php"><font face="Candara" size="5"><b>Products</b></font></a>&ensp;&ensp;|&ensp;&ensp;
          <a href="customers.php"><font face="Candara" size="5"><b>Customers</b></font></a>&ensp;&ensp;|&ensp;&ensp;
          <a href="staffs.php"><font face="Candara" size="5"><b>Staffs</b></font></a>&ensp;&ensp;|&ensp;&ensp;
          <a href="orders.php"><font face="Candara" size="5"><b>Orders</b></font></a>
        <br><br>
        </center>
    </tr>
  </table>
  <br>
  <center>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_orders_a174807, tbl_staffs_a174807_pt2, tbl_customers_a174807_pt2 WHERE tbl_orders_a174807.fld_staff_num = tbl_staffs_a174807_pt2.fld_staff_num AND tbl_orders_a174807.fld_customer_num = tbl_customers_a174807_pt2.fld_customer_num AND fld_order_num = :oid");
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
    <font color="33344a"><b>Order ID: </b></font><?php echo $readrow['fld_order_num'] ?> <br><br>
    <font color="33344a"><b>Order Date: </b></font><?php echo $readrow['fld_order_date'] ?> <br><br>
    <font color="33344a"><b>Staff: </b></font><?php echo $readrow['fld_staff_name'] ?> <br><br>
    <font color="33344a"><b>Customer: </b></font><?php echo $readrow['fld_customer_name'] ?> <br><br>
    <br>
    <br>
    <form action="orders_details.php" method="post">
    <font color="33344a"><b>Product:</b></font>
      <select name="pid">
        <option value="" selected>Select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_products_a174807_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $productrow) {
      ?>
        <option value="<?php echo $productrow['fld_product_num']; ?>"><?php echo $productrow['fld_product_brand']." - ".$productrow['fld_product_name']; ?></option>
      <?php
      }
      $conn = null;
      ?>
      </select> &ensp;&ensp;|&ensp;&ensp;
    <font color="33344a"><b>Quantity:</b></font>
      <input name="quantity" type="text"><br><br>
      <input name="oid" type="hidden" value="<?php echo $readrow['fld_order_num'] ?>">
      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>
    </form>
    <br>
    <br>
    <br>
    <table border="1" cellpadding="6">
      <tr bgcolor="#3a235b">
        <td><center><font color="fdfdfd"><b>Order Detail ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Product</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Quantity</b></font></center></td>
        <td></td>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a174807, tbl_products_a174807_pt2 WHERE tbl_orders_details_a174807.fld_product_num = tbl_products_a174807_pt2.fld_product_num AND fld_order_num = :oid");
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
        <td><?php echo $detailrow['fld_order_detail_num']; ?></td>
        <td><?php echo $detailrow['fld_product_name']; ?></td>
        <td><center><?php echo $detailrow['fld_order_detail_quantity']; ?></center></td>
        <td>
          <a href="orders_details.php?delete=<?php echo $detailrow['fld_order_detail_num']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    <br>
    <br>
    <a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank">Generate Invoice</a>
</body>
</html>