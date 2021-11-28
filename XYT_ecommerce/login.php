<?php
session_start();
session_unset();
#database connection
include 'dbConn.php';
$err = array('error'=>'');
$Success = false;
if(isset($_POST['btnSubmit'])){

  $sql='SELECT email, pass, fname  FROM customers';
  $result= mysqli_query($conn, $sql);
  $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $err = array('error'=>'');

  if(empty($_POST['username']) or empty($_POST['pass'])){
  $err['error'] = 'Please fill in all the required fields';
  }else {
  foreach ($customers as $customer) {
    if($_POST['username'] == $customer['email'] and $_POST['pass'] == $customer['pass']){
      $_SESSION['fname'] = $customer['fname'];
      header("location:index.php");
    }else {
      $err['error'] = "login credentials don't match an account";
      }
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
                    <!--<div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>-->
                    <!--<div class="col-md-3">
                        <div class="user">
                            <a href="wishlist.html" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart.html" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Login</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Login Start -->
        <form action="login.php" method="post">
        <div style="margin-left: 500px"class="login">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="login-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" type="text" placeholder="E-mail / Username" name="username">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="password" placeholder="Password" name="pass">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount">
                                        <?php echo '<div style="color: red">'.$err['error'].'</div>'?>
                                        <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                    </div>
                                    <a href="register.php">Don't Have an Account? <u>Register Here</u></a>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn" name="btnSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Login End -->

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
