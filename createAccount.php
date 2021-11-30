<?php require_once 'includes/header.php'; ?>

<?php 
$user_id = $_SESSION['userId'];
$sql = "SELECT * FROM users WHERE user_id = {$user_id}";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();
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

				<form action="php_action/changePassword.php" method="post" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Employee Biodata</legend>

						<div class="changePasswordMessages"></div>

						

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">First Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="password" placeholder="First Name">
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Last Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="password" placeholder="Last Name">
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="password" placeholder="Last Name">
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Date of Birth</label>
					    <div class="col-sm-10">
					      <input type="date" class="form-control" id="username" name="password" placeholder="Username">
					    </div>
					  </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Employee Type</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="paymentStatus" id="paymentStatus">
                            <option value="">Select Employee Type</option>
                            <option value="0">0 (SUPER ADMINISTRATIVE)</option>
                            <option value="1">1 (ADMINISTRATIVE)</option>
                            <option value="2">2 (INVENTORY)</option>
                            <option value="3">3 (SALES)</option>
                            <option value="4">4 (LOGISTICS)</option>
                        </select>
                        </div>
                    </div>

					  

                      <legend>Create Employee Account Credentials</legend>
                      <div class="form-group">
					    <label for="password" class="col-sm-2 control-label">Username</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="username" name="password" placeholder="Username" autocomplete="off">
					    </div>
					  </div>

                      <div class="form-group">
					    <label for="npassword" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
					    <div class="col-sm-10">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>
                
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $result['user_id'] ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-ok-sign"></i> Create Account </button>
					      
					    </div>
					  
					</fieldset>
				</form>

			</div> <!-- /panel-body -->		

		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->	
</div> <!-- /row-->


<script src="custom/js/setting.js"></script>
<?php require_once 'includes/footer.php'; ?>