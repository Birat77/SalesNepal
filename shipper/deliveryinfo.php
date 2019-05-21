<?php 
session_start();
@$oid=$_GET['oid'];

$sid=$_SESSION['ShipperIds'];


include '../db.php'

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Details</title>
 </head>
 <body>
 <?php
  @$sdate=$_POST['sdate'];
 @$ptime=$_POST['ptime'];
 @$dtime=$_POST['dtime'];

 $query=$mysqli->query("SELECT * FROM shippingvehicle WHERE ShipperID='$sid'");
 $query1=$query->fetch_assoc();
 $vid=$query1['VehicleID'];
 
 if (isset($_POST['submit']))

{
	@$oids=$_GET['oids'];
	$insert="INSERT INTO shippingdetails (OrderNo, ShipperID, ShippingDate, PickupTime, DeliveryTime, VehicleID) VALUES ('$oids','$sid','$sdate','$ptime','$dtime','$vid')";
	
 	//var_dump($insert);
 $mysqli->query($insert);

 $update1="UPDATE orders set Deliverd='YES' WHERE OrderNo='$oids'";
 $update2="UPDATE shipperinfo set RemainingTasks=RemainingTasks-1 WHERE ShipperID='$sid'";
 $mysqli->query($update1);
  $mysqli->query($update2);

 //header('location:profiles.php');
}
?>
 <form action="deliveryinfo.php?oids=<?php echo $oid; ?>" method="POST">
 Shipping Date: <input type="Date" placeholder="Date of shipping" name="sdate">
 Pickup Time : <input type="Time" placeholder="Pickup Time" name="ptime">
 Delivery Time: <input type="Time" placeholder="Delivery Time" name="dtime">
 <input type="submit" name="submit">
 <?php

 
 ?>
 </form>
 
 </body>
 </html>