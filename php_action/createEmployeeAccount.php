<?php 	

require_once 'core.php';

// // print_r($valid);

if(isset($_POST['register'])){
  $valid['success'] = array('success' => false, 'messages' => array());

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
      $valid['success'] = false;
      $valid['messages'] = "Username already exists.";
      echo "Username already exists.";	
            if(mysqli_num_rows($res_e) > 0){
              $valid['success'] = false;
              $valid['messages'] = "Email already exists.";
      } 
     }
    else if(mysqli_num_rows($res_e) > 0){
      $valid['success'] = false;
      $valid['messages'] = "Email already exists.";
      } 
    else if($password != $cpassword){
      $valid['success'] = false;
      $valid['messages'] = "Passwords do not match.";
    }
    else{
	    $sql = "INSERT INTO users (first_name, last_name, email, date_of_birth, employee_type, username, password) 
        VALUES ('$firstName', '$lastName', '$email', '$dateOfBirth', '$employeeType', '$username', '$password')";
	    if(mysqli_query($connect, $sql) === true) {
        $valid['success'] = true;
        $valid['messages'] = "Success.";	
      }
  }
  $connect->close();
	echo json_encode($valid);

}

	