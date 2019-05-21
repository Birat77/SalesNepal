<?php 
include '../db.php';
$pid=@$_GET['id'];
$name=@$_POST['Name'];
$description=@$_POST['Description'];
$quantity=@$_POST['Quantity'];
$price=@$_POST['Price'];
if (isset($_POST['Apply']))
{
	$pid=$_GET['id'];
	$update=$mysqli->query("UPDATE productdetails SET Product_Name='$name', Product_Price='$price', Product_Description='$description', Product_Quantity='$quantity' WHERE Product_ID='$pid'");
	//$mysqli->query($update);
	$date=date('y-m-d');
	$time=date('h-i-s');

	
	$store=$mysqli->query("INSERT INTO updatehistory (ProductID, UpdatedName, UpdatedDescription, UpdatedQuantity, UpdatedPrice, DateOfUpdate, TimeOfUpdate) VALUES ('$pid','$name','$description','$quantity','$price','$date','$time')");
	//$mysqli->query($update);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Products</title>
</head>
<body>
<form action="edit.php?id=<?php echo $pid;?>" method="POST">
Name:<input type="text" name="Name" placeholder="Product Name"><br>
Description:<input type="text" name="Description" placeholder="Product Description"><br>
Quantity:<input type="number" name="Quantity" placeholder="Product Quantity"><br>
Price: <input type="number" name="Price" placeholder="Product Price"><br>

<input type="submit" name="Apply" value="Apply"><br>

	
</form>
<a href="delete.php?id=<?php echo $pid;?>"> <button><h3>Delete this Product</h3></button></a>

</body>
</html>