<?php 

require_once 'core.php';

if($_POST) {

	$startDate = $_POST['startDate1'];
	$date = DateTime::createFromFormat('m/d/Y',$startDate);
	$start_date = $date->format("Y-m-d");


	$endDate = $_POST['endDate1'];
	$format = DateTime::createFromFormat('m/d/Y',$endDate);
	$end_date = $format->format("Y-m-d");

	$sql = "SELECT * FROM order_item WHERE order_date >= '$start_date' AND order_date <= '$end_date' and order_item_status = 1 ORDER BY product_id";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Sold Date</th>
			<th>Product ID</th>
			<th>Quantity Purchased</th>
			<th>Rate per Item</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['order_date'].'</center></td>
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['quantity'].'</center></td>
				<td><center>'.$result['rate'].'</center></td>
			</tr>';	
		}
		$table .= '
		</tr>
		</tr>
	</table>
	';	

	echo $table;

}

?>