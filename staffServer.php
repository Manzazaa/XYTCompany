<?php
include('SampleCrud/dbconnector.php');
session_start();

//this is for customerLogin
	if (isset($_POST['loginbtn'])){
		$username = $_POST['uname'];
		$Password = $_POST['pass'];
		$err = array('error'=>'');
		$sqlcheck = "SELECT FirstName, Email, pass FROM customer";
		$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);
		$Customers = mysqli_fetch_all($r_sqlcheck, MYSQLI_ASSOC);

		foreach ($Customers as $Customer) {
	    if($_POST['uname'] == $Customer['Email'] and $_POST['pass'] == $Customer['pass']){
	      $_SESSION['FirstName'] = $Customer['FirstName'];
	      header("location:customerHome.php");
	    }
	  }
	}
	//this is for logout
	if (isset($_GET['logout'])){//if they press the logout button
		//session_write_close();before logging out, this code saves the data from the session
		session_destroy();//we frickin destroy that
		unset($_SESSION['username']);
		header("location: log-in.php");
	}

?>
