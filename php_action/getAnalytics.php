<?php 

require_once 'core.php';

if($_POST) {

	$sql = "SELECT * FROM product ORDER BY sold DESC";
	$query = $connect->query($sql);

	$table = '
	<table border="1" cellspacing="0" cellpadding="0" style="width:100%;">
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Items Sold</th>
		</tr>

		<tr>';
		while ($result = $query->fetch_assoc()) {
			$table .= '<tr>
				<td><center>'.$result['product_id'].'</center></td>
				<td><center>'.$result['product_name'].'</center></td>
				<td><center>'.$result['sold'].'</center></td>
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