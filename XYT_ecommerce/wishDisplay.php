<?php
require_once 'dbConn.php';
$quantity = 1;

if (isset($_POST['btnAddCart'])) {
  echo $_POST['btnAddCart'];
}


if (!empty($_SESSION['wish'])) {
  foreach ($_SESSION['wish'] as $product) {
    $sqlGetProducts = "SELECT product_name, product_image, rate, product_id FROM product WHERE product_id ='".$product."'";
    $wishResult = $conn->query($sqlGetProducts);

    if (!empty($wishResult) && $wishResult->num_rows > 0) {
      while ($row = $wishResult -> fetch_array()) {

        $prodID = $row[3];

        $prodName = $row[0];
        $prodRate = $row[2];
        $imageUrl = substr($row[1], 3);

        echo '<tr>
            <td>
                <div class="img">
                    <a href="#"><img src="'.$imageUrl.'" alt="Image"></a>
                    <p>'.$prodName.'</p>
                </div>
            </td>
            <td>₱'.$prodRate.'</td>
            <td>
              <form action="wishlist.php" method="post">
                <div class="qty">
                    <input name="quantity" type="number" value="1" min=1>
                </div>
            </td>
            <td><button name="btnAddCart" class="btn-cart" value="'.$prodID.'">Add to Cart</button></td>
            <td><button name="btnRemoveWish" value="'.$prodID.'"><i class="fa fa-trash"></i></button></td>
        </tr>
          </form>';
      }
    }
  }
}


 ?>
