<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT supplier_id, supplier_name, supplier_active, supplier_status FROM suppliers WHERE supplier_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);