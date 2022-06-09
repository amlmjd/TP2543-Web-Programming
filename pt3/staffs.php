<?php
  include_once 'staffs_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Staffs</title>
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
    <form action="staffs.php" method="post">

      <font color="33344a"><b>Staff ID:</b></font>
      <input name="sid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>"> <br><br>

      <font color="33344a"><b>Name:</b></font>
      <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>"> <br><br>

      <font color="33344a"><b>Email:</b></font>
      <input name="email" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>"> <br><br>

      <font color="33344a"><b>Phone No:</b></font>
      <input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>"> <br><br>
      
      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
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
        <td><center><font color="fdfdfd"><b>Staff ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Name</b></font></center></td>

        <td><center><font color="fdfdfd"><b>Email</b></font></center></td>

        <td><center><font color="fdfdfd"><b>Phone No</font></b></center></td>
        <td></td>
      </tr>
      <?php
      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr bgcolor="#fdfdfd">
        <td><center><?php echo $readrow['fld_staff_num']; ?></center></td>
        <td><?php echo $readrow['fld_staff_name']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>
        <td><?php echo $readrow['fld_staff_phone']; ?></td>
        <td>
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>">Edit</a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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