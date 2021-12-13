<?php
require 'dbConn.php';
session_start();
$cartCount = 0;
$wishCount = 0;
$quantity = 1;
if (!empty($_SESSION['cart'])) {
  $cartCount = count($_SESSION['cart']);
}

//kay naa may kwarta wishlist to cart matik
if (isset($_POST['btnAddCart'])) {
  $custID = $_SESSION['custID'];
  $prodID = $_POST['btnAddCart'];
  $prodQuantity = $_POST['quantity'];
  $sqlWishToCart = "INSERT INTO cart VALUES ('$custID', '$prodID', '$prodQuantity')";

  if ($conn->query($sqlWishToCart) === TRUE) {
    $sqlRemoveWish = "DELETE FROM wishlist WHERE customerID = ".$custID." AND product_id = ".$prodID."";

    if ($conn->query($sqlRemoveWish) === TRUE) {

    } else {
      echo "Error deleting record: " . $conn->error;
    }
    echo "Added to Cart";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

if (isset($_SESSION['custID'])) {
  //CHECKING NUMBERS OF PRODUCT IN WISHLIST
  $sqlWishCount = "SELECT SUM(quantity) FROM wishlist WHERE customerID = ".$_SESSION['custID']."";
  $resultWishCount = $conn->query($sqlWishCount);
  if ($resultWishCount->num_rows == 0) {
    $wishCount = 0;
  }
  if ($resultWishCount->num_rows > 0) {
    while ($row = $resultWishCount->fetch_assoc()) {
      $wishCount = $row['SUM(quantity)'];
    }
  }

  //CHECKING NUMBER OF PRODUCTS IN CART
  $sqlCartCount = "SELECT SUM(quantity) FROM cart WHERE customerID = ".$_SESSION['custID']."";
  $resultCartCount = $conn->query($sqlCartCount);
  if ($resultCartCount->num_rows == 0) {
    $cartCount = 0;
  }
  if ($resultCartCount->num_rows > 0) {
    while ($row = $resultCartCount->fetch_assoc()) {
      $cartCount = $row['SUM(quantity)'];
    }
  }
}

if (isset($_POST['btnRemoveWish'])) {
  if (($remove = array_search($_POST['btnRemoveWish'], $_SESSION['wish'])) !== false) {
  unset($_SESSION['wish'][$remove]);
  $wishCount = count($_SESSION['wish']);
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <?php include 'NavHeader.php';  ?>

        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                                <h1>XYT store</h1>
                            </a>
                        </div>
                    </div>
                    <?php include 'searchDisplay.php' ?>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span><?php echo $wishCount; ?></span>
                            </a>
                            <a href="cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo $cartCount; ?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="product-list.php">Products</a></li>
                    <li class="breadcrumb-item active">Wishlist</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Wishlist Start -->
        <div class="wishlist-page">
            <div class="container-fluid">
                <div class="wishlist-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Add to Cart</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">

                                      <?php include 'wishDisplay.php'; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist End -->

        <?php include 'Footer.php'; ?>

        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
