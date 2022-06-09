<?php
  include_once 'orders_crud.php';
?>
 
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Orders</title>
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
    <tr>
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
    <form action="orders.php" method="post">
       <font color="33344a"><b>Order ID:</b></font>
      <input name="oid" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_num']; ?>"> <br><br>
       <font color="33344a"><b>Order Date</b></font>
      <input name="orderdate" type="text" readonly value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>"> <br><br>
       <font color="33344a"><b>Staff:</b></font>
      <select name="sid">
        <option value="" selected>Select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a174807_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $staffrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_name'];?></option>
        <?php } else { ?>
          <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_name'];?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br><br>
      <font color="33344a"><b>Customer:</b></font>
      <select name="cid">
        <option value="" selected>Select</option>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("SELECT * FROM tbl_customers_a174807_pt2");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $custrow) {
      ?>
        <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_num']==$custrow['fld_customer_num'])) { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>" selected><?php echo $custrow['fld_customer_name']?></option>
        <?php } else { ?>
          <option value="<?php echo $custrow['fld_customer_num']; ?>"><?php echo $custrow['fld_customer_name']?></option>
        <?php } ?>
      <?php
      } // while
      $conn = null;
      ?> 
      </select> <br><br>
      <?php if (isset($_GET['edit'])) { ?>
      <button type="submit" name="update">Update</button>
      <?php } else { ?>
      <button type="submit" name="create">Create</button>
      <?php } ?>
      <button type="reset">Clear</button>
    </form>
    <br>
    <br>
    <br>
    <table border="1" cellpadding="6">
      <tr bgcolor="#3a235b">
        <td><center><font color="fdfdfd"><b>Order ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Order Date</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Staff ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Customer ID</b></font></center></td>
        <td></td>
      </tr>
      <?php
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tbl_orders_a174807, tbl_staffs_a174807_pt2, tbl_customers_a174807_pt2 WHERE ";
        $sql = $sql."tbl_orders_a174807.fld_staff_num = tbl_staffs_a174807_pt2.fld_staff_num and ";
        $sql = $sql."tbl_orders_a174807.fld_customer_num = tbl_customers_a174807_pt2.fld_customer_num";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $orderrow) {
      ?>
      <tr bgcolor="#fdfdfd">
        <td><?php echo $orderrow['fld_order_num']; ?></td>
        <td><?php echo $orderrow['fld_order_date']; ?></td>
        <td><?php echo $orderrow['fld_staff_name'] ?></td>
        <td><?php echo $orderrow['fld_customer_name'] ?></td>
        <td>
          <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>">Details</a>
          <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>">Edit</a>
          <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
  </center>
</body>
</html>