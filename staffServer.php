<?php
include('SampleCrud/dbconnector.php');
session_start();

//this is for the registration
// if(isset($_POST['register'])){//if the user clicks register
// 	//we store each values in the textfields in the variables

// 	$username = $_POST['SUuname'];		
// 	$Name = $_POST['SUName'];	
// 	$Password = $_POST['SUpass'];		
// 	$Password2 = $_POST['SUrpass'];
// //this is for confirming whether the user exists
// 	$sql_u = "SELECT * FROM employees WHERE username='$username'";

//   	$res_u = mysqli_query($dbcon, $sql_u);


//   	if (mysqli_num_rows($res_u) > 0) {
//   	   echo "Username already exists.";
//   	 } 
//   	}
// 	else if($Password != $Password2){
// 		 echo "Passwords do not match.";
// 	}
// 	else{
// 		$passwordENC = md5($Password);//encrypt password-san
// 		$sql = "INSERT INTO employees (username, Name, password) 
// 					VALUES ('$username', '$Name', '$passwordENC')";
// 		mysqli_query($dbcon, $sql);
// 		$_SESSION['username']=$username;
// 		$_SESSION['success'] = "Welcome to Orbit Store!";
// 		header('location: home.php');
// }
//this is for staffLogin
	if (isset($_POST['loginbtn'])){
		$username = $_POST['uname'];
		$Password = $_POST['pass'];

		$sqlcheck = "SELECT * FROM admin WHERE Name ='$username' AND Pass = '$Password'";
		$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);

        if(mysqli_num_rows($r_sqlcheck)==1){//if there exists one
			$_SESSION['username']=$username;
            header('location:home.php');
			}else{
				echo "Invalid combination.";
			}
		}
		// else{
		// 	
		// }
	//this is for logout
	if (isset($_GET['logout'])){//if they press the logout button
		//session_write_close();before logging out, this code saves the data from the session
		session_destroy();//we frickin destroy that
		unset($_SESSION['username']);
		header("location: log-in.php");
	}

?>
