<?php
include('SampleCrud/dbconnector.php');
session_start();

//this is for admin login
	if (isset($_POST['loginbtn'])){
		$username = $_POST['uname'];
		$Password = $_POST['pass'];
		$err = array('error'=>'');
		$sqlcheck = "SELECT Name, Pass FROM admin";
		$r_sqlcheck = mysqli_query($dbcon, $sqlcheck);
		$Admins = mysqli_fetch_all($r_sqlcheck, MYSQLI_ASSOC);

		foreach ($Admins as $Admin) {
	    if($_POST['uname'] == $Admin['Name'] and $_POST['pass'] == $Admin['Pass']){
	      $_SESSION['AdminName'] = $Admin['Name'];
	      header("location:home.php");
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
