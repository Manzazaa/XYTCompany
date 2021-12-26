<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	

  $orderDate 						= date('Y-m-d');	
  $clientName 					= $_POST['clientName'];
  $subTotalValue 				= $_POST['subTotalValue'];

				
	$sql = "INSERT INTO ordersupply (order_date, supplier_id, total_amount, packaging_status, shipping_status, approval_status) VALUES ('$orderDate', '$clientName', '$subTotalValue', 1, 1, 1)";
	
	
	$order_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$order_id = $connect->insert_id;
		$valid['order_id'] = $order_id;	

		$orderStatus = true;
	}

		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['productName']); $x++) {			
		$updateProductQuantitySql = "SELECT product.quantity FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductQuantityData = $connect->query($updateProductQuantitySql);

		$updateProductSoldSql = "SELECT product.sold FROM product WHERE product.product_id = ".$_POST['productName'][$x]."";
		$updateProductSoldData = $connect->query($updateProductSoldSql);
		
		
		while ($updateProductQuantityResult = $updateProductQuantityData->fetch_row()) {
			$updateQuantity[$x] = $updateProductQuantityResult[0 ] + $_POST['quantity'][$x];							
				// update product table
				$updateProductTable = "UPDATE product SET quantity = '".$updateQuantity[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable);
			

				if($x == count($_POST['productName'])) {
					$orderItemStatus = true;
				}		
		}// while
		while ($updateProductSoldResult = $updateProductSoldData->fetch_row()) {
			$updateSold[$x] = $updateProductSoldResult[0 ] + $_POST['quantity'][$x];							
				// update product table
				$updateProductTable2 = "UPDATE product SET sold = '".$updateSold[$x]."' WHERE product_id = ".$_POST['productName'][$x]."";
				$connect->query($updateProductTable2);
				
			}	//second while
	} // /for quantity

	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();

	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);