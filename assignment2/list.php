<!--
Matric Number: A174807
Name: Amal Majida Binti Munir 
-->
<?php
 
include "db.php";
 
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    $stmt = $conn->prepare("SELECT * FROM myguestbookassg");
    $stmt->execute();
 
    $result = $stmt->fetchAll();
 
    }
catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
 
$conn = null;
?>
<!DOCTYPE html>
<html>
<head>
  <title>My Guestbook</title>
</head>
<body>
 
<ol>

<?php
foreach($result as $row) {

  $fav = Array();

  if($row['front'])
    array_push($fav, "Front Page");
  if($row['form'])
    array_push($fav, "Form");
  if($row['interface'])
    array_push($fav, "User Interface");


  echo "<li>";
  echo "<b>Name : </b>".$row["user"]."<br>";
  echo "<b>Email : </b>".$row["email"]."<br>";
  echo "<b>How do you find me? </b>".$row["find"]."<br>";

  echo "<b>I like your : </b>";
  echo join(", ", $fav);
  
  echo "<b><br>Date : </b>".$row["postdate"]."<br>";
  echo "<b>Time : </b>".$row["posttime"]."<br>";
  echo "<b>Comments : </b>".$row["comment"]."<br>";
  echo "<b>Action : </b><a href=edit.php?id=".$row["id"].">Edit</a> / <a href=delete.php?id=".$row["id"].">Delete</a>";
  echo "</li>";
  echo "<hr>";
}
?>
</ol>
 
</body>
</html>