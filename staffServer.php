<?php
include('SampleCrud/dbconnector.php');
session_start();

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
