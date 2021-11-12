<?php include('server.php');
if (!isset($_SESSION['AdminName'])) {//if there is no session, go to log in page instead of the home page
	header('location: log-in.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="format.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
	<title>Home | ORBIT Store</title>
	<style type="text/css">
		#slider{
  overflow: hidden;
}
#slider figure{
margin-top: 60px;
  position: relative;
  width: 300%;
  margin-left: 0;
  left: 0;
  animation: 50s slider infinite;
}
#slider figure img{
  width: 20%;
  float: left;
}
@keyframes slider{
	0%{
		left: 0;
	}
	25%{
		left: -40%;
	}
	50%{
		left: -100%;
	}
	75%{
		left: -160%;
	}100%{
		left: 0%;
	}
}

	</style>
</head>
<body>

	<div> <!-- div for the nav bar -->
		<ul class="navbar">
			<li style="color: #66c0f4; margin-left: 100px;margin-right: 100px"><h1>XYT Co.</h1>
			<h3 style="color: #66c0f4";>Admin <?php echo $_SESSION['AdminName'];?></h3>
			<li><a href="">Home</a></li>
  			<li><a href="">Store</a></li>
  			<li><a href="">Library</a></li>
  			<li style="float:right"><a href="log-in.php">Logout</a></li>
  			<li><a href="SampleCrud/viewGames.php">Admin Controls</a></li>
		</ul>
	</div>

		<div id ="slider">
			<figure>
				<img src="https://www.harley-davidson.com/content/dam/h-d/images/product-images/parts/panamerica-2021/68000341/68000341_TT.jpg?impolicy=myresize&rw=700" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/rubber-tire-and-wheels-at-garage-business-shop-picture-id1284776529?b=1&k=20&m=1284776529&s=170667a&w=0&h=eyDqgEtqsjRbmlLqJvrcydswvCxdKO94MvlUARID-Ts=" width="300" height="500">
				<img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8ZnVybml0dXJlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/tool-belt-with-tools-picture-id486580144?b=1&k=20&m=486580144&s=170667a&w=0&h=w6ri5RQwjhT_QhzfU2GJAJe3xuooDy3WL_V0WxmjcMw=" width="300" height="500">
				<img src="https://media.istockphoto.com/photos/household-appliances-and-kitchen-electronics-in-cardboard-boxes-in-picture-id1278547508?b=1&k=20&m=1278547508&s=170667a&w=0&h=1xtg76iU0cIMtWBEGC_sMf2XcepkY5rYpF6j9np_nNA=" width="300" height="500">
			</figure>
		</div>

	</div>
</body>
</html>
