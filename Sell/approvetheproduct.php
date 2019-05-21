	<?php 
	include '../db.php';

	$getId = $_GET['id'];	
	$query=$mysqli->query("SELECT Sellers_ID FROM products WHERE Product_ID='$getId'");
	$result=$query->fetch_assoc();
	$userid= $result['Sellers_ID'];
	$query1=$mysqli->query("SELECT Product_Quantity FROM ProductDetails WHERE Product_ID='$getId'");
	$result1=$query1->fetch_assoc();
	$quantity=$result1['Product_Quantity'];
	if ($quantity>=1)
	{
	
	$mysqli->query("UPDATE products SET Approved='YES' WHERE Product_ID='$getId'") or die('Failed!');
	header("location:../index/main.php");
}

	
?>