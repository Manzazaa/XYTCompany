<?php

$sqlSelectOrders = "SELECT product.product_name, order_item.order_date, order_item.quantity, order_item.total FROM order_item
INNER JOIN product ON product.product_id = order_item.product_id
INNER JOIN orders ON orders.order_id = order_item.order_id WHERE orders.customerID = ".$_SESSION['custID']."";
$result = $conn->query($sqlSelectOrders);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $dateDiff = date('Y-m-d', strtotime('+5 day', strtotime($row['order_date'])));
    if ($dateDiff <= date('Y-m-d')) {
      $dateDiff = "Delivered";
    }
    if ($row['total'] > 10000) {
      $row['total'] += 400; 
    }
    echo '<tbody>
        <tr>
            <td>'.$row["product_name"].'</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["quantity"].'</td>
            <td>'.$row["total"].'</td>
            <td>'.$dateDiff.'</td>
        </tr>
    </tbody>
';
  }
} else {
  echo "0 results";
}
 ?>
