<?php
session_start();

include 'db.php';
@$getid=$_GET['id'];
//echo $getid;
$count='1';
?>

<!DOCTYPE html>
<html>
<head>
<style>
body{ background-color: #d3d3d3; }
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #558c89;
    color: white;
}
</style>

	<title>Soldproducts</title>
</head>
<body>
<div>
<table>

	<tr>
	<th>S.No</th>
	<th>Product ID</th>
	<th>Product Name</th>
	<th>Product Price</th>
	<th>Product Quantity</th>
	<th>Bought By</th>
	<th>Buyer's Email-ID</th>
	</tr>
	<?php
	$delivered="SELECT * FROM orders WHERE Deliverd='YES'";
	$delivered1=$mysqli->query($delivered);

	
	while ($delivered2=$delivered1->fetch_assoc()) {
		//echo 'UserID:' . $delivered2['UserID'];
		$uid=$delivered2['UserID'];
		$name="SELECT * FROM users WHERE UserID=$uid";
		$name1=$mysqli->query($name);
		$name2=$name1->fetch_assoc();
		$first=$name2['FirstName'];
		$last=$name2['LastName'];
		$email=$name2['Email'];
	echo '<br>';
	$unserialized=unserialize($delivered2['ProductsDetails']);
	?>
	
	<?php
	foreach ($unserialized as $one)
	 {
	 	$userid=$_SESSION['userId'];
	 	$pid=$one['Product_Id'];
	 	$que="SELECT * FROM products WHERE Product_ID='$pid' AND Sellers_ID='$userid'";
		$que1=$mysqli->query($que);
		$que2=$que1->fetch_assoc();
		if ($que1->num_rows==1)
		{
			?>
	 	<tr>
	 	<td><?php echo $count ?></td>
	 	<td> <?php echo $one['Product_Id']; ?></td>
	 	<td> <?php echo $one['Product_Name']; ?></td>
	 	<td> <?php echo $one['Product_Price']; ?></td>
	 	<td> <?php echo $one['Product_Quantity']; ?></td>
	 	<td> <?php echo $first; echo ' '; echo $last; ?></td>
	 	<td> <?php echo $email?></td>
	 	</tr>
	 	<?php
	 	/*
	 	echo 'Product ID:'. $one['Product_Id'];
	 	echo '<br>';
	 	//$buyerid=$one['Product_Id'];
	 	//$buyer="SELECT uId FROM forsubadminsell1 WHERE id=$buyerid";
	 	//$buyer1=$mysqli->query($buyer);
	 	//$buyer2=$buyer1->fetch_assoc();
	 	echo 'Bought BY:'. $delivered2['UserID'] .$first. $last . $email;
	 	echo '<br>';
	 	echo 'Product Name:' . $one['Product_Name'];
	 	echo '<br>';
	 	echo 'Product Price:' . $one['Product_Price'];
	 	echo '<br>';
	 	echo 'Product Quantity:' . $one['Product_Quantity'];
	 	echo '<br>';
	 	echo '<br>';
	 	*/


		$count++;
	}
	}

	}

	?>
	</table>
</div>

</body>
</html>