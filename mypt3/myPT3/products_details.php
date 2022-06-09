<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>HijabiZ Shop - Products Details</title>
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

  <br><br><br>
  <center>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_products_a175116_pt2 WHERE fld_product_num = :pid");
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
          <?php if ($readrow['fld_product_image'] == "" ) {
            echo "No image";
          }
          else { ?>
          <img src="products/<?php echo $readrow['fld_product_image'] ?>" width="85%" height="85%">
          <?php } ?>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-4">
          <div class="panel panel-default">
          <div class="panel-heading"><strong>Product Details</strong></div>
          <div class="panel-body">
              Below are specifications of the product.
          </div>
          <table class="table">
            <tr>
              <td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
              <td><?php echo $readrow['fld_product_num'] ?></td>
            </tr>
            <tr>
              <td><strong>Collection Name</strong></td>
              <td><?php echo $readrow['fld_product_collection'] ?></td>
            </tr>
            <tr>
              <td><strong>Brand</strong></td>
              <td><?php echo $readrow['fld_product_brand'] ?></td>
            </tr>
            <tr>
              <td><strong>Type</strong></td>
              <td><?php echo $readrow['fld_product_type'] ?></td>
            </tr>
            <tr>
              <td><strong>Color</strong></td>
              <td><?php echo $readrow['fld_product_color'] ?></td>
            </tr>
            <tr>
              <td><strong>Material</strong></td>
              <td><?php echo $readrow['fld_product_material'] ?></td>
            </tr>
            <tr>
              <td><strong>Price</strong></td>
              <td>RM<?php echo $readrow['fld_product_price'] ?></td>
            </tr>
             <tr>
              <td><strong>Stock</strong></td>
              <td><?php echo $readrow['fld_product_stock'] ?></td>
            </tr>
          </table>
          </div>
        </div>
      </div>
    </div>
</body>
</html>