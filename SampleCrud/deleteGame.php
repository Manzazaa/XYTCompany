<?php
		//mysql connection here
		include('dbconnector.php');
		$id = $_GET['id'];
		$sql = "Delete FROM products WHERE products.ProdID ='$id'";

		$result = $dbcon->query($sql) or die ("Couldn't execute query.");
	
		if($result){
			//echo "1 file is deleted.";
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=viewGames.php\">";
		}
exit();
?>