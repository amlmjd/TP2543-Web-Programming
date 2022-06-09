<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Products Details</title>
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

<table width="100%" height="25" border="20">  
  <td bgcolor="#f2f2f2">
  <center>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a174807_pt2 WHERE fld_product_num = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>
    <br>
    <font color="59282B"><b>Product ID: </b></font><?php echo $readrow['fld_product_num'] ?> <br>
    <font color="59282B"><b>Name: </b></font><?php echo $readrow['fld_product_name'] ?> <br>
    <font color="59282B"><b>Price: </b></font><?php echo $readrow['fld_product_price'] ?> <br>
    <font color="59282B"><b>Brand: </b></font><?php echo $readrow['fld_product_brand'] ?> <br>
    <font color="59282B"><b>Volume: </b></font><?php echo $readrow['fld_product_volume'] ?> <br>
    <font color="59282B"><b>Type: </b></font><?php echo $readrow['fld_product_type'] ?> <br>
    <font color="59282B"><b>Category: </b></font><?php echo $readrow['fld_product_category'] ?> <br>
    <font color="59282B"><b>Scent Description: </b></font><?php echo $readrow['fld_product_description'] ?> <br>
    <font color="59282B"><b>Stock: </b></font><?php echo $readrow['fld_product_stock'] ?> <br><br>
    <img src="products/<?php echo $readrow['fld_product_image'] ?>" width="20%" height="20%">
  </center>
</td>
</table>
</body>
</html>