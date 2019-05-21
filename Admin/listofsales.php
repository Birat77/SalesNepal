<?php
session_start();
require '../db.php';

$retrieve="SELECT * FROM orders where Deliverd='YES'";
$retrieve1=$mysqli->query($retrieve);

while ($retrieve2=$retrieve1->fetch_assoc()) {
	$userid=$retrieve2['UserID'];
	$orderno=$retrieve2['OrderNo'];
	$innerjoin=$mysqli->query("SELECT * FROM shipperinfo INNER JOIN shippingdetails ON shipperinfo.ShipperID=shippingdetails.ShipperID WHERE OrderNo='$orderno'");
	$innerjoin1=$innerjoin->fetch_assoc();

	

	echo 'UserID:' . $retrieve2['UserID'];
	echo '<br>';
	@$userinfo="SELECT FirstName, LastName, City FROM users NATURAL JOIN address WHERE UserID='$userid'";
	@$userinfo1=$mysqli->query($userinfo);
	@$userinfo2=$userinfo1->fetch_assoc();
	echo $userinfo2['FirstName']; echo ' '; echo $userinfo2['LastName'];
	echo '<br>';
	echo $userinfo2['City'];
	echo '<br>';
	//echo $userinfo2['ContactNo'];
	//echo '<br>';
	?>
	<h3>Delivery Information</h3>
	Delivered By:<?php echo $innerjoin1['FirstName']; echo $innerjoin1['LastName'];?><br> 
	Shipping Date:<?php echo $innerjoin1['ShippingDate']; ?><br>
	Pickup Time:<?php echo $innerjoin1['PickupTime']; ?><br>
	Delivery Time:<?php echo $innerjoin1['DeliveryTime']; ?><br>

<table border="2px">
	<tr>
	 	<th> Product ID</th>
	 	<th> Product Name</th>
	 	<th> Product Price</th>
	 	<th> Product Quantity</th>
	 	</tr>

<?php

	
	$unserialized=unserialize($retrieve2['ProductsDetails']);
	
	foreach ($unserialized as $one)
	 {
	 	/*
	 	echo 'Product ID:'. $one['Product_Id'];
	 	echo '<br>';
	 	echo 'Product Name:' . $one['Product_Name'];
	 	echo '<br>';
	 	echo 'Product Price:' . $one['Product_Price'];
	 	echo '<br>';
	 	echo 'Product Quantity:' . $one['Product_Quantity'];
	 	echo '<br>';
	 	echo '<br>';
	 	*/
	 	?>
	 	
	 	
	 	<tr>
	 		<td><?php echo $one['Product_Id'] ?></td>
	 		<td><?php echo $one['Product_Name'] ?></td>
	 		<td><?php echo $one['Product_Price'] ?></td>
	 		<td><?php echo $one['Product_Quantity'] ?></td>
	 	</tr>
	 	
	 	<?php



		
	}

	?>
	</table>
	
	<?php
	echo '<br>';
	echo '<br>';

	
	echo '<br>';

	

}



?>
