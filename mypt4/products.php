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

    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/2446/2446470.png">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        input[type="file"] {
            display: none;
        }
    </style>
    <style type="text/css">
      .btn-aml {
      background-color: #1726eb !important;
      color: white !important;
      }
      .btn-aml2, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
      background-color: #7107ab !important;
      color: white !important;
      }
    </style>
</head>
<body style="background-image: url('images/Background 2.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
<?php include_once 'nav_bar.inc'; ?>
<?php
// Shows form if the user is logged in AND have admin role.
//if (isset($_SESSION['user']) && $_SESSION['user']['FLD_STAFF_ROLE'] == 'admin') {
?>
<div class="container-fluid dark" style="padding-bottom: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h2>Create New Product</h2>
                </div>

                <?php
                if (isset($_SESSION['error'])) {
                    echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
                    unset($_SESSION['error']);
                }
                ?>
            </div>

            <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" class="form-horizontal"
                  enctype="multipart/form-data">

                  <div class="col-md-8">
                    <div class="form-group">
                        <label for="productid" class="col-sm-3 control-label">Product ID</label>
                        <div class="col-sm-9">
                          <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="productname" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="productprice" class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9">
                          <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" min="0.0" step="0.01" required>
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
                        <label for="producttype" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9">
                        <select name="type" class="form-control" id="producttype" required>
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
                        <label for="productdescription" class="col-sm-3 control-label">Scent Description</label>
                        <div class="col-sm-9">
                        <input name="description" type="text" class="form-control" id="productdescription" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_description']; ?>" required>
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
                                <button class="btn btn-aml" type="submit" name="update"><span
                                            class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update
                                </button>
                            <?php } else { ?>
                                <button class="btn btn-aml" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create
                                </button>
                            <?php } ?>
                            <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear
                            </button>
                        </div>
                    </div>

                </div>

                <div class="col-md-4" style="height: 100%">
                    <div class="thumbnail dark-1">
                        <img src="products/<?php echo(isset($_GET['edit']) ? $editrow['fld_product_image'] : '') ?>" class="img-responsive" onerror="this.onerror=null;this.src='products/no-photo.jpg';" id="productPhoto"
                             alt="Product Image" style="width: 100%;height: 225px;">
                        <div class="caption text-center">
                            <h3 id="productImageTitle" style="word-break: break-all;">Product Image</h3>
                            <p>
                                <label class="btn btn-aml">
                                    <input type="file" accept="image/*" name="fileToUpload" id="inputImage"
                                           onchange="loadFile(event);"/>
                                    <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Browse
                                </label>
                            </p>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php // } ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
            <div class="page-header">
                <h2>Products List</h2>
            </div>
            <table class="table table-striped table-bordered">
                <tr style="font-weight:bold; color:white; background-color: #3a235b;">
                  <th width="8%">Product ID</th>
                  <th><center>Name</center></th>
                  <th width="5%">Price (RM)</th>
                  <th>Brand</th>
                  <th width="5%">Volume</th>
                  <th><center>Type</center></th>
                  <th><center>Category</center></th>
                  <th><center>Scent Description</center></th>
                  <th width= "15%"></th>
                </tr>
                <?php
                // Read
                $per_page = 10;
                if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;
                $start_from = ($page - 1) * $per_page;
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("select * from tbl_products_a174807_pt2 LIMIT {$start_from}, {$per_page}");
                    $stmt->execute();
                    $result = $stmt->fetchAll();
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                foreach ($result as $readrow) {
                    ?>
                    <tr>
                        <td><?php echo $readrow['fld_product_num']; ?></td>
                        <td><?php echo $readrow['fld_product_name']; ?></td>
                        <td><?php echo $readrow['fld_product_price']; ?></td>
                        <td><?php echo $readrow['fld_product_brand']; ?></td>
                        <td><?php echo $readrow['fld_product_volume']; ?></td>
                        <td><?php echo $readrow['fld_product_type']; ?></td>
                        <td><?php echo $readrow['fld_product_category']; ?></td>
                        <td><?php echo $readrow['fld_product_description']; ?></td>
                        
                        <td class="text-center">
                            <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>"
                               class="btn btn-aml2 btn-xs" role="button">Details</a>
                            <?php
                            if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
                                ?>
                                <a href="products.php?edit=<?php echo $readrow['fld_product_num'];
                                echo(isset($_GET['page']) ? '&page=' . $_GET['page'] : ''); ?>"
                                   class="btn btn-success btn-xs" role="button"> Edit </a>
                                <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>"
                                   onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs"
                                   role="button">Delete</a>
                                <?php
                            }
                            ?>
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
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $total_pages = ceil($total_records / $per_page);
                    ?>
                    <?php if ($page == 1) { ?>
                        <li class="disabled"><span aria-hidden="true">&laquo;</span></li>
                    <?php } else { ?>
                        <li><a href="products.php?page=<?php echo $page - 1 ?>" aria-label="Previous"><span
                                        aria-hidden="true">&laquo;</span></a></li>
                        <?php
                    }
                    for ($i = 1;
                         $i <= $total_pages;
                         $i++)
                        if ($i == $page)
                            echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
                        else
                            echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
                    ?>
                    <?php if ($page == $total_pages) { ?>
                        <li class="disabled"><span aria-hidden="true">&raquo;</span></li>
                    <?php } else { ?>
                        <li><a href="products.php?page=<?php echo $page + 1 ?>" aria-label="Previous"><span
                                        aria-hidden="true">&raquo;</span></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>

    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="application/javascript">
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('productPhoto');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
            document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
        };
    </script>
</body>
</html>

