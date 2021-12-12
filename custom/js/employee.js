var manageEmployeeTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage employee table
	manageEmployeeTable = $("#manageEmployeeTable").DataTable({
		'ajax': 'php_action/fetchEmployee.php',
		'order': []		
	});

	// submit brand form function
	$("#submitBrandForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');			

		var brandName = $("#brandName").val();
		var brandStatus = $("#brandStatus").val();
		var supplierDetails = $("#supplierDetails").val();

		if(brandName == "") {
			$("#brandName").after('<p class="text-danger">Supplier Name field is required</p>');
			$('#brandName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#brandName").find('.text-danger').remove();
			// success out for form 
			$("#brandName").closest('.form-group').addClass('has-success');	  	
		}

		if(supplierDetails == "") {
			$("#supplierDetails").after('<p class="text-danger">Supplier Details field is required</p>');
			$('#supplierDetails').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#supplierDetails").find('.text-danger').remove();
			// success out for form 
			$("#supplierDetails").closest('.form-group').addClass('has-success');	  	
		}

		if(brandStatus == "") {
			$("#brandStatus").after('<p class="text-danger">Supplier Status field is required</p>');

			$('#brandStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#brandStatus").find('.text-danger').remove();
			// success out for form 
			$("#brandStatus").closest('.form-group').addClass('has-success');	  	
		}

		if(brandName && brandStatus && supplierDetails) {
			var form = $(this);
			// button loading
			$("#createBrandBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createBrandBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table 
						manageBrandTable.ajax.reload(null, false);						

  	  			// reset the form text
						$("#submitBrandForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');
  	  			
  	  			$('#add-brand-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if

				} // /success
			}); // /ajax	
		} // if

		return false;
	}); // /submit brand form function

});

function editBrands(brandId = null) {
	if(brandId) {
		// remove hidden brand id text
		$('#brandId').remove();

		// remove the error 
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editBrandFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedEmployee.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editBrandFooter').removeClass('div-hide');

				// setting the email value 
				$('#email').val(response.email);
				// setting the username value
				$('#username').val(response.username);
				// setting the password value
				$('#password').val(response.password);
				// setting the employee type value
				$('#employeeType').val(response.employee_type);
				// brand id 
				$(".editBrandFooter").after('<input type="hidden" name="brandId" id="brandId" value="'+response.user_id+'" />');

				// update brand form 
				$('#editBrandForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');			

					var email = $('#email').val();
					var username = $('#username').val();
					var password = $("#password").val();
					var employeeType = $("#employeeType").val();

					if(email == "") {
						$("#email").after('<p class="text-danger">Email field is required</p>');
						$('#email').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#email").find('.text-danger').remove();
						// success out for form 
						$("#email").closest('.form-group').addClass('has-success');	  	
					}

					if(username == "") {
						$("#username").after('<p class="text-danger">Username field is required</p>');
						$('#username').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#username").find('.text-danger').remove();
						// success out for form 
						$("#username").closest('.form-group').addClass('has-success');	  	
					}

					if(password == "") {
						$("#password").after('<p class="text-danger">Password field is required</p>');

						$('#password').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#password").find('.text-danger').remove();
						// success out for form 
						$("#password").closest('.form-group').addClass('has-success');	  	
					}

					if(employeeType == "") {
						$("#employeeType").after('<p class="text-danger">Employee type is required</p>');

						$('#employeeType').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#employeeType").find('.text-danger').remove();
						// success out for form 
						$("#employeeType").closest('.form-group').addClass('has-success');	  	
					}

					if(email && username && password && employeeType) {
						var form = $(this);

						// submit btn
						$('#editBrandBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editBrandBtn').button('reset');

									// reload the manage member table 
									manageEmployeeTable.ajax.reload(null, false);								  	  										
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-brand-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
									
							}// /success
						});	 // /ajax												
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removeBrands(brandId = null) {
	if(brandId) {
		$('#removeBrandId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedEmployee.php',
			type: 'post',
			data: {brandId : brandId},
			dataType: 'json',
			success:function(response) {
				$('.removeBrandFooter').after('<input type="hidden" name="removeBrandId" id="removeBrandId" value="'+response.user_id+'" /> ');

				// click on remove button to remove the brand
				$("#removeBrandBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeBrandBtn").button('loading');

					$.ajax({
						url: 'php_action/removeEmployee.php',
						type: 'post',
						data: {brandId : brandId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeBrandBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal 
								$('#removeMemberModal').modal('hide');

								// reload the brand table 
								manageEmployeeTable.ajax.reload(null, false);
								
								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeBrandFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function