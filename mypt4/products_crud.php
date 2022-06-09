<?php
include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

function uploadPhoto($file, $id)
{
    $target_dir = "products/";
    $target_file = $target_dir . basename($file["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowedExt = ['jpg','png', 'gif'];

    $newfilename = "{$id}.{$imageFileType}";

    /*
     * 0 = image file is a fake image
     * 1 = file is too large.
     * 2 = PNG & GIF files are allowed
     * 3 = Server error
     * 4 = No file were uploaded
     */

    if ($file['error'] == 4)
        return 4;

    // Check if image file is a actual image or fake image
    if (!getimagesize($file['tmp_name']))
        return 0;

    // Check file size
    if ($file["size"] > 10000000)
        return 1;

    // Allow certain file formats
    if (!in_array($imageFileType, $allowedExt))
        return 2;

    if (!move_uploaded_file($file["tmp_name"], $target_dir . $newfilename))
        return 3;

    return array('status' => 200, 'name' => $newfilename, 'ext' => $imageFileType);
}

//Create
if (isset($_POST['create'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
        $uploadStatus = uploadPhoto($_FILES['fileToUpload'], $_POST['pid']);

        if (isset($uploadStatus['status'])) {
            try {
              $stmt = $db->prepare("INSERT INTO tbl_products_a174807_pt2(fld_product_num, fld_product_name, fld_product_price, fld_product_brand, fld_product_volume, fld_product_type, fld_product_category, fld_product_description, fld_product_stock, fld_product_image) VALUES(:pid, :name, :price, :brand, :volume, :type, :category, :description, :stock, :image)");
             
                  $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
                  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                  $stmt->bindParam(':price', $price, PDO::PARAM_INT);
                  $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
                  $stmt->bindParam(':volume', $volume, PDO::PARAM_STR);
                  $stmt->bindParam(':type', $type, PDO::PARAM_STR);
                  $stmt->bindParam(':category', $category, PDO::PARAM_STR);
                  $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                  $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
                $stmt->bindParam(':image', $uploadStatus['name']);
               
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

                clearstatcache();

                // Rename file after upload (IF NEEDED)
                //$id = $db->lastInsertId();
                //rename("products/{$uploadStatus['name']}", "products/{$id}.{$uploadStatus['ext']}");
            } catch (PDOException $e) {
                $_SESSION['error'] = "Error while creating: " . $e->getMessage();
            }
        } else {
            if ($uploadStatus == 0)
                $_SESSION['error'] = "Please make sure the file uploaded is an image.";
            elseif ($uploadStatus == 1)
                $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
            elseif ($uploadStatus == 2)
                $_SESSION['error'] = "Sorry, only JPG, PNG & GIF files are allowed.";
            elseif ($uploadStatus == 3)
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            elseif ($uploadStatus == 4)
                $_SESSION['error'] = 'Please upload an image.';
            else
                $_SESSION['error'] = "An unknown error has been occurred.";
        }
    } else {
        $_SESSION['error'] = "You are not an ADMIN. Permission to create a new product is not granted.";
    }

    header("LOCATION: {$_SERVER['REQUEST_URI']}");
    exit();
}

//Update
if (isset($_POST['update'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
        try {
            $stmt = $db->prepare("UPDATE tbl_products_a174807_pt2 SET fld_product_num = :pid, fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand, fld_product_volume = :volume, fld_product_type = :type , fld_product_category = :category, fld_product_description = :description, fld_product_stock = :stock, fld_product_image = :image WHERE fld_product_num = :oldpid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':volume', $volume, PDO::PARAM_STR);
      $stmt->bindParam(':type', $type, PDO::PARAM_STR);
      $stmt->bindParam(':category', $category, PDO::PARAM_STR);
      $stmt->bindParam(':description', $description, PDO::PARAM_STR);
      $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
      $stmt->bindParam(':image', $image, PDO::PARAM_STR);
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
    $image = $_POST['image'];
    $oldpid = $_POST['oldpid'];
     
    $stmt->execute();
 
    header("Location: products.php");
            $stmt = $db->prepare("UPDATE tbl_products_a174807_pt2 SET fld_product_num = :pid, fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand, fld_product_volume = :volume, fld_product_type = :type , fld_product_category = :category, fld_product_description = :description, fld_product_stock = :stock, fld_product_image = :image 
            WHERE fld_product_num = :oldpid LIMIT 1");
         
            $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
              $stmt->bindParam(':name', $name, PDO::PARAM_STR);
              $stmt->bindParam(':price', $price, PDO::PARAM_INT);
              $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
              $stmt->bindParam(':volume', $volume, PDO::PARAM_STR);
              $stmt->bindParam(':type', $type, PDO::PARAM_STR);
              $stmt->bindParam(':category', $category, PDO::PARAM_STR);
              $stmt->bindParam(':description', $description, PDO::PARAM_STR);
              $stmt->bindParam(':stock', $stock, PDO::PARAM_INT);
            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            $stmt->bindParam(':oldpid', $oldpid);
               
            $pid = $_POST['pid'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
            $volume = $_POST['volume'];
            $type = $_POST['type'];
            $category = $_POST['category'];
            $description = $_POST['description']; 
            $stock =  $_POST['stock'];
            $image = $_POST['image'];
            $oldpid = $_POST['oldpid'];

            $stmt->execute();

            // Image Upload
            $flag = uploadPhoto($_FILES['fileToUpload'], $pid);
            if (isset($flag['status'])) {
                $stmt = $db->prepare("UPDATE tbl_products_a174807_pt2 SET fld_product_image = :image WHERE fld_product_num = :pid LIMIT 1");

                $stmt->bindParam(':image', $flag['name']);
                $stmt->bindParam(':pid', $pid);
                $stmt->execute();

                clearstatcache();

                // Rename file after upload (IF NEEDED)
                // rename("products/{$uploadStatus['name']}", "products/{$oldpid}.{$uploadStatus['ext']}");
            } elseif ($flag != 4) {
                if ($flag == 0)
                    $_SESSION['error'] = "Please make sure the file uploaded is an image.";
                elseif ($flag == 1)
                    $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
                elseif ($flag == 2)
                    $_SESSION['error'] = "Sorry, only JPG, PNG & GIF files are allowed.";
                elseif ($flag == 3)
                    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
                else
                    $_SESSION['error'] = "An unknown error has been occurred.";
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error while updating: " . $e->getMessage();
        } catch (Exception $e) {
            $_SESSION['error'] = "Error while updating: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Sorry, but you don't have permission to update this product.";
        header("LOCATION: {$_SERVER['PHP_SELF']}");
        exit();
    }

    if (isset($_SESSION['error']))
        header("LOCATION: {$_SERVER['REQUEST_URI']}");
    else
        header("Location: {$_SERVER['PHP_SELF']}");

    exit();
}

//Delete
if (isset($_GET['delete'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
        try {
            $stmt = $db->prepare("DELETE FROM tbl_products_a174807_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['delete'];
     
    $stmt->execute();
 
    header("Location: products.php");
            $pid = $_GET['delete'];

        } catch (PDOException $e) {
            $_SESSION['error'] = "Error while deleting: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Sorry, but you don't have permission to delete this product.";
    }

    header("LOCATION: {$_SERVER['PHP_SELF']}");
    exit();
}

//Edit
if (isset($_GET['edit'])) {
    if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_position'] == 'Admin') {
        try {
            $stmt = $db->prepare("SELECT * FROM tbl_products_a174807_pt2 WHERE fld_product_num = :pid");
     
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
       
    $pid = $_GET['edit'];
     
    $stmt->execute();
 
    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
           

            if (empty($editrow['fld_product_image']))
                $editrow['fld_product_image'] = $editrow['fld_product_image'] . '.png';
        } catch (PDOException $e) {
            $_SESSION['error'] = "Error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "Sorry, but you don't have permission to edit a product.";
    }

    if (isset($_SESSION['error'])) {
        header("LOCATION: {$_SERVER['PHP_SELF']}");
        exit();
    }
}
