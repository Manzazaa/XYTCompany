<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT ordersupply_id, approval_status FROM ordersupply WHERE ordersupply_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);