<?php
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete Account | ORBIT Store</title>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
</head>
<body>
	<div class="designedtext" id="logindiv">
		<br><br>
		Are you sure you want to delete your account? Once you click that button, it is the point of no return. Like a black hole.
		<br><br>
		<form method="POST">
			You are deleting: <?php echo $_SESSION['username'] ?> 
			<input type="text" name="username" hidden="" value="<?php echo $_SESSION['username'] ?> "><br><br><br>
			<a href="userprofile.php" style="position: absolute; bottom: 43px">Back</a>
		<button type="submit" class="button1" name="deleteAcc" style="margin-left: 270px;">Delete My Account</button>
		</form>
</body>
</html>