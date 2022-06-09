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
  <title>APerfume Corner : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">APerfume Corner</a>
    </div>
 
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
    </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="products.php">Products</a></li>
            <li><a href="customers.php">Customers</a></li>
            <li><a href="staffs.php">Staffs</a></li>
            <li><a href="orders.php">Orders</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 
  <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
        <label for="productid" class="col-sm-3 control-label">ID</label>
        <div class="col-sm-9">
        <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productname" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-9">
        <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productprice" class="col-sm-3 control-label">Price</label>
        <div class="col-sm-9">
        <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productbrand" class="col-sm-3 control-label">Brand</label>
        <div class="col-sm-9">
        <select name="brand" class="form-control" id="productbrand" required>
          <option value="">Please select</option>
          <option value="Bvlgari" >Bvlgari</option>
          <option value="Chanel" >Chanel</option>
          <option value="Guess" >Guess</option>
          <option value="Victoria's Secret" >Victoria's Secret</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="productvolume" class="col-sm-3 control-label">Volume</label>
        <div class="col-sm-9">
        <select name="volume" class="form-control" id="productvolume" required>
          <option value="">Please select</option>
          <option value="15ml" >15ml</option>
          <option value="50ml" >50ml</option>
          <option value="75ml" >75ml</option>
          <option value="100ml" >100ml</option>
          <option value="200ml" >200ml</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="producttype" class="col-sm-3 control-label">Type</label>
        <div class="col-sm-9">
        <select name="type" class="form-control" id="producttype" required>
          <option value="">Please select</option>
          <option value="Unisex" >Unisex</option>
          <option value="Women Perfume" >Women Perfume</option>
          <option value="Men Perfume" >Men Perfume</option>
        </select>
        </div>
      </div>
      <div class="form-group">
        <label for="productcategory" class="col-sm-3 control-label">Category</label>
        <div class="col-sm-9">
        <input name="category" type="text" class="form-control" id="productcategory" placeholder="Product Category" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productdescription" class="col-sm-3 control-label">Scent Description</label>
        <div class="col-sm-9">
        <input name="description" type="text" class="form-control" id="productdescription" placeholder="Product Description" value="" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productstock" class="col-sm-3 control-label">Stock</label>
        <div class="col-sm-9">
        <input name="stock" type="text" class="form-control" id="productstock" placeholder="Product Stock" value="" required>
        </div>
      </div>
      
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
                <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>
  
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <!-- <tr>
          <th>Product ID</th>
          <th width="25%">Name</th>
          <th>Price (RM)</th>
          <th width="10%">Brand</th>
          <th>Volume</th>
          <th>Type</th>
          <th width="10%">Category</th>
          <th width="25%">Scent Description</th>
          <th>Stock</th>
          <th></th>
        </tr> -->

        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price (RM)</th>
          <th>Brand</th>
          <th width="5%">Volume</th>
          <th>Type</th>
          <th>Category</th>
          <th>Scent Description</th>
          <th>Stock</th>
          <th width="15%"></th>
        </tr>
        
      <tr>
        <td>P101</td>
        <td>The Rouge Edp (u) Mini</td>
        <td>80</td>
        <td>Bvlgari</td>
        <td>15ml</td>
        <td>Unisex</td>
        <td>Eau Perfumee Au</td>
        <td>Green, Woody, Citrus, Fruity, Sweet</td>
        <td>5</td>
        <td>
          <a href="products_details.php?pid=P100" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=P100" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=P100" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
        
      <tr>
        <td>P102</td>
        <td>The Vert Edp (u) Mini</td>
        <td>80</td>
        <td>Bvlgari</td>
        <td>15ml</td>
        <td>Unisex</td>
        <td>Eau Perfumee Au</td>
        <td>Citrus, Green, Aromatic, Woody, Warm Spicy</td>
        <td>6</td>
        <td>
          <a href="products_details.php?pid=P110" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=P110" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=P110" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
        
      <tr>
        <td>P103</td>
        <td>Goldea Edp (w)</td>
        <td>240</td>
        <td>Bvlgari</td>
        <td>25ml</td>
        <td>Women Perfume </td>
        <td>Goldea Collection</td>
        <td>Balsamic, White Floral, Sweet, Woody, Yellow Floral</td>
        <td>9</td>
        <td>
          <a href="products_details.php?pid=P111" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=P111" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=P111" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
        
      <tr>
        <td>P104</td>
        <td>Coral Edt (w)</td>
        <td>230</td>
        <td>Bvlgari</td>
        <td>65ml</td>
        <td>Women Perfume </td>
        <td>Omnia</td>
        <td>Woody, Floral, Fresh, Spicy, Musky, Fruity, Citrus</td>
        <td>10</td>
        <td>
          <a href="products_details.php?pid=PR101" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=PR101" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=PR101" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
        
      <tr>
        <td>P105</td>
        <td>Crystalline</td>
        <td>230</td>
        <td>Bvlgari</td>
        <td>65ml</td>
        <td>Women Perfume </td>
        <td>Omnia</td>
        <td>Woody, Green, Floral, Musky, Ozonic</td>
        <td>3</td>
        <td>
          <a href="products_details.php?pid=PR102" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=PR102" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=PR102" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <ul class="pagination">
                                <li class="disabled"><span aria-hidden="true">«</span></li>
          <li class="active"><a href="products.php?page=1">1</a></li><li><a href="products.php?page=2">2</a></li><li><a href="products.php?page=3">3</a></li><li><a href="products.php?page=4">4</a></li><li><a href="products.php?page=5">5</a></li><li><a href="products.php?page=6">6</a></li><li><a href="products.php?page=7">7</a></li><li><a href="products.php?page=8">8</a></li><li><a href="products.php?page=9">9</a></li>                      <li><a href="products.php?page=2" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
                  </ul>
      </nav>
    </div>
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>


YG ASAL YANG XJD TU
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
  <title>APerfume Corner : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   
  <?php include_once 'nav_bar.php'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Create New Product</h2>
      </div>
    <form action="products.php" method="post" class="form-horizontal">
      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
        </div>
        </div>

      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"required>
        </div>
        </div>

        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
          <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"required>
        </div>
        </div>

      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
          <select name="brand" class="form-control" id="productbrand" required>
           <option value="">Please select</option>
           <option value="Bvlgari" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Bvlgari") echo "selected"; ?>>Bvlgari</option>
              <option value="Chanel" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Chanel") echo "selected"; ?>>Chanel</option>
              <option value="Guess" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Guess") echo "selected"; ?>>Guess</option>
              <option value="Victoria's Secret" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Victoria's Secret") echo "selected"; ?>>Victoria's Secret</option>
          </select>
        </div>
        </div>    

        <div class="form-group">
          <label for="productvolume" class="col-sm-3 control-label">Volume</label>
          <div class="col-sm-9">
          <select name="volume" class="form-control" id="productvolume" required>
           <option value="">Please select</option>
           <option value="15ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="15ml") echo "selected"; ?>>15ml</option>

              <option value="50ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="50ml") echo "selected"; ?>>50ml</option>

              <option value="75ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="75ml") echo "selected"; ?>>75ml</option>

              <option value="100ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="100ml") echo "selected"; ?>>100ml</option>

              <option value="200ml" <?php if(isset($_GET['edit'])) if($editrow['fld_product_volume']=="200ml") echo "selected"; ?>>200ml</option>
          </select>
        </div>
        </div>    

        <div class="form-group">
          <label for="productype" class="col-sm-3 control-label">Type</label>
          <div class="col-sm-9">
          <select name="type" class="form-control" id="productype" required>
            <option value="">Please select</option>
            <option value="Unisex" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Unisex") echo "selected"; ?>>Unisex</option>

              <option value="Women Perfume" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Women Perfume") echo "selected"; ?>>Women Perfume</option>

              <option value="Men Perfume" <?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Men Perfume") echo "selected"; ?>>Men Perfume</option>
          </select>
        </div>
        </div>  

        <div class="form-group">
          <label for="productcategory" class="col-sm-3 control-label">Category</label>
          <div class="col-sm-9">
          <input name="category" type="text" class="form-control" id="productcategory" placeholder="Product Category" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_category']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Scent Description</label>
          <div class="col-sm-9">
          <input name="description" type="text" class="form-control" id="productdesc" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>" required>
        </div>
        </div>


        <div class="form-group">
          <label for="productstock" class="col-sm-3 control-label">Stock</label>
          <div class="col-sm-9">
          <input name="stock" type="text" class="form-control" id="productstock" placeholder="Product Stock" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_stock']; ?>" required>
        </div>
        </div>
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>
 
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <table class="table table-striped table-bordered">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Brand</th>
          <th></th>
        </tr>
      <?php
      // Read
      $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a174807_pt2 LIMIT $start_from, $per_page");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td>
          <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
        </td>
      </tr>
      <?php } ?>
 
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
            $stmt = $conn->prepare("SELECT * FROM tbl_products_a174807_pt2");
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
  </div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
 
</body>
</html>