<?php
session_start();
require '../db.php';
if (isset($_POST['shipper']))
{

	require '../shipper/assignshipper.php';
}

$retrieve="SELECT * FROM orders where Deliverd='NO'";
$retrieve1=$mysqli->query($retrieve);

while ($retrieve2=$retrieve1->fetch_assoc()) {
	$userid=$retrieve2['UserID'];
	echo '<br>';
	echo 'UserID:' . $retrieve2['UserID'];
	echo '<br>';
	echo 'Date of Order:' . $retrieve2['OrderDate'];
	$userinfo="SELECT * FROM users NATURAL JOIN address WHERE UserID='$userid'";
	@$userinfo1=$mysqli->query($userinfo);
	@$userinfo2=$userinfo1->fetch_assoc();
	echo $userinfo2['FirstName']; echo ' '; echo $userinfo2['LastName'];
	echo '<br>';
	echo $userinfo2['City'];
	echo '<br>';
	
	?>
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
	<a href="delivered.php?oid=<?php echo $retrieve2['OrderNo']?> "> <button>DELIVERED</button></a>
	
	
	<?php 
	$sname="SELECT ShipperID, FirstName, LastName, RemainingTasks FROM shipperinfo ORDER BY RemainingTasks ";
	$sname1=$mysqli->query($sname);
	$sname2=$sname1->fetch_assoc();


	
	$orderno1=$retrieve2['OrderNo'];
	$sname2=$mysqli->query("SELECT ShipperID FROM orders WHERE OrderNo='$orderno1'");
	$sname22=$sname2->fetch_assoc();
	$assigned=$sname22['ShipperID'];

	$query=$mysqli->query("SELECT FirstName, LastName FROM shipperinfo WHERE ShipperID='$assigned'");
	$query1=$query->fetch_assoc();
	$assignedfirst=$query1['FirstName'];
	$assignedlast=$query1['LastName'];
	

	if ($assigned==NULL)
	{

	?>
	<h3>Assign shipper</h3>
	<form action="listoforders.php" method="POST">
	<SELECT name="shipper">
	<?php
	$sname="SELECT ShipperID, FirstName, LastName, RemainingTasks FROM shipperinfo ORDER BY RemainingTasks ";
	$sname1=$mysqli->query($sname);
	while ($sname2=$sname1->fetch_assoc())
	{
		?>
			<?php $firstname=$sname2['FirstName']	;
			$lastname=$sname2['LastName']	;
			$sid=$sname2['ShipperID'];
			?>
			<?php
			echo "<option value='$sid'> $firstname $lastname</option>";		
	}
	?>
	</SELECT>
	
	
	
<?php
	$shipper1=@$_POST['shipper'];
	$orderno=$retrieve2['OrderNo'];
	
	echo $shipper1;
	?>
	
<input type="submit" name="shipp" value="Assign1"/>
	</form>

	
	<?php
	$shipper1=@$_POST['shipper'];
	$orderno=$retrieve2['OrderNo'];
	$_SESSION['orderno']=$orderno;


	echo '<br>';
	echo '<br>';

	
	echo '<br>';

	

}
else
{
	echo"Assigned Shipper ID:". $assigned . "    Name:   " . $assignedfirst . "  " . $assignedlast ;
}
echo '<br>';
	echo '<br>';

	
	echo '<br>';
}


?>
