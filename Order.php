<!DOCTYPE html>
<html>
<head>
  <title>Success! | ORBIT Store</title>
  <link rel="stylesheet" type="text/css" href="format.css"/>
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:300" rel="stylesheet">
  <style type="text/css">
      #transactiondiv{
        width: 500px;
        color: #c7d5e0;
        margin-left: 410px;
        background-color: rgba(27, 40, 56,0.5);
        text-align: left;
        border-radius: 8px;
        padding: 15px;
    }
  </style>
</head>
<body>

<?php 
include('SampleCrud/dbconnector.php');
session_start();
$currentuser = $_SESSION['username'];

$sqlOrderID = "SELECT * FROM gameorder WHERE Username ='$currentuser'";
$r_sqlOrderID = $dbcon->query($sqlOrderID);
          if (!empty($r_sqlOrderID) && $r_sqlOrderID->num_rows > 0) {//some mumbo jumbo
  while ($row_sqlOrderID = $r_sqlOrderID -> fetch_assoc()) {
    $OrderID = $row_sqlOrderID['OrderID'];
    $UserID = $row_sqlOrderID['UserID'];
    $DateOrdered = $row_sqlOrderID['DateOrdered'];
    $TotalPurchase = $row_sqlOrderID['Total'];
}
if(!empty($_SESSION['cart'])){
  $whereIn = implode(',', $_SESSION['cart']);//we separate the IDs in the array
    $arrLen = strlen($whereIn);
  }

 ?>
 <h1 style="color: white; text-align: center;margin-top: 120px;">PURCHASE SUCCESSFUL!</h1>
 <div class="designedtext" id="transactiondiv">
  The transaction was successful. You used your magic money.<br><br>
  <?php echo "TRANSACTION INFORMATION: "."<br>"." Transaction ID: $OrderID "."<br>"." User ID: $UserID"."<br>"." Username: $currentuser"."<br>"."Date Purchased: $DateOrdered "."<br>"."Total: Php $TotalPurchase";?><br><br>
      <?php
          $sql = "SELECT * from game WHERE gameID IN ($whereIn)";//we select all records from the game table where its values are in the numbers that are in the array
          $arrRes = array();//we create an array to store table values
          $r_sql = $dbcon->query($sql);
          //if (!empty($r_sql) && $r_sql->num_rows > 0) {//if the array is not empty and the rows are more than zero
            while ($row = mysqli_fetch_assoc($r_sql)){//while sql can still fetch a record in the database, it pushes it to the array
              $arrRes[] = $row;
            }
            echo "<hr>";
            echo "<br>Purchased games: <br><br>";
            for ($i=0; $i <sizeof($arrRes); $i++) {
              $ii = $i+1;
            echo "$ii. ".$arrRes[$i]['gametitle']." (Php ".$arrRes[$i]['price'].")"."<br>";
           }
           ?> 
      </div>
      <div style="margin-left: 730px; margin-top: 20px;">
      <form method="POST"> 
        <button type="submit" class="button1" name="backtohome">Back to Homepage</button>
      </form> 
    </div>
      <?php
            for ($i=0; $i <sizeof($arrRes); $i++) {
             $spGameID = $arrRes[$i]['gameID'];
             $spGameTitle = $arrRes[$i]['gametitle'];
             $spPrice = $arrRes[$i]['price'];
            $sqlSpecOrder = "INSERT INTO specific_order (OrderID, gameID, gametitle, gameprice, qty, datepurchased) 
            VALUES (
            '$OrderID', 
            '$spGameID',
            '$spGameTitle',
             '$spPrice',
             '1',
              NOW())" or die("POOTIS");
        mysqli_query($dbcon,$sqlSpecOrder);
}
}
if (isset($_POST['backtohome'])) {
  header('location: home.php');
   //place this commented code elsewhere where we can empty the cart after getting all the necessary info from it
  $_SESSION['cart'] = array();
  
}
 ?>
</body>
</html>
