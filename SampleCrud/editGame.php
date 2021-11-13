<?php include('dbconnector.php');//let's include the db connection php file 
$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE ProdID = '$id'";

$result = $dbcon->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Update a Product | XYT</title>
</head>
<body>
	<div>
		 <ul>
		 	<li style="color: #66c0f4; margin-left: 50px;margin-right: 50px"><h2>XYT Company | Administrator</h2>
        
        <li>
            <a href="#">VIEW RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="viewGames.php">Products</a></li>
                <li><a href="viewDeveloper.php">Suppliers</a></li>
                <li><a href="viewUsers.php">Users</a></li>
                 <li><a href="viewSpecTransaction.php">Specific Transactions</a></li>
                  <li><a href="viewTransactions.php">All Transactions</a></li>

            </ul>
        </li>
        <li><a href="../home.php">Home</a></li>

        <li style="float:right">
			<a href="../home.php?logout='1'">Logout</a></li>
    </ul>
			</div>
	<div>
		<form method="POST" action="saveEditGame.php?id=<?php echo $id; ?> " name="form">
			<?php $gameTitle=""; $developer=""; $year="";$price=""; $img="";$gameDescription=""; ?>
			
		<div class="designedtext" id="logindiv" style="margin-top: 270px; margin-bottom: 30px;">
			<h2 style="color: white">UPDATE PRODUCT</h2>
			Fill this form to update product.<br><br>
			<div style="color: white">
				<p>Product ID: <?php echo $row['ProdID']; ?></p>

				<p>Name</p>
				<input id="txtfld1" type="text" name="prodname" required style="width: 350px" value="<?php echo $row['ProdName'];?> ">

				<p>Suppliers</p>
				<input id="txtfld1" type="text" name="supplier" required style="width: 350px" value="<?php echo $row['Supplier'];?> ">


				<p>Quantity</p>
				<input id="txtfld1" type="number" name="quantity" required style="width: 350px" value="<?php echo $row['Quantity'];?> ">

				<p>Price</p>
				<input id="txtfld1" type="number" name="price" required style="width: 350px" value="<?php echo $row['Cost'];?> ">

				<p>Description</p>
				<textarea id="txtfld1" type="textarea" name="Description" required style="width: 350px; height: 250px;"><?php echo $row['Description'];?></textarea>

				<br><br><br>
				<a href="viewGames.php">Back</a>

				<button type="submit" class="button1" name="register" style="margin-left: 195px; padding: 8px;">Update Product</button>
			</div>
		</div>
	</form>
			</div>
		</div>


		</form>


	</div>
</body>
</html>