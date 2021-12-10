<?php 	

require_once 'core.php';

$sql = "SELECT user_id, first_name, last_name, email, date_of_birth, employee_type, username FROM users";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

	// $row = $result->fetch_array();
 $employeeType = ""; 

 while($row = $result->fetch_array()) {
 	$brandId = $row[0];
 	// active 
 	if($row[5] == 0) {
 		$employeeType = "<label class='label label-success'>Super Admin</label>";
 	}elseif ($row[5] == 1) {
 		$employeeType = "<label class='label label-success'>Admin</label>";
 	} elseif  ($row[5] == 2) {
 		$employeeType = "<label class='label label-success'>Inventory</label>";
 	} elseif  ($row[5] == 3) {
 		$employeeType = "<label class='label label-success'>Sales</label>";
 	} elseif  ($row[5] == 4) {
 		$employeeType = "<label class='label label-success'>Logistics</label>";
 	}



 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$brandId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeMemberModal" onclick="removeBrands('.$brandId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>       
	  </ul>
	</div>';

 	$output['data'][] = array( 	
 		$row[0],	
 		$row[1], 
 		$row[2],	
 		$row[3],	
 		$row[4],
 		$employeeType,
 		$row[6],
 		$button
 		); 	
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);