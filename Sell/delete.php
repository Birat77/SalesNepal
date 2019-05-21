<?php 
include '../db.php';
$pid=$_GET['id'];

$mysqli->query("DELETE FROM products WHERE Product_ID='$pid'");
$mysqli->query("DELETE FROM ProductDetails WHERE Product_ID='$pid'");

header('location:myproducts.php');
 ?>