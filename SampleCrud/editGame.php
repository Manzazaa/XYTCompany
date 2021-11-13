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
            <a href="#">ADD RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="addGame.php">Game</a></li>
                <li><a href="addDeveloper.php">Developer</a></li>
            </ul>
        </li>
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
			<h2 style="color: white">UPDATE GAME</h2>
			Fill this form to update game.<br><br>
			<div style="color: white">
				<p>Game ID: <?php echo $row['gameID']; ?></p>

				<p>Game Title</p>
				<input id="txtfld1" type="text" name="gameTitle" required style="width: 350px" value="<?php echo $row['gametitle'];?> ">

				<p>Developer</p>
				<input id="txtfld1" type="text" name="gameDev" required style="width: 350px" value="<?php echo $row['developer'];?> ">

				<p>Year</p>
				<input id="txtfld1" type="text" name="GameYear" required style="width: 350px" value="<?php echo $row['year'];?> ">

				<p>Price</p>
				<input id="txtfld1" type="number" name="GamePrice" required style="width: 350px" value="<?php echo $row['price'];?> ">

				<p>Image</p>
				<input type="text" id="txtfld1" name="GameImage" required style="width: 350px" value="<?php echo $row['img'];?> ">

				<p>Description</p>
				<textarea id="txtfld1" type="textarea" name="gameDescription" required style="width: 350px; height: 250px;"><?php echo $row['description'];?></textarea>

				<br><br><br>
				<a href="viewGames.php">Back</a>

				<button type="submit" class="button1" name="register" style="margin-left: 195px; padding: 8px;">Update Game</button>
			</div>
		</div>
	</form>
			</div>
		</div>


		</form>


	</div>
</body>
</html>