<?php
  session_start();
  session_unset();
  include 'dbConn.php';
  $err = array('error'=>'', 'error2'=>'', 'error3'=>'');
  $Success = false;

  if(isset($_POST['btnSubmit'])){
    #verifications for input fields
    if(empty($_POST['firstname']) or empty($_POST['lastname']) or empty($_POST['email'])
      or empty($_POST['mobile']) or empty($_POST['password']) or empty($_POST['verifyPass'])){
      $err['error'] = 'Please fill in all the required fields';

    }else if(strlen($_POST['password']) < 8 ){
        $err['error3'] = 'password must have at least 8 characters';

    }else if($_POST['password'] !== $_POST['verifyPass']){
      $err['error2'] = 'password does not match';

    }else{
      #assign values
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $email = $_POST['email'];
      $mobile = $_POST['mobile'];
      $password = $_POST['password'];

      #insert new account in customers table
      $sql="INSERT INTO customers (fname, lname, email, pass, phone) VALUES ('$fname', '$lname', '$email', '$password', 'mobile')";
      $result= mysqli_query($conn, $sql);

      $sqlGetFname = "SELECT fname from customers WHERE fname = '$fname'";
      $resultGetFname = mysqli_query($conn, $sqlGetFname);
      $Getresult = mysqli_fetch_all($resultGetFname, MYSQLI_ASSOC);

      foreach ($Getresult as $fname) {
        $_SESSION['fname'] = $fname['fname'];
      }
      $Success = true;
    }
    #redirect page
    if($Success){
      header("location:index.php");
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
                    <li class="breadcrumb-item active">Register</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <form action="register.php" method="post">
        <div style="margin-left: 500px"class="login">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="register-form">
                      <div class="row">
                        <div class="col-md-6">
                          <label>First Name</label>
                          <input class="form-control" type="text" placeholder="First Name" name="firstname">
                            </div>
                            <div class="col-md-6">
                                <label>Last Name"</label>
                                <input class="form-control" type="text" placeholder="Last Name" name="lastname">
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="E-mail" name="email">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="mobile">
                            </div>
                            <div class="col-md-6">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-6">
                                <label>Retype Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="verifyPass">
                            </div>
                            <?php echo '<div style="color: red">'.$err['error'].'</div>';?>
                            <?php echo '<div style="color: red">'.$err['error2'].'</div>';?>
                            <?php echo '<div style="color: red">'.$err['error3'].'</div>';?>
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
  <?php include 'Footer.php'; ?>
