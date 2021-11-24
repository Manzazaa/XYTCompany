  <?php include('server.php'); ?>

  <!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="format.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
    <title>Cart | ORBIT Store</title>
    <style type="text/css">
      table {
    border-collapse: collapse;
    width: 50%;
    margin: 200px;
    margin-bottom: 50px;
  }

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  .button2 {
    background-color:#779800;
    border: none;
    color: #afe38a;
    padding: 6px 25px;
    text-align: center;
    /*display: inline-block;*/
    font-size: 15px;
    transition-duration: 0.2s;
  }
  .button2:hover {
    background-color:#a2c902; /* Green */
    color: white;
  }
    </style>
  </head>
  <body>
    <div> <!-- div for the nav bar -->
      <ul class="navbar">
        <li style="color: #66c0f4; margin-left: 100px;margin-right: 190px"><h2>ORBIT Store</h2>
        <li><a href="home.php">Home</a></li>
          <li><a href="home.php">Store</a></li>
          <!-- <li><a href="userprofile.php"><?php echo $_SESSION['username'] ?></a></li> -->
          <li><a href="">Library</a></li>
          <li style="float:right"><a href="home.php?logout='1'">Logout</a></li>
          <li style="float:right"><a href="cart.php">Cart </a></li>
      </ul>
      </div>

  <?php
  include('SampleCrud/dbconnector.php');
  if(!empty($_SESSION['cart'])){
  $whereIn = implode(',', $_SESSION['cart']);//we separate the IDs in the array
  }
  ?>
  <div class="designedtext" style="margin-bottom: 30px;">
    <table style="color: white; margin-top: 70px;">
      <thead>
        <tr>
          <th>Your Cart</th>
          <th>Item</th>
          <th>Price (Php)</th>
          <th></th>
        </tr>
        </thead>
        <?php
          $sql = "SELECT * from products WHERE ProdID IN ($whereIn)";//we select all records from the game table where its values are in the numbers that are in the array
          $r_sql = $dbcon->query($sql);
          if (!empty($r_sql) && $r_sql->num_rows > 0) {//if the array is not empty and the rows are more than zero
          while ($row = $r_sql -> fetch_assoc()) {//while there is a row to be fetched?>
      <tbody>
        <tr>
          <td></td>
          <!-- <td><img src="<?php echo $row['img']?>"width=104 height=136></td>echo the image of the game -->
          <td><?php echo $row['ProdName']; ?></td>
          <td>Php <?php echo $row['Cost']; ?></td>
         
           <?php $total+= $row['Cost'];//this takes all the values in the price column in the cart and adds them up together?>
          <td><a href="removeFromCart.php?id=<?php echo $row['ProdID']; ?>"style="text-decoration: none;">Remove</a>
        
        </tr>
      </tbody>
  <?php }} ?>
  </table>
    <div style="color: white; margin-left: 600px;">
      <p style="margin-left: 100px;">Subtotal: 
        <?php 
        //if the array is not empty, we show this guy, else we do nothing
        if(!empty($_SESSION['cart'])){
        echo "Php ".$total;
      }else{
      	echo "Your cart is empty!";
      } 
        ?></p>
  
<?php
   // In this part, we get the username and the ID of the user using the cart!
  $cartuser =  $_SESSION['username'];//we get their username through the session
	$sqlUserID = "SELECT * from users WHERE username = '$cartuser' ";//we find the record that corresponds to the username
	$r_sqlUserID = $dbcon->query($sqlUserID);
          if (!empty($r_sqlUserID) && $r_sqlUserID->num_rows > 0) {//some mumbo jumbo
	while ($row_sqlUserID = $r_sqlUserID -> fetch_assoc()) {
			$cartuserID = $row_sqlUserID['UserID'];//we assign the UserID column in the query result to the cartuser variable
      //now that we have their username and their ID, we can now create a specific_order table where the records are their username, id and the games they purchased. Using that info, we can use it to store to the transaction table
    }}?><form method="POST" action="cart.php">
        <button class="button2" type="submit" name="checkout" style="margin-top: 20px; margin-left: 100px;">CHECKOUT</button>
    </form>
  </div>
  </div>
<?php
if (isset($_POST['checkout'])){
  $sqlOrder = "INSERT into gameorder(UserID, Username, DateOrdered, Total) VALUES ('$cartuserID', '$cartuser', NOW(), '$total')";

$r_sqlOrder = $dbcon->query($sqlOrder) or die ("Couldn't execute query.");

  if($r_sqlOrder){
  header('location: Order.php');
  }
}
?>
  </body>
  </html>