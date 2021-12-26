var manageViewSuppPayments;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageBrandTable = $("#manageViewSuppPayments").DataTable({
		'ajax': 'php_action/fetchSP_packaging.php',
		'order': []		
	});
	});