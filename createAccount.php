<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();
include 'php_action/createEmployeeAccount.php';

?>

<div class="row">
	<div class="col-md-12">
		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Employee Sign Up</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-wrench"></i> Employee Sign Up</div>
			</div> <!-- /panel-heading -->

			<div class="panel-body">

				<form action="" method="post" class="form-horizontal" id="signUpForm">
					<fieldset>
						<legend>Employee Biodata</legend>
						<div class="changeUsenrameMessages">
							<?php
								if (isset($_SESSION['status'])){
									?><div class="changeUsenrameMessages"  style="background: rgb(102,192,244);
										background: linear-gradient(90deg, rgba(102,192,244,1) 0%, rgba(42,71,94,1) 80%, rgba(27,40,56,1) 100%); color: black;"><h4 style="padding: 10px; "><?php
									echo $_SESSION['status'];
									unset($_SESSION['status']);
								}
							?>
							</h4>
						</div>

                      <div class="form-group">
					    <label for="firstName" class="col-sm-2 control-label">First Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" required>
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="lastName" class="col-sm-2 control-label">Last Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" required>
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="email" class="form-control" id="email" name="email" placeholder="email@email.com" required>
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Date of Birth</label>
					    <div class="col-sm-10">
					      <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" placeholder="Date of birth" required>
					    </div>
					  </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label" required>Employee Type</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="employeeType" id="employeeType">
                            <option value="">Select Employee Type</option>
                            <option value="1">ADMINISTRATIVE</option>
                            <option value="2">INVENTORY</option>
                            <option value="3">SALES</option>
                            <option value="4">LOGISTICS</option>
							<option value="5">ACCOUNTING</option>
                        </select>
                        </div>
                    </div>

					  

                      <legend>Create Employee Account Credentials</legend>
                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required>
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
					    </div>
					  </div>
                
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary" id = "register" name="register"> <i class="glyphicon glyphicon-ok-sign"></i> Create Account </button>
						  <a class="btn btn-primary" href="setting.php">Back </a>
					      
					    </div>
					  
					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->

<?php require_once 'includes/footer.php'; ?>