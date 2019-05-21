<?php
session_start();
include '../db.php';
$uId = $_SESSION['userId'];
	$uName = $_SESSION['first_name'];

$files = $_FILES['file'];

$filename = $_FILES['file']['name'];
$filetmpname = $_FILES['file']['tmp_name'];
$filesize = $_FILES['file']['size'];
$fileerror = $_FILES['file']['error'];
$filetype = $_FILES['file']['type'];

$fileExt = explode('.',$filename);
$fileActualext = strtolower(end($fileExt));
$choose     =$_POST['choose'];
$fileNamenew= uniqid('',true).".".$fileActualext;

if($choose=='Men')
{
$fileDestination = '../Sell/mc/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
//header("Location: sell.php?uploadsuccess");
}
elseif($choose=='Women') {
	$fileDestination = '../Sell/wc/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
}
elseif($choose=='MobileAndTablets') {
	$fileDestination = '../Sell/mnt/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
}
elseif($choose=='JewelleryAndWatches') {
	$fileDestination = '../Sell/j/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
}
elseif($choose=='TvAppliancesCameras') {
	$fileDestination = '../Sell/tv/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
}
else{
	$fileDestination = '../Sell/c/'.$fileNamenew;
move_uploaded_file($filetmpname, $fileDestination);
}



$ProductName=$_POST['name'];
$description=@$_POST['description'];
$price      =$_POST['Price'];
$quantity=$_POST['Quantity'];

if ($quantity < '1')
{
	echo '<script>alert("Quantity must be greater or equal to 1")</script>';
}
else 
{



$mysqli->query("INSERT INTO ProductDetails (Product_Name, Product_Price, Product_Category, Product_Description, Product_Quantity) VALUES ('$ProductName', '$price', '$choose', '$description', '$quantity')");
$productid=mysqli_insert_id($mysqli);
$mysqli->query("INSERT INTO products (Product_ID, Sellers_ID, image) VALUES ('$productid', '$uId', '$fileDestination')");
		header('Location:../index/main.php');

}


		

?>
<!DOCTYPE html>
<html>
<head>
	<title>asdas</title>
</head>
<body>

</body>
</html>