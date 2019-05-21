<?php 
include '../db.php';

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Delivered orders</title>
 </head>
 <body>
 <form action="successfulorders.php" method="post">
 	<input type="date" name='date' placeholder="Enter date">
 	<input type="submit" name="search" value="Search">
 	<?php

 	if (isset($_POST['search']))
 	{
 		$date1=@$_POST['date'];
 	echo $date1;
 		$query=$mysqli->query("SELECT * FROM orders Where Deliverd='YES' and OrderDate='$date1'");
 		while ($query1=$query->fetch_assoc())
 		{
 			$unserialized=unserialize($query1['ProductsDetails']);
	foreach ($unserialized as $one)
	 {
	 	echo 'Product ID:'. $one['Product_Id'];
	 	echo '<br>';
	 	echo 'Product Name:' . $one['Product_Name'];
	 	echo '<br>';
	 	echo 'Product Price:' . $one['Product_Price'];
	 	echo '<br>';
	 	echo 'Product Quantity:' . $one['Product_Quantity'];
	 	echo '<br>';
	 	echo '<br>';


		
	}
 		}

 	}
 	?>
 </form>
 
 </body>
 </html>