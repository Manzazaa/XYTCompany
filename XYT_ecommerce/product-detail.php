<?php
session_start();
require_once 'dbConn.php';
$cartCount = 0;
$wishCount = 0;


if (isset($_POST['btnAddCart'])) {
  if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  $sqlCheckCart = "SELECT product_id FROM cart WHERE customerID = ".$_SESSION['custID']." AND product_id =".$_SESSION['viewDetail']."";
  $resultCheck = $conn->query($sqlCheckCart);

  if ($resultCheck->num_rows > 0) {
    while($row = $resultCheck->fetch_assoc()) {
        $sqlUpdateCart = "UPDATE cart SET quantity = quantity + 1 WHERE product_id = ".$_SESSION['viewDetail']." AND customerID =".$_SESSION['custID']."";
        array_push($_SESSION['cart'], $row['product_id']);
        if ($conn->query($sqlUpdateCart) === TRUE) {
          echo "Updated cart";
        } else {
          echo "Update wishlist error " . $conn->error;
        }
      }
    }

    if ($resultCheck->num_rows == 0){
      $custID = $_SESSION['custID'];
      $prodID = $_SESSION['viewDetail'];
      $sqlAddCart = "INSERT INTO cart VALUES ('$custID', '$prodID', 1)";
      array_push($_SESSION['cart'], $prodID);
      if ($conn->query($sqlAddCart) === TRUE) {
        echo "added to cart";
      } else {
        echo "cart error" . $conn->error;
      }
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
      <?php include 'NavHeader.php' ?>

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
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product Detail Start -->
        <?php include 'productDetailDisplay.php'; ?>


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
