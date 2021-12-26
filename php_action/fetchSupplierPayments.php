<?php 	

require_once 'core.php';

$sql = "SELECT ordersupply_id, order_date, supplier_id, total_amount, packaging_status, shipping_status, approval_status FROM ordersupply";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

	// $row = $result->fetch_array();
 $packageStatus = "";
 $shippingStatus = "";  
 $approvalStatus = "";  

 while($row = $result->fetch_array()) {
 	// active 

 	if($row[4] == 1) {
 		$packageStatus = "<label class='label label-danger'>Pending</label>";
 	} elseif ($row[4] == 2) {
 		$packageStatus = "<label class='label label-success'>Done</label>";
 	}

 	if($row[5] == 1) {
 		$shippingStatus = "<label class='label label-danger'>Pending</label>";
 	} elseif ($row[5] == 2) {
 		$shippingStatus = "<label class='label label-success'>Done</label>";
 	}

 	if($row[6] == 1) {
 		$approvalStatus = "<label class='label label-danger'>Pending</label>";
 	} elseif ($row[6] == 2) {
 		$approvalStatus = "<label class='label label-success'>Approved</label>";
 	}

 	$output['data'][] = array( 	
 		$row[0],	
 		$row[1], 
 		$row[2],	
 		$row[3],	 
 		$packageStatus,
 		$shippingStatus,
 		$approvalStatus
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);