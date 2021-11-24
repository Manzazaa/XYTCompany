<?php include('server.php');?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_SESSION['username']." | ORBIT Store"?> </title>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
</head>
<body style="background-image: url(images/fancy.jpg);">
	<?php if($_SESSION['username'] == 'admin'){?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="home.php">Home</a></li>
  			<li><a href="home.php">Store</a></li>
  			<li><a href="userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
  			<li><a href="SampleCrud/viewGames.php">Admin Controls</a></li>
		</ul>
	</div>
<?php }else{?>
	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
			<li><a href="home.php">Home</a></li>
  			<li><a href="home.php">Store</a></li>
  			<li><a href="userprofile.php"><?php echo $_SESSION['username'] ?></a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
  			<li style="float:right"><a href="cart.php">Cart </a></li>
		</ul>
	</div>
<?php }?>
	<div class="designedtext">
		<div id="userlayerdp"><!-- div for the profpic and name, etc. layer -->
			<img src="images/user2.jpg" width="200" height="200">
			<p id="usernametxt"> <?php echo $_SESSION['username']?></p>
			<!--<div id="description" class="designedtext">I stan grills that have names starting with M and ends with an O, with four letters only and the second and third letters are 'O' and 'M' respectively.</div>-->
		</div>
		<div id="settingslayer" class="designedtext"><!-- div for settings-->
			<div style="margin-left: 20px;">
				<p>Account Settings</p>
				<a href="userEdit.php">Change Password</a><br><br>
				<a href="userDelete.php">Delete Account from existence</a><br><br>
				<a href="SampleCrud/userTransactionHistory.php">View Transaction History</a>
			</div>
		</div>

		<div><!-- div for body -->

		</div>
	</div>
</body>
</html>