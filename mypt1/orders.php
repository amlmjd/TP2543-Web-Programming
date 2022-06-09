<!--
Matric Number: A174807
Name: Amal Majida Binti Munir
-->
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Orders</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="orders.php" method="post">
      Order ID
      <input name="oid" type="text" disabled> <br>

      Order Date
      <input name="orderdate" type="date" disabled> <br>

      Staff
      <select name="sid">
        <option value="ST101">Nuraisyah</option>
        <option value="ST102">Nadiah Nazirah</option>
        <option value="ST103">Qatrun Diyana</option>
      </select> <br>

      Customer
      <select name="cid">
        <option value="CU101">Nur Alia</option>
        <option value="CU102">Siti Natasya</option>
        <option value="CU103">Aisyah Suhaili</option>
      </select> <br>

      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>
    </form>
    <hr>
    <table border="1" cellpadding="10">
      <tr align="center">
        <td>Order ID</td>
        <td>Order Date</td>
        <td>Staff ID</td>
        <td>Customer ID</td>
        <td></td>
      </tr>

      <tr>
        <td>O5603f03a9349f0.39900158</td>
        <td>09-09-2015</td>
        <td>ST101</td>
        <td>CU102</td>
        <td>
          <a href="orders_details.php">Details</a>
          <a href="orders.php">Edit</a>
          <a href="orders.php">Delete</a>
        </td>
      </tr>

    </table>
  </center>
</body>
</html>