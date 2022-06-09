<?php
  include_once 'customers_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Customers</title>
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
      </td>
    </tr>
  </table>

  <br>
  <center>
    <form action="customers.php" method="post">
      <font color="33344a"><b>Customer ID:</b></font>
      <input name="cid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_num']; ?>"> <br><br>

      <font color="33344a"><b>Name:</b></font>
      <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>"> <br><br>

      <font color="33344a"><b>Address:</b></font>
      <input name="address" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_address']; ?>"> <br> <br>  

      <font color="33344a"><b>Phone No:</b></font>
      <input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>"> <br><br>


      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_num']; ?>">
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
        <td><center><font color="fdfdfd"><b>Customer ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Name</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Address</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Phone No</b></font></center></td>
        <td></td>
      </tr>

      <?php
      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr bgcolor="#fdfdfd">
        <td><center><?php echo $readrow['fld_customer_num']; ?></center></td>
        <td><?php echo $readrow['fld_customer_name']; ?></td>
        <td><?php echo $readrow['fld_customer_address']; ?></td>
        <td><?php echo $readrow['fld_customer_phone']; ?></td>
        <td>
          <a href="customers.php?edit=<?php echo $readrow['fld_customer_num']; ?>">Edit</a>
          <a href="customers.php?delete=<?php echo $readrow['fld_customer_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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