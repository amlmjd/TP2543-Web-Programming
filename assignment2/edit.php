<!--
Matric Number: A174807
Name: Amal Majida Binti Munir 
-->
<?php
 
if (isset($_GET['id'])) {
 
  include "db.php";
 
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
      $stmt = $conn->prepare("SELECT * FROM myguestbookassg WHERE id = :record_id");
      $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
      $id = $_GET['id'];
 
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
 
      }
 
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
    }
 
    $conn = null;
  }
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
} 
 ?>

 <?php

$find = array
  (
  array("name"=>"From a Friend"),
  array("name"=>"I googled you"),
  array("name"=>"Just surf on in"),
  array("name"=>"From your Facebook"),
  array("name"=>"I clicked an ads")
  );
  
?>


<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
 
<body>
 
<form method="post" action="update.php">
  Name :
  <input type="text" name="name" size="40" required value="<?php echo $result["user"]; ?>">
  <br>
  <br>

  Email :
   <input type="text" name="email" size="25" required value="<?php echo $result["email"]; ?>">
  <br>
  <br>

  How did you find me?
  <select name="find">
    <option value="" selected>Select</option>        
    <?php
        foreach ($find as $u) {
          if ($u['name'] == $result['find'])
            echo "<option selected>".$u['name']."</option>";
          else 
            echo "<option>".$u['name']."</option>";
          }
          ?>
  </select>
  <br>
  <br>

  I like your:<br>
  &emsp;<input type="checkbox" name="front" value="Front Page" <?php if($result['front']) echo "checked"; ?>>Front Page<br>
  &emsp;<input type="checkbox" name="form" value="Form" <?php if($result['form']) echo "checked"; ?>>Form<br>
  &emsp;<input type="checkbox" name="interface" value="User Interface" <?php if($result['interface']) echo "checked"; ?>>User Interface<br>
  <br> 
 
  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required><?php echo $result["comment"]; ?></textarea>
  <br>
  <br>

  <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
  <input type="submit" name="edit_form" value="Modify Comment">
  <input type="reset">
  
  <br>
</form>
 
</body>
</html>