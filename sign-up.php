<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Sign Up | ORBIT Store</title>
</head>
<body>
	<form method="POST">
		<div class="designedtext" id="logindiv">
			<h2 style="color: white">Sign Up</h2>
			Fill this form to create an account.<br><br>
			<?php include('server.php'); ?>
			<div style="color: white">
				<p>Username:</p>
				<input id="txtfld1" type="text" name="SUuname" required style="width: 350px">
				<p>Email Address</p>
				<input id="txtfld1" type="Email" name="SUemail" required style="width: 350px">
				<p>Password:</p>
				<input id="txtfld1" type="Password" name="SUpass" required style="width: 350px">
				<p>Confirm Password:</p>
				<input id="txtfld1" type="Password" name="SUrpass" required style="width: 350px">
				<p>By creating an account you agree to our <a href="https://youtu.be/F9i_gHZ19B8">Terms & Privacy.</a>
				<br><br>
				<a href="log-in.php">Back</a>
				<button type="submit" class="button1" name="register" style="margin-left: 130px">Create Account</button>

			</div>
		</div>

	</form>
</body>
</html>
