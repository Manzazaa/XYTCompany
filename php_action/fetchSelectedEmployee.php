<?php 	

require_once 'core.php';

$brandId = $_POST['brandId'];

$sql = "SELECT user_id, email, username, password, employee_type FROM users WHERE user_id = $brandId";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);