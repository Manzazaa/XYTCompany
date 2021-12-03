<?php

$navUserDisp = '';
$navUserIcon = '';
if (isset($_SESSION['fname'])) {
  $navUserIcon = '<p style="font-size:20px; color:white; margin-top:5px"><i color="white" class="fa fa-user fa-2x"></i><b> Hello '.$_SESSION['fname'].'</b></p>';
  $navUserDisp = '<a href="login.php" class="nav-item nav-link">Logout</a>';
}else {
  //session_destroy();
  $navUserDisp = '<div class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                  <div class="dropdown-menu">
                      <a href="login.php" class="dropdown-item">Login</a>
                      <a href="register.php" class="dropdown-item">Register</a>
                  </div>
                </div>';
}

 ?>
<!-- Top bar Start -->

<div class="top-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <i class="fa fa-envelope"></i>
                xyt_store@email.com
            </div>
            <div class="col-sm-6">
                <i class="fa fa-phone-alt"></i>
                09999090909
            </div>
        </div>
    </div>
</div>
<!-- Top bar End -->

<!-- Nav Bar Start -->
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
              <?php echo $navUserIcon; ?>
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="product-list.php" class="nav-item nav-link">Products</a>
                    <a href="my-account.php" class="nav-item nav-link">My Account</a>
                    <!--<div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                        <div class="dropdown-menu">
                            <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                            <a href="login.html" class="dropdown-item">Login & Register</a>
                            <a href="contact.html" class="dropdown-item">Contact Us</a>
                        </div>-->
                    </div>
                </div>
                <div class="navbar-nav ml-auto">
                  <?php echo $navUserDisp; ?>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
