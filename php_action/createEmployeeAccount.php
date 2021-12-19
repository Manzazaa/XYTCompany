<?php 	

require_once 'core.php';

// // print_r($valid);

if(isset($_POST['register'])){

  $firstName			= $_POST['firstName'];
  $lastName				= $_POST['lastName'];
  $email 				  = $_POST['email'];
  $dateOfBirth		= date('Y-m-d', strtotime($_POST['dateOfBirth']));
  $employeeType		= $_POST['employeeType'];
  $username       = $_POST['username'];
  $password				= md5($_POST['password']);
  $cpassword 			= md5($_POST['cpassword']);

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";

    $res_u = mysqli_query($connect, $sql_u);
    $res_e = mysqli_query($connect, $sql_e);

    if (mysqli_num_rows($res_u) > 0) {
      $_SESSION['status'] = "Username already exists.";
      header($_SERVER['PHP_SELF']);

            if(mysqli_num_rows($res_e) > 0){
              $_SESSION['status'] = "Email already exists.";
      } 
     }
    else if(mysqli_num_rows($res_e) > 0){
      $_SESSION['status'] = "Email already exists.";
      } 
    else if($password != $cpassword){
      $_SESSION['status'] = "Passwords do not match.";
    }
    else{
	    $sql = "INSERT INTO users (first_name, last_name, email, date_of_birth, employee_type, username, password, user_status) 
        VALUES ('$firstName', '$lastName', '$email', '$dateOfBirth', '$employeeType', '$username', '$password', 1)";
	    if(mysqli_query($connect, $sql) === true) {
        $_SESSION['status'] = "Success.";	
      }
  }
  $connect->close();
}

	