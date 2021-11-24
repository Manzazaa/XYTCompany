<?php
//session_start();// we start the session of course
include ('server.php');
if(empty($_SESSION['cart'])){

$_SESSION['cart'] = array();//we create a session variable called cart, and it is a goddamn array
}
array_push($_SESSION['cart'], $_GET['id']);//upon clicking, we get the id from the URL that has been set from gamePage.php and we insert that to the session array called cart
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Home | ORBIT Store</title>
	<style type="text/css">
		#successdiv{
        width: 500px;
        color: #c7d5e0;
        margin-top: 200px;
        margin-left: 410px;
        background-color: rgba(27, 40, 56,0.5);
        text-align: left;
        border-radius: 8px;
        padding: 15px;
    }
	</style>
</head>
<body>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
		</ul>
		<div id="shoptitle">
			<h2 style="color:#c7d5e0 "> Browse the Store</h2>
		</div>
	</div>

	<div id="successdiv">
		<h2>Game successfully added to cart.</h2>
		<a href="home.php" style="margin-left: 85px">Continue Shopping</a>
		<a href="cart.php" style="margin-left: 10px">View Shopping Cart</a>
	</div>
</body>
</html>