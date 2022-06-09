<!--
Matric Number: A174807
Name: Amal Majida Binti Munir 
-->
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
 
 <form method="post" action="insert.php">
  Name :
  <input type="text" name="name" size="40" required>
  <br>
  <br>

  Email :
  <input type="text" name="email" size="25" required>
  <br>
  <br>

  How did you find me?
  <select name="find">
    <option value="" selected>Select</option>        
    <?php
    foreach ($find as $u) {
      echo "<option>".$u['name']."</option>";
    }
    ?>
  </select>
  <br>
  <br>

  I like your:<br>
  &emsp;<input type="checkbox" name="front" value="Front Page">Front Page<br>
  &emsp;<input type="checkbox" name="form" value="Form">Form<br>
  &emsp;<input type="checkbox" name="interface" value="User Interface">User Interface<br>
  <br>

  Comments :<br>
  <textarea name="comment" cols="30" rows="8" required></textarea>
  <br>
  <br>

  <input type="submit" name="add_form" value="Add a New Comment">
  <input type="reset">
  <br>

</form>
 
</body>
</html>