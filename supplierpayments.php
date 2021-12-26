<?php require_once 'includes/header.php'; ?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">  
		  <li class="active">Supplier Payments</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> View Supplier Payments</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
				
				<table class="table" id="manageViewSuppPayments">
					<thead>
						<tr>							
							<th>ID</th>
							<th>Order Date</th>
							<th>Supplier Name</th>
							<th>Total Cost</th>
							<th>Packaging</th>
							<th>Shipping</th>
							<th>Approval</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->  	        


<script src="custom/js/viewSuppPayments.js"></script>

<?php require_once 'includes/footer.php'; ?>