<?php
session_start();
$value_to_delete =$_GET['id'];
if (($key = array_search($value_to_delete, $_SESSION['cart'])) !== false)//looks for the specific value to delete and unsets it
    unset($_SESSION['cart'][$key]);
	header('location: cart.php');
?>