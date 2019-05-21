<?php 
include '../db.php';

	$shipper1=@$_POST['shipper'];
	$orderno=@$_SESSION['orderno'];
	echo $shipper1;
	echo $orderno;
	$query="UPDATE orders SET ShipperID='$shipper1' WHERE OrderNO='$orderno' AND Deliverd='NO'";
	$query1="UPDATE shipperinfo SET RemainingTasks=RemainingTasks+1 WHERE ShipperID=$shipper1";
	$mysqli->query($query);
	$mysqli->query($query1);
	header('location:../Admin/adminpanel.php');
    
 ?>