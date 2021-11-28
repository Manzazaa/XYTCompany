<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$supplierName = $_POST['brandName'];
  $supplierStatus = $_POST['brandStatus']; 

	$sql = "INSERT INTO suppliers (supplier_name, supplier_active, supplier_status) VALUES ('$supplierName', '$supplierStatus', 1)";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Added";	
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}
	 

	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST