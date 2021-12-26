<?php   

require_once 'core.php';

$sql = "SELECT ordersupply.ordersupply_id, ordersupply.order_date, brands.brand_name, ordersupply.total_amount, ordersupply.packaging_status, ordersupply.shipping_status FROM ordersupply INNER JOIN brands ON ordersupply.brand_id = brands.brand_id WHERE ordersupply.packaging_status = 2";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

  // $row = $result->fetch_array();
 $packageStatus = "";
 $shippingStatus = "";  
 $approvalStatus = "";  

 while($row = $result->fetch_array()) {
    $brandId = $row[0];
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

    $button = '<!-- Single button -->
    <div class="btn-group">
      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action <span class="caret"></span>
      </button>
      <ul class="dropdown-menu">
        <li><a type="button" data-toggle="modal" data-target="#editBrandModel" onclick="editBrands('.$brandId.')"> <i class="glyphicon glyphicon-edit"></i> Package Status</a></li>     
      </ul>
    </div>';

  $output['data'][] = array(  
    $row[0],  
    $row[1], 
    $row[2],  
    $row[3],
    $packageStatus,  
    $shippingStatus,
        $button
    );  
 } // /while 

} // if num_rows

$connect->close();

echo json_encode($output);