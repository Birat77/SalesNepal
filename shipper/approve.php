
<?php 

include '../db.php';
@$id=$_GET['id'];

$type="SELECT VehicleType FROM shipperinfo WHERE ShipperID='$id'";
$type1=$mysqli->query($type);
$type2=$type1->fetch_assoc();
$vtype=$type2['VehicleType'];

if (isset($_POST['assign']))
{
	$ids=$_GET['ids'];
	$vtype=$_GET['vtype'];
	
	$type="SELECT VehicleType FROM shipperinfo WHERE ShipperID='$ids'";
$type1=$mysqli->query($type);
$type2=$type1->fetch_assoc();
$vtype=$type2['VehicleType'];
@$vname=$_POST['vname'];
 @$vnumber=$_POST['vnumber'];
 



	$active="UPDATE shipperinfo SET active='1' WHERE ShipperID='$ids'";
	$vehicle="INSERT INTO shippingvehicle(VechileName, VehicleType, VehicleNumber, ShipperID) VALUES ('$vname', '$vtype', '$vnumber', '$ids')";

$mysqli->query($active);
$mysqli->query($vehicle);
header('location:../index/main.php');

}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
<style>

 input {
    padding: 12px 20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    width:400px;

  }

  </style>
 	<title>Assign Vehicle</title>
 </head>
 <body>

 <form action="approve.php?ids=<?php echo $id; ?>&vtype=<?php echo $vtype; ?>" method="POST"><br>
 	Vehicle Name:<br><input type="text" name="vname" style="margin-left: 4px;"><br><br>
 	Vehicle Number:<br><input type="text" name="vnumber"><br> <br>
 	<input type="submit" value="ASSIGN" name="assign" style="background-color: #d9853b; color: white; font-size: 20px;">

 </form>
 <?php
 
 ?>
 
 </body>
 </html>