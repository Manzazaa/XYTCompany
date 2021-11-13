<?php include('dbconnector.php');//let's include the db connection php file 
$id = $_GET['id'];
$prodName = addslashes($_POST['prodname']);
$supplier = addslashes($_POST['supplier']);
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$Description = addslashes($_POST['Description']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>UPDATE PRODUCT</title>
</head>
<body>
	<?php 
		$sql1 = "UPDATE products SET ProdName = '$prodName', Supplier = '$supplier', Description = '$Description', Quantity = '$quantity', Cost = '$price' WHERE ProdID = '$id' ";
	$result = $dbcon->query($sql1) or die ("Couldn't execute query.");
	if($result){
		echo "<meta http-equiv=\"refresh\" content=\"0; URL = viewGames.php\">";
	}
	?>
</body>
</html>
