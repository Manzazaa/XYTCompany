<?php
require_once 'dbConn.php';
$quantity = 1;


$sqlDisplayWish ="SELECT product.product_id, product.product_name, product.product_image, product.rate * wishlist.quantity as 'Price', wishlist.quantity
FROM product INNER JOIN wishlist ON product.product_id = wishlist.product_id WHERE wishlist.customerID = '".$_SESSION['custID']."'";
$resultWish = $conn->query($sqlDisplayWish);

if ($resultWish->num_rows > 0) {
  while($row = $resultWish->fetch_assoc()) {
    echo '<tr>
        <td>
            <div class="img">
                <a href="#"><img src="'.$row['product_image'].'" alt="Image"></a>
                <p>'.$row['product_name'].'</p>
            </div>
        </td>
        <td>₱'.$row['Price'].'</td>
        <td>
          <form action="wishlist.php" method="post">
            <div class="qty">
                <input name="quantity" type="number" value="'.$row['quantity'].'" min=1>
            </div>
        </td>
        <td><button name="btnAddCart" class="btn-cart" value="'.$row['product_id'].'">Add to Cart</button></td>
        <td><button name="btnRemoveWish" value="'.$row['product_id'].'"><i class="fa fa-trash"></i></button></td>
    </tr>
      </form>';
  }
} else {
  echo "0 results";
}


 ?>
