<?php
require_once 'dbConn.php';

$sqlGetDetail = "SELECT product_name, product_image, rate, description FROM product WHERE product_id = ".$_SESSION['viewDetail']."";
$resultDetail = $conn->query($sqlGetDetail);

if ($resultDetail->num_rows > 0) {
  while($row = $resultDetail->fetch_assoc()) {
    echo '<div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                              <div class="product-image">
                                <img width="400px" Height="500px"src="'.$row['product_image'].'" alt="Product Image">
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-content" style="margin-top:-220px; margin-left:50px">
                                    <div class="title"><h2>'.$row['product_name'].'</h2></div>
                                    <div class="ratting">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="price">
                                        <h4>Price:</h4>
                                        <p>₱'.$row['rate'].'</p>
                                    </div>
                                    <div class="quantity">
                                        <h4>Quantity:</h4>
                                        <form action="product-detail.php" method="post">
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="action">
                                        <button name="btnAddCart" class="btn" href="#"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                        <button name="btnBuyNow" class="btn" href="#"><i class="fa fa-shopping-bag"></i>Buy Now</button>
                                    </div>
                                    </form>
                                    <div style="width: 700px;margin-left:350px; margin-top:-290px;"class="col-lg-12">
                                        <ul class="nav nav-pills nav-justified">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div id="description" class="container tab-pane active">

                                                <h4>Product description</h4>
                                                <p>'.$row['description'].'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
  }
} else {
  echo "0 results";
}

 ?>
