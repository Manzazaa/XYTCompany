<?php
require_once 'dbConn.php';

	$prodName = NULL;
  if (!isset($_SESSION['categorySelect']) && !isset($_SESSION['priceRange']) && !isset($_SESSION['prodBrand']) && !isset($_SESSION['searchInput'])) {

    $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE status = 1";

  }elseif (isset($_SESSION['categorySelect']) && isset($_SESSION['priceRange'])){
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE categories_id = ".$_SESSION['categorySelect']." AND ".$_SESSION['priceRange']."";

  }elseif (isset($_SESSION['categorySelect']) && isset($_SESSION['prodBrand'])) {
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE categories_id = ".$_SESSION['categorySelect']." AND brand_id = ".$_SESSION['prodBrand']."";

  }elseif (isset($_SESSION['prodBrand']) && isset($_SESSION['priceRange'])) {
    $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE brand_id= ".$_SESSION['prodBrand']." AND ".$_SESSION['priceRange']."";

  }elseif (isset($_SESSION['prodBrand']) && isset($_SESSION['priceRange']) && isset($_SESSION['categorySelect'])) {
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE brand_id= ".$_SESSION['prodBrand']." AND ".$_SESSION['priceRange']." AND categories_id = ".$_SESSION['categorySelect']."";

  }elseif (isset($_SESSION['searchInput'])) {
    $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE product_name LIKE '%".$_SESSION['searchInput']."%'";

  }else{
    if(isset($_SESSION['categorySelect'])){
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE categories_id = ".$_SESSION['categorySelect']."";
    }
    if(isset($_SESSION['priceRange'])) {
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE ".$_SESSION['priceRange']."";
    }
    if (isset($_SESSION['prodBrand'])) {
      $sqlGetImage = "SELECT product_name, product_image, rate FROM product WHERE brand_id = ".$_SESSION['prodBrand']."";
    }
}



$result = $conn->query($sqlGetImage);
$output = array('data' => array());

if(!empty($result) && $result->num_rows > 0) {

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

              <form action="product-list.php" method="post">
              <div class="product-action">
                  <button class="btn" name="btnCart" value="'.$prodName.'"><i class="fa fa-cart-plus"></i></button>
                  <button class="btn" name="btnWish" value="'.$prodName.'"><i class="fa fa-heart"></i></button>
                  <button class="btn" name="btnInfo" value="'.$prodName.'"><i class="fa fa-search"></i></button>
              </div>
          </div>
          <div class="product-price">
              <h3><span>₱</span>'.$prodRate.'</h3>
              <button class="btn" name="btnBuy'.$prodName.'"><i class="fa fa-shopping-cart"></i>Buy Now</button>
          </div>
          </form>
      </div>
  </div>';

  echo $prodDisp;
 }
}
unset($_SESSION['categorySelect']);
unset($_SESSION['priceRange']);
unset($_SESSION['prodBrand']);
unset($_SESSION['searchInput']);
 ?>
