<?php include('dbconnector.php');//let's include the db connection php file
$ProdName = addslashes($_POST['ProductName']);
$ProdSupp = addslashes($_POST['ProductSupplier']);
$ProdQuantity = $_POST['ProductQuantity'];
$ProdPrice = $_POST['ProductPrice'];
$ProdDesc = addslashes($_POST['ProductDescription']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Game</title>
</head>
<body>
	<?php
		/**$sqlcheck = "SELECT * from game WHERE gametitle = '$gameTitle'";
	$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);

	if(mysqli_num_rows($r_sqlcheck) > 0){
		echo "Game already exists.";
	}
	else{**/
	$sql = "INSERT INTO products(ProdName, Description, Supplier, Quantity, Cost) VALUES ('$ProdName', '$ProdDesc','$ProdSupp', '$ProdQuantity','$ProdPrice')";
	$result = $dbcon->query($sql) or die ("Couldn't execute query.");
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewGames.php\">";
	}
	?>
</body>
</html>
