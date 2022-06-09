<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Products</title>
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
    <form action="products.php" method="post">
      <table border="0" cellpadding="7">
        <tr>
          <td><font color="33344a"><b>Product ID:</b></font><br>
            <input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>">
          </td>

          <td><font color="33344a"><b>Name:</b></font><br>          
            <input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>">
          </td>

          <td><font color="33344a"><b>Price:</b></font><br>
            <input name="price" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>">
          </td>

          <td><font color="33344a"><b>Brand:</b></font><br>            
            <select name="brand">
              <option value="" selected>Select</option>
              <option value="Bvlgari" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Bvlgari") echo "selected"; ?>>Bvlgari</option>
              <option value="Chanel" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Chanel") echo "selected"; ?>>Chanel</option>
              <option value="Guess" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Guess") echo "selected"; ?>>Guess</option>
              <option value="Victoria's Secret" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Victoria's Secret") echo "selected"; ?>>Victoria's Secret</option>
            </select>
          </td>
        </tr>

        <tr>
          <td><font color="33344a"><b>Volume:</b></font><br>            
            <select name="volume">
              <option value="" selected>Select</option>
              <option value="15ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="15ml") echo "selected"; ?>>15ml</option>

              <option value="50ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="50ml") echo "selected"; ?>>50ml</option>

              <option value="75ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="75ml") echo "selected"; ?>>75ml</option>

              <option value="100ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="100ml") echo "selected"; ?>>100ml</option>

              <option value="200ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="200ml") echo "selected"; ?>>200ml</option>
            </select> <br>
          </td>

            <td><font color="33344a"><b>Type:</b></font><br>            
            <select name="type">
              <option value="" selected>Select</option>
              <option value="Unisex" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Unisex") echo "selected"; ?>>Unisex</option>

              <option value="Women Perfume" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Women Perfume") echo "selected"; ?>>Women Perfume</option>

              <option value="Men Perfume" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Men Perfume") echo "selected"; ?>>Men Perfume</option>
            </select> <br>
          </td>

          <td><font color="33344a"><b>Category:</b></font><br>
            <input name="category" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_category']; ?>">
          </td>


          <td><font color="33344a"><b>Scent Description:</b></font><br>
            <input name="description" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>">
          </td>

        </tr>

      </table>

      <tr>
        <center><font color="33344a"><b>Stock:</b></font><br>
          <input name="stock" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>">
        </center>
      </tr>

      <br>

      <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
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
        <td><center><font color="fdfdfd"><b>Product ID</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Name</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Price (RM)</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Brand</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Volume</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Type</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Category</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Scent Description</b></font></center></td>
        <td><center><font color="fdfdfd"><b>Stock</b></font></center></td>
        <td></td>
      </tr>
      <?php

      // Read
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
      foreach($result as $readrow) {
      ?>
      <tr bgcolor="fdfdfd">
        <td><center><?php echo $readrow['fld_product_num']; ?></center></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_volume']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_category']; ?></td>       
        <td><center><?php echo $readrow['fld_product_description']; ?></center></td>
        <td><center><?php echo $readrow['fld_product_stock']; ?></center></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>">Edit</a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    <br><br>
  </center>
</body>
</html>