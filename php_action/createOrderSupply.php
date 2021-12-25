<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'ordersupply_id' => '');
// print_r($valid);
if($_POST) {	

  $orderDate 						= date('Y-m-d');	
  $clientName 					= $_POST['clientName'];
  $subTotalValue 				= $_POST['subTotalValue'];


				
	$sql = "INSERT INTO ordersupply (order_date, supplier_name, total_amount, ordersupply_status) VALUES ('$orderDate', '$clientName', '$subTotalValue',  1)";
	

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