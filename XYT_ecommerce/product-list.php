<?php
require 'dbConn.php';
session_start();
$cartCount = 0;
$wishCount = 0;

// if btn Cart Clicked then add products to Cart
if (isset($_POST['btnCart'])) {
  if(empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }
  array_push($_SESSION['cart'], $_POST['btnCart']);
}

// if btn <3 clicked then add product to wishlist
if (isset($_POST['btnWish'])) {
  if (empty($_SESSION['wish'])) {
    $_SESSION['wish'] = array();
  }
  array_push($_SESSION['wish'], $_POST['btnWish']);

  $sqlCheckWish = "SELECT product_id FROM wishlist WHERE customerID = ".$_SESSION['custID']." AND product_id =".$_POST['btnWish']."";
  $resultCheck = $conn->query($sqlCheckWish);

  if ($resultCheck->num_rows > 0) {
    while($row = $resultCheck->fetch_assoc()) {
        $sqlUpdateWish = "UPDATE wishlist SET quantity = quantity + 1 WHERE product_id = ".$row['product_id']." AND customerID =".$_SESSION['custID']."";
        if ($conn->query($sqlUpdateWish) === TRUE) {
          echo "Updated wishlist";
        } else {
          echo "Update wishlist error " . $conn->error;
        }
      }
    }

    if ($resultCheck->num_rows == 0){
      $custID = $_SESSION['custID'];
      $prodID = $_POST['btnWish'];
      $sqlAddWish = "INSERT INTO wishlist VALUES ('$custID', '$prodID', 1)";
      if ($conn->query($sqlAddWish) === TRUE) {
        echo "new wishlist";
      } else {
        echo "new wishlist error" . $conn->error;
      }
    }

  }

// if MAGNIPAYING GLAS IS CLICKED DO THIS
if (isset($_POST['btnInfo'])) {
  if (!empty($_SESSION['viewDetail'])) {
    unset($_SESSION['viewDetail']);
  }
  $_SESSION['viewDetail'] = $_POST['btnInfo'];
  header("Location: product-detail.php");
}

if (!empty($_SESSION['cart'])) {
  $cartCount = count($_SESSION['cart']);
}

if (!empty($_SESSION['wish'])) {
  $wishCount = count($_SESSION['wish']);
}

if(isset($_POST['btnFilters'])) {
  if (!empty($_POST['prodCat'])) {
    switch ($_POST['prodCat']) {
      case 'ddAuto':
        $_SESSION['categorySelect'] = 10;
        break;
      case 'ddHardwares':
        $_SESSION['categorySelect'] = 9;
        break;
      case 'ddMoto':
        $_SESSION['categorySelect'] = 14;
        break;
      case 'ddLighting':
        $_SESSION['categorySelect'] = 15;
        break;
      case 'ddFurniture':
        $_SESSION['categorySelect'] = 12;
        break;
      case 'ddPlastic':
        $_SESSION['categorySelect'] = 16;
        break;
      case 'ddElectronics':
        $_SESSION['categorySelect'] = 11;
        break;
    }
  }

  if (!empty($_POST['prodPrice'])) {
    switch ($_POST['prodPrice']) {
      case '500':
        $_SESSION['priceRange'] = "rate <= 500";
        break;
      case '1500':
        $_SESSION['priceRange'] = "rate BETWEEN 500 AND 1500";
        break;
      case '3000':
        $_SESSION['priceRange'] = "rate BETWEEN 1500 AND 3000";
        break;
      case '8000':
        $_SESSION['priceRange'] = "rate BETWEEN 3000 AND 8000";
        break;
      case '12000':
        $_SESSION['priceRange'] = "rate BETWEEN 8000 AND 12000";
        break;
      case '12001':
        $_SESSION['priceRange'] = "rate BETWEEN 12000 AND 100000";
        break;
    }
  }

  if (!empty($_POST['prodBrand'])) {
    $_SESSION['prodBrand'] = $_POST['prodBrand'];
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
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <!--<div class="col-md-4">
                                            <div class="product-search">
                                                <input type="email" value="Search">
                                                <button><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>-->
                                        <div class="col-md-3">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                  <form action="product-list.php" method="post">
                                                    <select name="prodCat"class="dropdown-toggle">
                                                        <option value="" disabled selected>Choose option</option>
                                                        <option class="dropdown-item" value="ddAuto">Auto Parts</option>
                                                        <option  class="dropdown-item" value="ddMoto">Motorcycle Parts</option>
                                                        <option  class="dropdown-item" value="ddFurniture">Furnitures</option>
                                                        <option  class="dropdown-item" value="ddLighting">Lightings</option>
                                                        <option  class="dropdown-item" value="ddPlastic">Plastic Wares</option>
                                                        <option  class="dropdown-item" value="ddElectronics">Electronics</option>
                                                        <option  class="dropdown-item" value="ddHardwares">Hardwares</option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                  <select name="prodPrice" class="dropdown-toggle">
                                                      <option value="" disabled selected>Price Range</option>
                                                      <option class="dropdown-item" value="500">₱1 - ₱500</option>
                                                      <option  class="dropdown-item" value="1500">₱500 - ₱1500</option>
                                                      <option  class="dropdown-item" value="3000">₱1500 - ₱3000</option>
                                                      <option  class="dropdown-item" value="8000">₱3000 - ₱8000</option>
                                                      <option  class="dropdown-item" value="12000">₱8000 - ₱12000</option>
                                                      <option  class="dropdown-item" value="12001">₱12000 above</option>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="product-price-range">
                                                <div class="dropdown">
                                                  <select name="prodBrand" class="dropdown-toggle">
                                                      <option value="" disabled selected>Brands</option>
                                                      <?php include 'brandList-Display.php' ?>
                                                  </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                          <input class="btn"type="submit" name="btnFilters" value="Apply Filter">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php include 'productList-Display.php' ?>

                        </div>

                        <!-- Pagination Start -->
                        <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Pagination Start -->
                    </div>

                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                      <!--<div class="sidebar-widget category">
                          <h2 class="title">Category</h2>
                          <nav class="navbar bg-light">
                              <ul class="navbar-nav">
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Men & Women Clothes</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Gadgets & Accessories</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link" href="#"><i class="fa fa-microchip"></i>Electronics & Accessories</a>
                                  </li>
                              </ul>
                          </nav>
                      </div>-->

                        <!--<div class="sidebar-widget widget-slider">
                            <div class="sidebar-slider normal-slider">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-10.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₱</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₱</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Product Name</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>₱</span>99</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <!--<div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                <li><a href="product-list.php">Galaxy and Global Hardwares</a><span>(45)</span></li>
                                <li><a href="product-list.php">Webike Japan</a><span>(34)</span></li>
                                <li><a href="product-list.php">Keihin Japan</a><span>(67)</span></li>
                                <li><a href="product-list.php">Samya</a><span>(74)</span></li>
                                <li><a href="product-list.php">Mandaue Ph</a><span>(89)</span></li>
                            </ul>
                        </div>-->

                        <!--<div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>-->
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->

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
