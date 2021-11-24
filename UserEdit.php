<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Change Password | ORBIT Store</title>
</head>
<body>
	<form method="POST">
		<div class="designedtext" id="logindiv">
			<h2 style="color: white">Change Password</h2>
			Fill this form to change password.<br><br>
			<?php include('server.php'); ?>
			<div style="color: white">
				<p> Username:</p>
				<input id="txtfld1" type="text" name="username" value="<?php echo $_SESSION['username'] ?> "required style="width: 350px" readonly>	

					<p> Password:</p>
				<input id="txtfld1" type="Password" name="oldPass" required style="width: 350px">

				<p>New Password:</p>
				<input id="txtfld1" type="Password" name="newPass1" required style="width: 350px">

				<p>Confirm New Password:</p>
				<input id="txtfld1" type="Password" name="newPass2" required style="width: 350px">
				<br><br>
				<a href="userprofile.php">Back</a>
				<button type="submit" class="button1" name="changepass" style="margin-left: 180px">Change</button>

			</div>
		</div>

	</form>
</body>
</html>
