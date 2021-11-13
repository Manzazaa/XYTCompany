<?php include('dbconnector.php');//let's include the db connection php file ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Add a Product | XYT</title>
</head>
<body>
	<div>
		 <ul>
		 	<li style="color: #66c0f4; margin-left: 50px;margin-right: 50px"><h2>XYT store | Administrator</h2>
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
		<form method="POST" action="saveGame.php" enctype="multipart/form-data" name="form">
			<?php $ProdName=""; $ProdSupp=""; $ProdQuantity="";$ProdPrice=""; $ProdDesc="";?>

		<div class="designedtext" id="logindiv" style="margin-top: 200px; margin-bottom: 30px;">
			<h2 style="color: white">ADD Product</h2>
			Fill this form to add a product.<br><br>
			<div style="color: white">

				<p>Name</p>
				<input id="txtfld1" type="text" name="ProductName" required style="width: 350px">

				<p>Supplier</p>
				<input id="txtfld1" type="text" name="ProductSupplier" required style="width: 350px">

				<p>Quantity</p>
				<input id="txtfld1" type="number" name="ProductQuantity" required style="width: 350px">

				<p>Price</p>
				<input id="txtfld1" type="text" name="ProductPrice" required style="width: 350px">

				<p>Description</p>
				<textarea id="txtfld1" type="textarea" name="ProductDescription" required style="width: 350px; height: 250px;"></textarea>
				<br><br><br>

				<a href="viewGames.php"style="margin-left:3px">Back</a>
				<button type="submit" class="button1" name="register" style="margin-left: 160px">Submit</button>
			</div>
		</div>
	</form>
			</div>
		</div>

		</form>

	</div>
</body>
</html>
