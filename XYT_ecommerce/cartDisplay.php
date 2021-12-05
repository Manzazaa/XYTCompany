<?php
require_once 'dbConn.php';

if (!empty($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $product) {
    $sqlGetProducts = "SELECT product_name, product_image, rate FROM product WHERE product_name ='".$product."'";
    $cartresult = $conn->query($sqlGetProducts);

    if(!empty($cartresult) && $cartresult->num_rows > 0) {
      while($row = $cartresult -> fetch_array()) {
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
            <td>'.$prodRate.'</td>
            <td>
                <div class="qty">
                    <button class="btn-minus"><i class="fa fa-minus"></i></button>
                    <input type="text" value="1">
                    <button class="btn-plus"><i class="fa fa-plus"></i></button>
                </div>
            </td>
            <td>'.$prodRate.'</td>
            <td><button><i class="fa fa-trash"></i></button></td>
        </tr>';
      }
    }
    
    else {
      echo "Your Cart is empty, add products now.";
    }
  }
}


 ?>
