<!--
Matric Number: A174807
Name: Amal Majida Binti Munir
-->
<!DOCTYPE html>
<html>
<head>
  <title>APerfume Corner : Products</title>
</head>
<body>
  <center>
    <a href="index.php">Home</a> |
    <a href="products.php">Products</a> |
    <a href="customers.php">Customers</a> |
    <a href="staffs.php">Staffs</a> |
    <a href="orders.php">Orders</a>
    <hr>
    <form action="products.php" method="post">
      
      Product ID
      <input name="pid" type="text"> <br>

      Name
      <input name="name" type="text"> <br>

      Price (RM)
      <input name="price" type="text"> <br>

      Brand
      <select name="brand">
        <option value="Bvlgari">Bvlgari</option>
        <option value="Chanel">Chanel</option>
        <option value="Guess">Guess</option>
        <option value="Victoria's Secret">Victoria's Secret</option>
      </select> <br>

      Volume
      <select name="volume">
        <option value="15ml">15ml</option>
        <option value="25ml">25ml</option>
        <option value="50ml">50ml</option>
        <option value="65ml">65ml</option>
        <option value="75ml">75ml</option>
        <option value="100ml">100ml</option>
        <option value="100ml">150ml</option>
        <option value="200ml">200ml</option>
      </select> <br>

      Type
      <select name="type">
        <option value="Unisex">Unisex</option>
        <option value="Women's Perfume">Women's Perfume</option>
        <option value="Men's Perfume">Men's Perfume</option>
      </select> <br>

      Category
      <input name="category" type="text"> <br>

      Scent Description <br>
      <textarea name="scent_description" rows="6" cols="70"></textarea> <br>

      Stock
      <input name="stock" type="text"> <br>

      <button type="submit" name="create">Create</button>
      <button type="reset">Clear</button>

    </form>
    <hr>
    <table border="1" width="85%" cellpadding="5">
      <tr align="center">
        <td width="7%">Product ID</td>
        <td>Name</td>
        <td width="7%">Price (RM)</td>
        <td>Brand</td>
        <td>Volume</td>
        <td>Type</td>
        <td>Category</td>
        <td width="30%">Scent Description</td>
        <td>Stock</td>
        <td></td>
      </tr>

      <tr>
        <td>P101</td>
        <td>Paraiba</td>
        <td>230</td>
        <td>Bvlgari</td>
        <td>65ml</td>
        <td>Women's Perfume</td>
        <td>Omnia</td>
        <td>
          <p>
            Tropical, Fruity, Sweet, Fresh, Citrus
          </p>
        </td>
        <td>2</td>
        <td>
          <a href="products_details.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P102</td>
        <td>The Vert Edp (u) Mini</td>
        <td>80</td>
        <td>Bvlgari</td>
        <td>15ml</td>
        <td>Unisex</td>
        <td>Eau Perfumee Au</td>
        <td>
          <p>
           Citrus, Green, Aromatic, Woody, Warm Spicy
          </p>
        </td>
        <td>5</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P103</td>
        <td>Atlantiqve</td>
        <td>280</td>
        <td>Bvlgari</td>
        <td>100ml</td>
        <td>Men's Perfume</td>
        <td>Aqva Pour Homme</td>
        <td>
          <p>
            Aromatic, Amber, Marine, Citrus, Aquatic
          </p>
        </td>
        <td>7</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P104</td>
        <td>1957 Edp (u) Tester</td>
        <td>1450</td>
        <td>Chanel</td>
        <td>200ml</td>
        <td>Unisex</td>
        <td>les Exclusifs De Chanel</td>
        <td>
          <p>
            Powdery, Musky, White Floral, Woody, Aldehydic, Floral
          </p>
        </td>
        <td>3</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P105</td>
        <td>Blanche Edp (m)</td>
        <td>520</td>
        <td>Chanel</td>
        <td>150ml</td>
        <td>Men's Perfume</td>
        <td>Allure Homme</td>
        <td>
          <p>
            Citrus, Woody, Aromatic, Green, Vanilla
          </p>
        </td>
        <td>10</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P106</td>
        <td>Femme Edp (w)</td>
        <td>200</td>
        <td>Guess</td>
        <td>75ml</td>
        <td>Women's Perfume</td>
        <td>Femme</td>
        <td>
          <p>
            Floral, Fruity, Citrus, Fresh, Sweet
          </p>
        </td>
        <td>6</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P107</td>
        <td>Indigo Pour Homme Edt (m)</td>
        <td>220</td>
        <td>Guess</td>
        <td>100ml</td>
        <td>Men's Perfume</td>
        <td>1981</td>
        <td>
          <p>
            Woody, Aromatic, Coconut, Sweet, Floral
          </p>
        </td>
        <td>7</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P108</td>
        <td>Bombshell Seduction Edp (w)</td>
        <td>250</td>
        <td>Victoria's Secret</td>
        <td>50ml</td>
        <td>Women's Perfume</td>
        <td>Bombshell/td>
        <td>
          <p>
            PCitrus, Floral, Musky, Aquatic, Fresh, Fresh Spicy,
          </p>
        </td>
        <td>1</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P109</td>
        <td>Very Sexy For Him 2 (m)</td>
        <td>260</td>
        <td>Victoria's Secret</td>
        <td>100ml</td>
        <td>Men's Perfume</td>
        <td>Very Sexy</td>
        <td>
          <p>
            Aromatic. Fresh Spicy, Woody, Warm Spicy, Herbal
          </p>
        </td>
        <td>7</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

      <tr>
        <td>P110</td>
        <td>Bombshell Intense Edp</td>
        <td>350</td>
        <td>Victoria's Secret</td>
        <td>100ml</td>
        <td>Unisex</td>
        <td>Bombshell</td>
        <td>
          <p>
            Cherry, Vanilla, Sweet, Floral, Fresh
          </p>
        </td>
        <td>6</td>
        <td>
          <a href="products.php">Details</a>
          <a href="products.php">Edit</a>
          <a href="products.php">Delete</a>
        </td>
      </tr>

    </table>
  </center>
</body>
</html>