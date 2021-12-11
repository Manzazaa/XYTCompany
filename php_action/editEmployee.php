<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$email = $_POST['email'];
	$userName = $_POST['username'];
	$pass = $_POST['password'];
	$employeeType = $_POST['employeeType'];
  	$brandId = $_POST['brandId'];

	$sql = "UPDATE users SET email = '$email', username = '$userName', password = '$pass', employee_type = '$employeeType' WHERE user_id = '$brandId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST