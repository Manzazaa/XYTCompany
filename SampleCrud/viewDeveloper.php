<?php include('dbconnector.php');//let's include the db connection php file
include('../server.php'); ?>

<!DOCTYPE html>
<html>
<head>
	<title>View Records | Orbit Store</title>
	<link rel="stylesheet" type="text/css" href="stylexs.css"/>
	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
</head>
<body>

	<div>
		 <ul>
		 	<li style="color: #66c0f4; margin-left: 50px;margin-right: 50px"><h2>ORBIT Store | Administrator</h2>
        <li>
            <a href="#">ADD RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="addGame.php">Product</a></li>
            </ul>
        </li>
        <li>
            <a href="#">VIEW RECORD &#9662;</a>
            <ul class="dropdown">
                <li><a href="viewGames.php">Product</a></li>
                <li><a href="viewDeveloper.php">Suppliers</a></li>
                <li><a href="viewUsers.php">Users</a></li>
                 <li><a href="viewSpecTransaction.php">Specific Transactions</a></li>
                  <li><a href="viewTransactions.php">All Transactions</a></li>

            </ul>
        </li>
        <li><a href="../home.php">Home</a></li>

        <li style="float:right">
			<a href="../home.php?logout='1'">Logout</a></li>
    </ul>
			</div>
<div id="invtitle">
			<h2 style="color:#c7d5e0 "> Supplier</h2>
		</div>

<div class="designedtext">
	<table style="margin-left: 175px; color: white;">
		<thead>
			<tr>
				<th>Supplier Name</th>
				<th>Country</th>
			</tr>
		</thead>
		<?php
			$sql = "SELECT * from supplier";
			$result = $dbcon->query($sql);
			if ($result->num_rows>0){
				while ($row = $result -> fetch_assoc()) {
		?>
		<tbody>
			<tr>
				<td><?php echo $row['Supplier']; ?></td>
				<td><?php echo $row['Address']; ?></td>
			</tr>
		</tbody>
	<?php }}?>
	</table>
</div>
</body>
</html>

