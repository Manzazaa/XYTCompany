<?php include('server.php');
$id = $_GET['id'];//we get the id from the url that we have set in the previous page
$sql = "SELECT * FROM products WHERE ProdID = '$id'";// then we select all the games that corresponds to that url

$result = $dbcon->query($sql);//we perform a query to find those games
$row = $result->fetch_assoc();//and store them in the $row variable
 ?>

<!DOCTYPE html> 
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title> <?php echo $row['ProdName'] ?> | XYT Co.</title>
	<style type="text/css">
#gamepicdiv{
  margin-top: 130px;
  margin-left: 20px;
  margin-right: 900px;

}
#gamepicdiv img{
	border-radius: 4px;
}
#descriptiondiv{
	position: absolute;
	top:130px;
	left:440px;
	width: 750px;

}
#superdiv{ 
background: rgb(42,71,94);
background: radial-gradient(circle, rgba(42,71,94,1) 0%, rgba(14,30,63,1) 51%);
border-radius: 4px;
margin-right: 60px;
margin-left: 60px;
}
#gameprice{
	font-size: 20px;
	margin-top: 90px;
	width: 500px;
	margin-bottom: 30px;
}
.button2 {
  background-color:#779800;
  border: none;
  color: #afe38a;
  padding: 6px 25px;
  text-align: center;
  /*display: inline-block;*/
  font-size: 15px;
  transition-duration: 0.2s;
}
.button2:hover {
  background-color:#a2c902; /* Green */
  color: white;
}
	</style>
</head>
<body>
		<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="home.php">Home</a></li>
  			<li><a href="home.php">Store</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
		</ul>
		</div>
<div id="superdiv" class="designedtext">

	<div id="gamepicdiv">
		<!-- <img src="<?php echo $row['img']?>" width="320" height="430"><!--we display the corresponding image for the game-->
	</div> -->
<div id="descriptiondiv" style="color:#c7d5e0;"><!--division for the description of the game-->
	<h1 style="text-align: left; "> <?php echo $row['ProdName'] ?> </h1>
	<br>
	<?php echo $row['Description'] ?>
	<br><br>
	Supplier: <?php echo $row['Supplier'];?>

	<div id="gameprice"><!-- div for the price of the game -->
		Buy <?php echo $row['ProdName'] ?><br><br>
		<form method="POST" action="addToCart.php?id=<?php echo"$id" ?>"><!--here, we set a specific id to the add to cart page action, where it takes our gameID as its id so that the next page knows that what's added in the cart is this specific game wtf is my english-->
			P<?php echo $row['Cost']?><br>
			<button class="button2" style="margin-top: 20px;">ADD TO CART</button>
		</form>
	</div>

</div>

</div>
</body>
</html>