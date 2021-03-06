<?php require_once 'php_action/core.php'; ?>

<!DOCTYPE html>
<html>
<head>

	<title>XYT Company Admin</title>

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->  
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #c7d5e0">


	<nav class="navbar navbar-static-top" style="background-color: #2a475e">
		<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">      

      <ul class="nav navbar-nav navbar-right">        

			<?php	switch ($_SESSION['empType']){
					case 0:
						?>
          <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>        
        
          <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-transfer"></i>  Suppliers</a></li>        
    
          <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        

          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Products <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
                 <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> View Products </a></li>
                 <li id="navProduct"><a href="packaging.php"> <i class="glyphicon glyphicon-ok"></i> Packaging Status </a></li>
                 <li id="navProduct"><a href="shipping.php"> <i class="glyphicon glyphicon-ok"></i> Shipping Status </a></li>
                 <li id="navProduct"><a href="seo.php"> <i class="glyphicon glyphicon-ok"></i> Approve Orders </a></li>
                 </ul>
              </li> 
    
          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
               <li id="topNavAddOrder"><a href="supplyorder.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Supplies</a></li>            
                <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>             
                <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
              </ul>
          </li> 
    
            <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Reports <span class="caret"></span></a>
              <ul class="dropdown-menu">            
                <li id="topNavAddOrder"><a href="report.php?o=add"> <i class="glyphicon glyphicon-stats"></i> Sales Report</a></li>            
                <li id="topNavManageOrder"><a href="productreport.php?o=manord"> <i class="glyphicon glyphicon-stats"></i> Inventory Report</a></li>
                <li id="topNavManageOrder"><a href="analytics.php"> <i class="glyphicon glyphicon-stats"></i> Analytics</a></li>    
                <li id="topNavManageOrder"><a href="supplierpayments.php?o=manord"> <i class=" glyphicon glyphicon-list-alt"></i> View Supplier Payments</a></li>            
              </ul>
          </li> 
    
            <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">            
                <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Settings</a></li>            
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
            </li>        
                   
          </ul><?php
						break;
					case 1:?>

        <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>        
        
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-transfer"></i>  Suppliers</a></li>        

        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        

        <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Products <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
                 <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> View Products </a></li>
                 <li id="navProduct"><a href="packaging.php"> <i class="glyphicon glyphicon-ok"></i> Packaging Status </a></li>
                 <li id="navProduct"><a href="shipping.php"> <i class="glyphicon glyphicon-ok"></i> Shipping Status </a></li>
                 <li id="navProduct"><a href="seo.php"> <i class="glyphicon glyphicon-ok"></i> Approve Orders </a>
                 </ul>
              </li> 

        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <li id="topNavAddOrder"><a href="supplyorder.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Supplies</a></li>              
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 

        <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Reports <span class="caret"></span></a>
              <ul class="dropdown-menu">            
                <li id="topNavAddOrder"><a href="report.php?o=add"> <i class="glyphicon glyphicon-stats"></i> Sales Report</a></li>            
                <li id="topNavManageOrder"><a href="productreport.php?o=manord"> <i class="glyphicon glyphicon-stats"></i> Inventory Report</a></li>
                <li id="topNavManageOrder"><a href="analytics.php"> <i class="glyphicon glyphicon-stats"></i> Analytics</a></li>    
                <li id="topNavManageOrder"><a href="supplierpayments.php?o=manord"> <i class=" glyphicon glyphicon-list-alt"></i> View Supplier Payments</a></li>            
              </ul>
          </li>                     
        <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>      
               
      </ul>	<?php
						break;
					case 2:?>
        <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>
        <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-transfer"></i>  Suppliers</a></li>        

        <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category</a></li>        

         <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Products <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
                 <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> View Products </a></li>
                 <li id="navProduct"><a href="packaging.php"> <i class="glyphicon glyphicon-ok"></i> Packaging Status </a></li>
                 </ul>
              </li> 
            
        <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>  
               
      </ul>
      <?php
						break;
            //for sales
					case 3:?>
        <li id="navDashboard"><a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>  Dashboard</a></li>
        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
          <ul class="dropdown-menu">            
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>            
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>            
          </ul>
        </li> 

         <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Reports <span class="caret"></span></a>
              <ul class="dropdown-menu">            
                <li id="topNavAddOrder"><a href="report.php?o=add"> <i class="glyphicon glyphicon-stats"></i> Sales Report</a></li>
                <li id="topNavManageOrder"><a href="analytics.php"> <i class="glyphicon glyphicon-stats"></i> Analytics</a></li> 
              </ul>
        </li>  

        <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>     
               
      </ul>
			<?php
						break;
					case 4:?>

         <li id="navBrand"><a href="brand.php"><i class="glyphicon glyphicon-transfer"></i>  Suppliers</a></li>

         <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-ruble"></i> Products <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
                 <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> View Products </a></li>
                 <li id="navProduct"><a href="shipping.php"> <i class="glyphicon glyphicon-ok"></i> Shipping Status </a></li>
                 </ul>
              </li> 

        <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>        
               
      </ul>
      <?php
      	break;
        case 5:?>
          <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Reports <span class="caret"></span></a>
              <ul class="dropdown-menu">            
                <li id="topNavAddOrder"><a href="report.php?o=add"> <i class="glyphicon glyphicon-stats"></i> Sales Report</a></li>            
                <li id="topNavManageOrder"><a href="productreport.php?o=manord"> <i class="glyphicon glyphicon-stats"></i> Inventory Report</a></li>   
                <li id="topNavManageOrder"><a href="analytics.php"> <i class="glyphicon glyphicon-stats"></i> Analytics</a></li>    
                <li id="topNavManageOrder"><a href="supplierpayments.php?o=manord"> <i class=" glyphicon glyphicon-list-alt"></i> View Supplier Payments</a></li>        
              </ul>
          </li> 
            <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>

        <?php
        break;
        case 6:?>

     <li class="dropdown" id="navOrder">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
              <ul class="dropdown-menu"> 
               <li id="topNavAddOrder"><a href="supplyorder.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Supplies</a></li>                        
                 <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-edit"></i> Manage Products </a></li>              
              </ul>
          </li> 
           <li class="dropdown" id="navSetting">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
              <ul class="dropdown-menu">             
                <li id="topNavLogout"><a href="logout.php"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>            
              </ul>
        </li>

    <?php
				}
      
    ?>
      	
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">