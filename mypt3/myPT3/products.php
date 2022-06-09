<?php
  include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>HijabiZ Shop - Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
  <?php include_once 'nav_bar.php'; ?>
  
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="page-header">
          <h2>Create New Product</h2>
        </div>
        <form action="products.php" method="post">
        


        <div class="row">
        <div class="column">   
          <div class="form-group">
            <label for="productid" class="col-sm-3 control-label">Product ID: </label>
            <div class="col-sm-9">
              <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
            </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="productname" class="col-sm-3 control-label">Collection Name: </label>
            <div class="col-sm-9">     
              <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_collection']; ?>" required>
            </div>
          </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="productbrand" class="col-sm-3 control-label">Brand: </label>
            <div class="col-sm-9">                
              <select name="brand" class="form-control" id="productbrand" required>
                <option value="" selected>Please select</option>
                <option value="Alhumaira" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Alhumaira") echo "selected"; ?>>Alhumaira</option>
                <option value="Naelofar" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Naelofar") echo "selected"; ?>>Naelofar</option>
                <option value="Tudung People" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Tudung People") echo "selected"; ?>>Tudung People</option>
                <option value="Umma" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Umma") echo "selected"; ?>>Umma</option>
              </select>
            </div>
          </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="producttype" class="col-sm-3 control-label">Type: </label>
            <div class="col-sm-9">       
              <input name="type" type="text" class="form-control" id="producttype" placeholder="Product Type" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_type']; ?>" required>
            </div>
          </div>
        </div>
      </div>
    </div>

        <div class="row">
          <div class="column"> 
          <div class="form-group">
            <label for="productcolor" class="col-sm-3 control-label">Color: </label>
            <div class="col-sm-9">                  
              <input name="color" type="text" class="form-control" id="productcolor" placeholder="Product Color" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?>" required>
            </div>
          </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="productmaterial" class="col-sm-3 control-label">Material: </label>
            <div class="col-sm-9">          
              <input name="material" type="text" class="form-control" id="productmaterial" placeholder="Product Material" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_material']; ?>" required>
            </div>
          </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="productmeasurement" class="col-sm-3 control-label">Measurement: </label>
            <div class="col-sm-9">    
              <input name="measurement" type="text" class="form-control" id="productmeasurement" placeholder="Product Measurement" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_measurement']; ?>" required>
            </div>
          </div>
          </div>

          <div class="column"> 
          <div class="form-group">
            <label for="productprice" class="col-sm-3 control-label">Price: </label>
            <div class="col-sm-9">    
              <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
            </div>
          </div>
          </div>
        </div>



        <div class="row">
          <div class="column"> 
          <div class="form-group">
            <label for="productstock" class="col-sm-3 control-label">Stock: </label>
            <div class="col-sm-9">         
              <input name="stock" type="number" class="form-control" id="productstock" placeholder="Product Stock" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>" required>
            </div>
          </div>
        </div>

        <div class="column"> 
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">  
              <?php if (isset($_GET['edit'])) { ?>
              <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>" required>
              <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
            </div>
          </div>
        </div>
      </div>
    </form>
    </div>
    </div>
  </div>
    <br>
    <hr>
    <br>

    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Product ID</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Collection Name</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Brand</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Type</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Color</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Material</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Measurement</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Price</b></font></center></th>
          <th bgcolor="#DE9A99"><center><font color="59282B"><b>Stock</b></font></center></th>
          <th bgcolor="#DE9A99"></th>
        </tr>
      <?php
      // Read
      $per_page = 5;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $stmt = $conn->prepare("SELECT * FROM tbl_products_a175116_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr bgcolor="#FFFBCE">
        <td><center><?php echo $readrow['fld_product_num']; ?></center></td>
        <td><?php echo $readrow['fld_product_collection']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_type']; ?></td>
        <td><?php echo $readrow['fld_product_color']; ?></td>
        <td><?php echo $readrow['fld_product_material']; ?></td>
        <td><?php echo $readrow['fld_product_measurement']; ?></td>       
        <td><center><?php echo $readrow['fld_product_price']; ?></center></td>
        <td><center><?php echo $readrow['fld_product_stock']; ?></center></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a> 
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </table>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
          <?php
          try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a175116_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <?php if ($page==1) { ?>
            <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          <?php
          }
          for ($i=1; $i<=$total_pages; $i++)
            if ($i == $page)
              echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
            else
              echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
          ?>
          <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    <br><br>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>