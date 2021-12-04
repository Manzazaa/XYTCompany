<?php
require_once 'dbConn.php';


$sqlGetSuppliers = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1";
$result = mysqli_query($conn, $sqlGetSuppliers);

if(!empty($result) && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo '<option class="dropdown-item" value="'.$row['brand_id'].'">'.$row['brand_name'].'</option>';
  }
}
 ?>
