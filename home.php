<?php include('SampleCrud/dbconnector.php');//let's include the db connection php file
include('server.php');
if (!isset($_SESSION['username'])) {//if there is no session, go to log in page instead of the home page
	header('location: staffLogin.php');
}?>

<!DOCTYPE html>
<html>
<head>

	<title>Home | XYT Company</title>
	<link rel="stylesheet" type="text/css" href="SampleCrud/stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<style type="text/css">
		#slider{
  overflow: hidden;
}
#slider figure{
  position: relative;
  width: 300%;
  margin-left: 0;
  left: 0;
  animation: 50s slider infinite;
}
#slider figure img{
  width: 20%;
  float: left;
}
@keyframes slider{
	0%{
		left: 0;
	}
	25%{
		left: -40%;
	}
	50%{
		left: -100%;
	}
	75%{
		left: -160%;
	}100%{
		left: 0%;
	}
}

	</style>
</head>
<body>

<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 100px"><h1>XYT Co.</h1>
			<h3 style="color: #66c0f4";>Admin <?php echo $_SESSION['username'];?></h3>
			<li><a href="">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="cart.php">Cart</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li><a href="SampleCrud/viewGames.php">Admin Controls</a></li>
		</ul>
	</div>
	<div id ="slider">
			<figure>
				<img src="https://www.harley-davidson.com/content/dam/h-d/images/product-images/parts/panamerica-2021/68000341/68000341_TT.jpg?impolicy=myresize&rw=700" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/rubber-tire-and-wheels-at-garage-business-shop-picture-id1284776529?b=1&k=20&m=1284776529&s=170667a&w=0&h=eyDqgEtqsjRbmlLqJvrcydswvCxdKO94MvlUARID-Ts=" width="300" height="500">
				<img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/tool-belt-with-tools-picture-id486580144?b=1&k=20&m=486580144&s=170667a&w=0&h=w6ri5RQwjhT_QhzfU2GJAJe3xuooDy3WL_V0WxmjcMw=" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/household-appliances-and-kitchen-electronics-in-cardboard-boxes-in-picture-id1278547508?b=1&k=20&m=1278547508&s=170667a&w=0&h=1xtg76iU0cIMtWBEGC_sMf2XcepkY5rYpF6j9np_nNA=" width="300" height="500">
			</figure>
		</div>
		<div id="shoptitle">
			<h2 style="color:#c7d5e0 "> Browse the Store</h2>
		</div>
	</div>
		<form method="POST" action="home.php">
			<input id="txtfld1" type="text" name="search" placeholder="Search" style="width: 250px; margin-bottom: 20px; margin-left: 800px;">
			<button type="submit" name="searchBtn" class="button1">Search</button>
		</form>

<?php
	if (isset($_POST['searchBtn'])) {
		?>
		<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Supplier</th>
				<th>Description</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
		</thead>
<?php
	$searchQuery = $_POST['search'];
	$searchQuery = htmlspecialchars($searchQuery);
	// $searchQuery = mysql_real_escape_string($searchQuery);
	$SQLsearchQuery = ("SELECT * from products WHERE (`ProdID` LIKE '%".$searchQuery."%') OR (`ProdName` LIKE '%".$searchQuery."%') OR (`Supplier` LIKE '%".$searchQuery."%')OR (`Quantity` LIKE '%".$searchQuery."%') OR (`Cost` LIKE '%".$searchQuery."%')") or die(mysql_error());
	$searchResults = $dbcon->query($SQLsearchQuery);

	if ($searchResults->num_rows>0){
		while ($searchRow = $searchResults->fetch_assoc()) {
		?>
<tbody>
			<tr>
				<td><?php echo $searchRow['ProdName']; ?></td>
				<td><?php echo $searchRow['Description']; ?></td>
				<td><?php echo $searchRow['Supplier']; ?></td>
				<td><?php echo $searchRow['Quantity']; ?></td>
				<td><?php echo $searchRow['Cost']; ?></td>

				<td><a href="gamePage.php?id=<?php echo $row['ProdID'];?>">View Item</a>

			</tr>
		</tbody>
	<?php }}}else{?>

<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
		<thead>
			<tr>
				<th>Name</th>
				<th>Supplier</th>
				<th>Description</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php
			$sql = "SELECT * from products";
			$result = $dbcon->query($sql);
			if ($result->num_rows>0){
				while ($row = $result -> fetch_assoc()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $row['ProdName']; ?></td>
				<td><?php echo $row['Description']; ?></td>
				<td><?php echo $row['Supplier']; ?></td>
				<td><?php echo $row['Quantity']; ?></td>
				<td><?php echo $row['Cost']; ?></td>

				<td><a href="gamePage.php?id=<?php echo $row['ProdID'];?>">View Item</a>
				<!-- <a href="deleteGame.php?id=<?php echo $row['ProdID'];?>" style="text-decoration: none;"></a></td> -->

			</tr>
		</tbody>
	<?php }}}?>
	</table>
</div>
</body>
</html>
