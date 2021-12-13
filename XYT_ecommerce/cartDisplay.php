<?php
require_once 'dbConn.php';


$sqlDisplayCart ="SELECT product.product_id, product.product_name, product.product_image, product.rate * cart.quantity as 'Total', product.rate, cart.quantity
FROM product INNER JOIN cart ON product.product_id = cart.product_id WHERE cart.customerID = '".$_SESSION['custID']."'";
$resultCart = $conn->query($sqlDisplayCart);

if ($resultCart->num_rows > 0) {
  while($row = $resultCart->fetch_assoc()) {
    echo '<tr>
        <td>
            <div class="img">
                <a href="#"><img src="'.$row['product_image'].'" alt="Image"></a>
                <p>'.$row['product_name'].'</p>
            </div>
        </td>
        <td>'.$row['rate'].'</td>
        <td>
        <form action="cart.php" method="post">
            <div class="qty">
                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                <input type="text" value="'.$row['quantity'].'">
                <button class="btn-plus"><i class="fa fa-plus"></i></button>
            </div>
        </td>
        <td>'.$row['Total'].'</td>
        <td><button name="btnRemoveCart" value="'.$row['product_id'].'"><i class="fa fa-trash"></i></button></td>
        </form>
    </tr>';
  }
} else {
  echo "0 results";
}



 ?>
