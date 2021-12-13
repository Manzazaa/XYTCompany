<?php
session_start();
include 'dbConn.php';
$cartCount = 0;
$wishCount = 0;
$subTotal = 0;
$shippingTotal = 0;
$grandTotal = 0;

if (isset($_POST['btnRemoveCart'])) {
  $prodID = $_POST['btnRemoveCart'];
  $sqlDeleteCart = "DELETE FROM cart WHERE customerID = ".$_SESSION['custID']." AND product_id = ".$prodID."";

  if ($conn->query($sqlDeleteCart) === TRUE) {
    echo "Removed from cart";
  } else {
    echo "Error removing" . $conn->error;
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

$sqlCartSummary = "SELECT SUM(product.rate * cart.quantity) as 'Total'
FROM product INNER JOIN cart ON product.product_id = cart.product_id WHERE cart.customerID ='".$_SESSION['custID']."'";
$resultSummary = $conn->query($sqlCartSummary);
if ($resultSummary->num_rows > 0) {
  while($row = $resultSummary->fetch_assoc()) {
      $subTotal = $row['Total'];
  }
}

if ($subTotal != 0 && $subTotal < 10000) {
  $shippingTotal = 300;
  $grandTotal = $subTotal + $shippingTotal;
}elseif ($subTotal >= 10000) {
  $shippingTotal = 400;
  $grandTotal = $subTotal + $shippingTotal;
}


if (isset($_POST['btnEmptyCart'])) {
  unset($_SESSION['cart']);
  $cartCount = 0;
  $subTotal = 0;
  $shippingTotal = 0;
  $grandTotal = 0;
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
      <?php include 'NavHeader.php'; ?>

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
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Cart Start -->
        <div class="cart-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-page-inner">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">

                                      <?php include 'cartDisplay.php' ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart-page-inner">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                                <div class="col-md-12">
                                    <div class="cart-summary">
                                        <div class="cart-content">
                                            <h1>Cart Summary</h1>
                                            <p>Sub Total<span>₱<?php echo $subTotal; ?></span></p>
                                            <p>Shipping Cost<span>₱<?php echo $shippingTotal; ?></span></p>
                                            <h2>Grand Total<span>₱<?php echo $grandTotal; ?></span></h2>
                                        </div>

                                        <form action="cart.php" method="post">
                                        <div class="cart-btn">
                                            <button name="btnEmptyCart">Empty Cart</button>
                                            <button>Checkout</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->

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
