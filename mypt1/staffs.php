<!--
Matric Number: A174807
Name: Amal Majida Binti Munir
-->
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Staffs</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="staffs.php" method="post">
      Staff ID
      <input name="sid" type="text"> <br>

      Name
      <input name="name" type="text"> <br>

      Email: 
      <input type="email" name="email"> <br>

      Phone Number
      <input name="phone" type="text"> <br>

      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>

    </form>
    <hr>
    <table border="1" cellpadding="10" width="50%">
      <tr align="center">
        <td>Staff ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone Number</td>
        <td></td>
      </tr>
      <tr>
        <td>ST101</td>
        <td>Nuraisyah Fatin Binti Mohamad Sofian</td>
        <td>aisyahfatin01@gmail.com</td>
        <td>012-3456789</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>ST102</td>
        <td>Nadiah Nazirah Binti Ahmad Jalal</td>
        <td>nadiahnazirah02@gmail.com</td>
        <td>011-2456789</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>
      <tr>
        <td>ST103</td>
        <td>Nurul Qatrun Diyana Binti Alim Mirza</td>
        <td>qatrundiyana03@gmail.com</td>
        <td>011-3456789</td>
        <td>
          <a href="staffs.php">Edit</a>
          <a href="staffs.php">Delete</a>
        </td>
      </tr>

    </table>
  </center>
</body>
</html>