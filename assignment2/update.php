<!--
Matric Number: A174807
Name: Amal Majida Binti Munir 
-->
<?php
 
if (isset($_POST['edit_form'])) {
 
  include "db.php";
 
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
    $stmt = $conn->prepare("UPDATE myguestbookassg SET user = :name, email = :email, find = :find, front = :front, form = :form, interface = :interface, comment = :comment WHERE id = :record_id");
 
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':find', $find, PDO::PARAM_STR);
    $stmt->bindParam(':front', $front, PDO::PARAM_STR);
    $stmt->bindParam(':form', $form, PDO::PARAM_STR);
    $stmt->bindParam(':interface', $interface, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
    $stmt->bindParam(':record_id', $id, PDO::PARAM_INT);
       
    $name = $_POST['name'];
    $email = $_POST['email'];
    $find = $_POST['find'];
    $front = (isset($_POST['front']) ? "Front Page" : 0); 
    $form = (isset($_POST['form']) ? "Form" : 0); 
    $interface = (isset($_POST['interface']) ? "User Interface" : 0); 
    $comment = $_POST['comment'];
    $id = $_POST['id'];
 
    $stmt->execute();
     
    header("Location:list.php");
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