<!--
Matric Number: A174807
Name: Amal Majida Binti Munir
-->
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Order Details</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    Order ID: O5603f03a9349f0.39900158<br>
    Order Date: 09-09-2015 <br>
    Staff: Nuraisyah Fatin <br>
    Customer: Siti Natasya <br>
    <hr>
    <form action="orders_details.php" method="post">
      Product: 
      <select name="pid">
        <option value="P101">Omnia Paraiba</option>

        <option value="P102">The Vert Edp (u) Mini</option>

        <option value="P103">Atlantiqve</option>
      </select>

      Quantity: 
      <input name="quantity" type="text">

      <button type="submit" name="addproduct">Add Product</button>
      <button type="reset">Clear</button>

    </form>
    <hr>
    <table border="1" cellpadding="10">
      <tr align="center">
        <td>Order Detail ID</td>
        <td>Product</td>
        <td>Quantity</td>
        <td></td>
      </tr>

      <tr>
        <td>D5603f136f41334.84833440</td>
        <td>Omnia Paraiba</td>
        <td>1</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>O5603f03a9349f0.39900158</td>
        <td>Atlantiqve</td>
        <td>3</td>
        <td>
          <a href="orders_details.php">Delete</a>
        </td>
      </tr>
      
    </table>
    <hr>
    <a href="invoice.php" target="_blank">Generate Invoice</a>
  </center>
</body>
</html>