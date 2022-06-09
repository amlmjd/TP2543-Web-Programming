<!--
Matric Number: A174807
Name: Amal Majida Binti Munir
-->
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Customers</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="customers.php" method="post">
      Customer ID: 
      <input name="cid" type="text"> <br>

      Name: 
      <input name="fname" type="text"> <br>

      Address: <br>
      <textarea name="address" cols="40" rows="5"></textarea> <br>

      Phone Number: 
      <input name="phone" type="text"> <br>

      
      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>

    </form>
    <hr>
    <table border="1" cellpadding="10">
      <tr align="center">
        <td>Customer ID</td>
        <td >Name</td>
        <td >Address</td>
        <td width="10%">Phone Number</td>
        <td></td>
      </tr>

      <tr>
        <td>CU101</td>
        <td>Nur Alia Binti Azizan</td>
        <td>No 30, Taman Juliana Indah Batu Caves Selangor, Malaysia</td>
        <td>019-8762545</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>CU102</td>
        <td>Siti Natasya Binti Abdul Rahim </td>
        <td>No 36, Taman Melati, Jalan Datuk Kumbar, Alor Setar, Kedah</td>
        <td>017-8652436</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>CU103</td>
        <td>Aisyah Suhaili Binti Arief Fahmi</td>
        <td>Lot 32A, Bangunan Seri Menanti, Petaling Jaya, Selangor</td>
        <td>012-6754690</td>
        <td>
          <a href="customers.php">Edit</a>
          <a href="customers.php">Delete</a>
        </td>
      </tr>

    </table>
  </center>
</body>
</html>