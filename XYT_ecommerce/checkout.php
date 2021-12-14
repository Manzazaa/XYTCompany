<?php
session_start();
include 'dbConn.php';
$fName = "";
$lName = "";
$email = "";
$phone = "";
$shippingTotal = 0;
$subTotal = 0;
$grandTotal = 0;

if (isset($_SESSION['custID'])) {
    $sqlGetCustInfo = "SELECT fname, lname, phone, email FROM customers WHERE customerID =".$_SESSION['custID']."";
    $resultInfo = $conn->query($sqlGetCustInfo);
    if ($resultInfo->num_rows > 0) {
      while($row = $resultInfo->fetch_assoc()) {
        $fName = $row['fname'];
        $lName = $row['lname'];
        $email = $row['email'];
        $phone = $row['phone'];
      }
    } else {
      $fName = "";
      $lName = "";
      $email = "";
      $phone = "";
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
}

if (isset($_POST['btnPlaceOrder'])) {
  //date, full name, phone, subtotal, 0, grandtotal, 0, grandtotal, 0, 0, paymentType, 1, 1, address, email
  $date = date("Y-m-d");
  $fullName = $_POST['fName'].' '.$_POST['lName'];
  $phone = $_POST['phone'];
  $address = $_POST['address'].', '.$_POST['city'].', '.$_POST['country'].', '.$_POST['zip'];
  $email = $_POST['email'];
  if(isset($_POST['rbPaypal'])){
    $paymentMode = 3;
  }
  if(isset($_POST['rbCod'])){
    $paymentMode = 4;
  }

  $sqlPlaceOrder = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status, order_status, address, email)
  VALUES ('$date', '$fullName', '$phone', '$subTotal', 0, '$grandTotal', 0, '$grandTotal', 0, 0, '$paymentMode', 1, 1, '$address', '$email')";

  if ($conn->query($sqlPlaceOrder) === TRUE) {
    echo "Order Successfully Placed";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>XYT-Store</title>
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

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Checkout Start -->
        <div class="checkout">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-inner">
                            <div class="billing-address">
                                <!--<h2>Billing Address</h2>-->
                                <form action="checkout.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>First Name</label>
                                        <input name="fName"class="form-control" type="text" placeholder="First Name" value="<?php echo $fName ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Last Name"</label>
                                        <input name="lName"class="form-control" type="text" placeholder="Last Name" value="<?php echo $lName ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>E-mail</label>
                                        <input name="email"class="form-control" type="text" placeholder="E-mail" value="<?php echo $email ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Mobile No</label>
                                        <input name="phone"class="form-control" type="text" placeholder="Mobile No" value="<?php echo $phone ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Address</label>
                                        <input name="address"class="form-control" type="text" placeholder="Address" >
                                    </div>
                                    <div class="col-md-6">
                                        <label>Country</label>
                                        <select name="country"class="custom-select">
                                            <option selected>Philippines</option>
                                            <option>United Kingdom</option>
                                            <option>United States</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>City</label>
                                        <input name="city"class="form-control" type="text" placeholder="City">
                                    </div>

                                    <div class="col-md-6">
                                        <label>ZIP Code</label>
                                        <input name="zip"class="form-control" type="text" placeholder="ZIP Code">
                                    </div>
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-12">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-inner">
                            <div class="checkout-summary">
                                <h1>Cart Total</h1>

                                <p class="sub-total">Sub Total<span>₱<?php echo $subTotal ?></span></p>
                                <p class="ship-cost">Shipping Cost<span>₱<?php echo $shippingTotal ?></span></p>
                                <h2>Grand Total<span>₱<?php echo $grandTotal ?></span></h2>
                            </div>

                            <div class="checkout-payment">
                                <div class="payment-methods">
                                    <h1>Payment Methods</h1>
                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input name="rbPaypal"type="radio" class="custom-control-input" id="payment-1" name="payment">
                                            <label class="custom-control-label" for="payment-1">Paypal</label>
                                        </div>
                                        <div class="payment-content" id="payment-1-show">
                                            <p>
                                                Payment will be charged to the email in the given billing address.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="payment-method">
                                        <div class="custom-control custom-radio">
                                            <input name="rbCod"type="radio" class="custom-control-input" id="payment-5" name="payment">
                                            <label class="custom-control-label" for="payment-5">Cash on Delivery</label>
                                        </div>
                                        <div class="payment-content" id="payment-5-show">
                                            <p>
                                                Payment will be given when the products are delivered.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout-btn">
                                    <button name="btnPlaceOrder">Place Order</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Checkout End -->

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
