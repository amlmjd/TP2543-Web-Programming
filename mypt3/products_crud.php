<?php
 
include_once 'database.php';
 
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
//Create
if (isset($_POST['create'])) {
 
  try {
 
      $stmt = $conn->prepare("INSERT INTO tbl_products_a174807_pt2(fld_product_num, fld_product_name, fld_product_price, fld_product_brand, fld_product_volume, fld_product_type, fld_product_category, fld_product_description, fld_product_stock) VALUES(:pid, :name, :price, :brand, :volume, :type, :category, :description, :stock)");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':volume', $volume, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $volume = $_POST['volume'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $description = $_POST['description']; 
    $stock =  $_POST['stock'];
     
    $stmt->execute();
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Update
if (isset($_POST['update'])) {
 
  try {
 
      $stmt = $conn->prepare("UPDATE tbl_products_a174807_pt2 SET fld_product_num = :pid, fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand, fld_product_volume = :volume, fld_product_type = :type , fld_product_category = :category, fld_product_description = :description, fld_product_stock = :stock
        WHERE fld_product_num = :oldpid");
     
     $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':volume', $volume, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);  
      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $volume = $_POST['volume'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $description = $_POST['description']; 
    $stock =  $_POST['stock'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Delete
if (isset($_GET['delete'])) {
 
  try {
 
      $stmt = $conn->prepare("DELETE FROM tbl_products_a174807_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
//Edit
if (isset($_GET['edit'])) {
 
  try {
 
      $stmt = $conn->prepare("SELECT * FROM tbl_products_a174807_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    }
 
  catch(PDOException $e)
  {
      echo "Error: " . $e->getMessage();
  }
}
 
  $conn = null;
?>