<?php 
include '../db.php';
$count=1;

 ?>
 <!DOCTYPE html>
 <html>
 <head>
 <style>
body{ background-color: #d3d3d3; margin-top: 20px;}
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

 	<title>Shipper Request</title>
 </head>

 <body>
 <table>
 <tr>
 	<th>S.NO</th>
 	<th>FirstName</th>
 	<th>LastName</th>
 	<th>Address</th>
 	<th>ContactNo</th>
 	<th>Email-ID</th>
 	<th>Vehicle</th>
 	<th>Approve</th>
 	<th>Reject</th>
 </tr>
 <?php
 $shipper="SELECT * FROM shipperinfo WHERE active='0'";
 $shipper1=$mysqli->query($shipper);
 while ($shipper2=$shipper1->fetch_assoc())
  {
  	?>
 	<tr>
 		<td><?php echo $count; ?></td>
 		<td><?php echo $shipper2['FirstName']; ?></td>
 		<td><?php echo $shipper2['LastName']; ?></td>
 		<td><?php echo $shipper2['Address']; ?></td>
 		<td><?php echo $shipper2['ContactNo']; ?></td>
 		<td><?php echo $shipper2['Email']; ?></td>
 		<td><?php echo @$shipper2['VehicleType']; ?></td>
 		<td><a href="approve.php?id=<?php echo $shipper2['ShipperID']; ?>" style="text-decoration: none;">Approve</a></td>
 		<td><a href="reject.phpid=<?php echo $shipper2['ShipperID']; ?>" style="color: red; text-decoration: none;">Reject</a></td>
 	</tr>
 	<?php
 	$count++;
 }
 ?>
 </table>
 
 </body>
 </html>