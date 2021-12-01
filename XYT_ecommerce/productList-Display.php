<?php
include 'dbConn.php';

if(isset($_SESSION['categorySelect'])){
  $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE categories = ".$_SESSION['categorySelect']."";

}else {
  $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE status = 1";
}

$result = $conn->query($sqlGetImage);
$output = array('data' => array());

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $prodDisp = "";

 while($row = $result->fetch_array()) {

	$prodName = $row[0];
	$prodRate = $row[2];
	$imageUrl = substr($row[1], 3);
	$prodDisp = '<div class="col-md-4">
      <div class="product-item">
          <div class="product-title">
              <a href="#">'.$prodName.'</a>
              <div class="ratting">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
              </div>
          </div>
          <div class="product-image">
              <a href="product-detail.php">
                  <img height="400px"src="'.$imageUrl.'" alt="Product Image">
              </a>
              <div class="product-action">
                  <a href="#"><i class="fa fa-cart-plus"></i></a>
                  <a href="#"><i class="fa fa-heart"></i></a>
                  <a href="#"><i class="fa fa-search"></i></a>
              </div>
          </div>
          <div class="product-price">
              <h3><span>₱</span>'.$prodRate.'</h3>
              <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
          </div>
      </div>
  </div>';

  echo $prodDisp;
 }
}
 ?>
