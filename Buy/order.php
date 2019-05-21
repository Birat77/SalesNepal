<?php 
session_start();
include '../db.php';
$count=$_SESSION['ShoppingCart'];
//$_SESSION['countdata']=$countdata;
$userid=@$_SESSION['userId'];
$scount=serialize($count);




?>

<!DOCTYPE html>
<html>
<head>
	<title>checkout</title>
</head>
<body>
<div>
<?php 
$date=date('y-m-d');


$btotal=$_SESSION['total'];
$atotal=$_SESSION['atotal'];


if (mysqli_query($mysqli,"INSERT INTO discount (TotalPrice, DiscountedPrice)VALUES ('$btotal','$atotal')"))

if ($mysqli->query("INSERT INTO orders (UserID,ProductsDetails, OrderDate, DeliveryDate, TotalPrice) VALUES ('$userid','$scount','$date', NOW()+INTERVAL 7 DAY,'$btotal')"))


?>
<h2>Your Order has been successfully placed</h2><br>
<h2>Click HOME button to continue shopping</h2>
<?php
$_SESSION['ShoppingCart']=null;
$_SESSION['count']=0;
?>
<button onclick='location.href="../index/main.php"'> HOME</button>
<?php

	$unserialized=unserialize($scount);
	if (is_array($unserialized)){
	foreach ($unserialized as $one)
	 {
	 	$id= $one['Product_Id'];
	 	$quantity=$one['Product_Quantity'];
	 	echo '<br>';
	 	echo 'Product Name:' . $one['Product_Name'];
	 	echo '<br>';
	 	echo 'Product Price:' . $one['Product_Price'];
	 	echo '<br>';
	 	echo 'Product Quantity:' . $one['Product_Quantity'];
	 	echo '<br>';
	 	echo '<br>';
	 	$mysqli->query("UPDATE ProductDetails SET Product_Quantity=Product_Quantity-$quantity Where Product_ID='$id' ");
	 	$update=$mysqli->query("SELECT Product_Quantity FROM ProductDetails WHERE Product_ID='$id'");
	 	$update1=$update->fetch_assoc();
	 	$quantity=$update1['Product_Quantity'];
	 	
	 	if ($quantity < 1)
	 	{
	 		
	 		$mysqli->query("DELETE FROM products Where Product_ID='$id'");

	 	}



		
	}
	}



?>

	
</div>



</body>
</html>

