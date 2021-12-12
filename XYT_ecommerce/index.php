<?php

session_start();
include 'dbConn.php';
$cartCount = 0;
$wishCount = 0;

if (!empty($_SESSION['cart'])) {
  $cartCount = count($_SESSION['cart']);
}

if (isset($_SESSION['custID'])) {
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
}


if (isset($_POST['catHardware'])) {
  $_SESSION['categorySelect'] = 9;
  header("Location: product-list.php");
};
if (isset($_POST['catAuto'])) {
  $_SESSION['categorySelect'] = 10;
  header("Location: product-list.php");
};
if (isset($_POST['catFurniture'])) {
  $_SESSION['categorySelect'] = 12 ;
  header("Location: product-list.php");
};
if (isset($_POST['catLightings'])) {
  $_SESSION['categorySelect'] = 15;
  header("Location: product-list.php");
};
if (isset($_POST['catMotoParts'])) {
  $_SESSION['categorySelect'] = 14;
  header("Location: product-list.php");
};
if (isset($_POST['catPlasticWares'])) {
  $_SESSION['categorySelect'] = 16;
  header("Location: product-list.php");
};
if (isset($_POST['catElectronics'])) {
  $_SESSION['categorySelect'] = 11;
  header("Location: product-list.php");
};
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>XYT store</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
        <style media="screen">
        button[name="catAuto"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
        button[name="catMotoParts"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
          button[name="catFurniture"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
          button[name="catLightings"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
          button[name="catPlasticWares"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
          button[name="catElectronics"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
          button[name="catHardware"] {
            background: transparent;
            border: 0 none;

            font: inherit;
            cursor: pointer;
          }
        </style>
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

        <!-- Main Slider Start -->
        <form action="index.php" method="post">
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li class="nav-item">
                                    <button name="catAuto" type="submit" class="nav-link" ><i class="fa fa-cogs"></i>Auto Parts</button>
                                </li>
                                <li class="nav-item">
                                    <button name="catMotoParts" type="submit" class="nav-link" ><i class="fa fa-motorcycle"></i>Motorcycle Parts</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" name="catFurniture" type="submit" ><i class="fa fa-chair"></i>Furniture</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" name="catLightings" type="submit" ><i class="fa fa-lightbulb"></i>Lightings</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" name="catPlasticWares" type="submit" ><i class="fa fa-beer"></i>Plastic Wares</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" name="catElectronics" type="submit" ><i class="fa fa-cog"></i>Electronics</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" name="catHardware" type="submit" ><i class="fa fa-wrench"></i>Hardware</button>
                                </li>
                            </ul>
                        </nav>
                    </div>
                  </form>

                    <div class="col-md-6">
                        <div class="header-slider normal-slider">
                            <div class="header-slider-item">
                                <img width="700px" height="400px"src="https://media.istockphoto.com/photos/interior-ceiling-lightings-with-white-semispherical-covers-picture-id155285672?b=1&k=20&m=155285672&s=170667a&w=0&h=75K3Px70gSapJBWfADg3-dS69YySnBSSP-cO4ln0TN8=" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Coming from the best International Suppliers</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img width="700px" height="400px"src="https://media.istockphoto.com/photos/modern-living-room-with-orange-couch-picture-id637876746?b=1&k=20&m=637876746&s=170667a&w=0&h=EJax_avgktyLW9mEDgAcot5fULDJcOaD5mF3lsBLviE=" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Trusted by Customers all over the world since 2000</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                            <div class="header-slider-item">
                                <img width="700px" height="400px"src="https://images.unsplash.com/photo-1534190239940-9ba8944ea261?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dG9vbHN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="Slider Image" />
                                <div class="header-slider-caption">
                                    <p>Best Prices for Best Products</p>
                                    <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="header-img">
                            <div class="img-item">
                                <img src="https://media.istockphoto.com/photos/car-engine-picture-id1034926174?b=1&k=20&m=1034926174&s=170667a&w=0&h=bbrJsDFI5k2ebxncaMDvsNsVCYfNtbTAacHfZBFavHU=" />
                                <a class="img-text" href="">
                                    <p>Palit namo</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="https://media.istockphoto.com/photos/auto-mechanic-working-on-car-engine-in-mechanics-garage-repair-picture-id1284285153?b=1&k=20&m=1284285153&s=170667a&w=0&h=Qkc7YOECV0bzooIkwJX7eba7bD9MtxW0LL0xecEQ3pI=" />
                                <a class="img-text" href="">
                                    <p>Pili mga suki</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->


        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur elit
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End-->

        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="https://images.unsplash.com/photo-1518821324564-aa4c937a512c?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8bW90b3JjeWNsZSUyMHBhcnRzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="https://media.istockphoto.com/photos/plastics-kitchen-drawer-picture-id1255730577?b=1&k=20&m=1255730577&s=170667a&w=0&h=kK9I1RN4nsIvFpD-W9PCKZpCUkE4NtwF9kK3OgILA8k=" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="https://media.istockphoto.com/photos/household-appliances-and-kitchen-electronics-in-cardboard-boxes-in-picture-id1278547508?b=1&k=20&m=1278547508&s=170667a&w=0&h=1xtg76iU0cIMtWBEGC_sMf2XcepkY5rYpF6j9np_nNA=" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="https://images.unsplash.com/photo-1581539250439-c96689b516dd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8Y2hhaXJ8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="https://images.unsplash.com/photo-1580480055273-228ff5388ef8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8Y2hhaXJ8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="https://images.unsplash.com/photo-1581783898377-1c85bf937427?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8dG9vbHN8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" />
                            <a class="category-name" href="">
                                <p>Lorem ipsum dolor sit amet consectetur elit</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->

        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Top Products</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Comfy Sofa v1</a>
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
                                    <img src="https://images.unsplash.com/photo-1567016432779-094069958ea5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8c29mYXxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>₱</span>1500</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Hayag lamp</a>
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
                                    <img height="345"src="https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8N3x8ZnVybml0dXJlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>₱</span>999</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Wooden Kahoy chair</a>
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
                                    <img height="345"src="https://images.unsplash.com/photo-1592078615290-033ee584e267?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8ZnVybml0dXJlfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>₱</span>700</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Microwavy</a>
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
                                    <img height="345"src="https://media.istockphoto.com/photos/modern-kitchen-microwave-oven-picture-id1144960519?b=1&k=20&m=1144960519&s=170667a&w=0&h=6MgLR4m-Z5sDONRB8d1ch9RXtUcYfiUCtjv6Szx7FJ0=" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>₱</span>3999</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-title">
                                <a href="#">Lee gid vZ-360</a>
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
                                    <img height="345"src="https://images.unsplash.com/photo-1616788902258-138db56fe7e5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTl8fHRpcmVzfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Product Image">
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>₱</span>2000</h3>
                                <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->


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
