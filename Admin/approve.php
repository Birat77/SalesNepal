<?php 
session_start();
	include '../db.php';
	$getId = $_GET['id'];
	$SAR1="SELECT Type FROM subadminpanel WHERE UserID='$getId' and Approved='NO'";
$SAR2=$mysqli->query($SAR1);
$SARole=$SAR2->fetch_assoc();
$role=$SARole['Type'];

	
	$mysqli->query("UPDATE users SET Role='SUBADMIN' WHERE UserID='$getId'") or die('Failed!');
	$mysqli->query("UPDATE subadminpanel set Approved='YES' WHERE UserID='$getId'");
	/*
}
elseif ($SARole['Role']=='Electronic Devices')
{
	$mysqli->query("UPDATE accounts SET Role='SA_ElectonicDevices' WHERE UserID='$getId'") or die('Failed!');
}
elseif ($SARole['Role']=='Tablets and Computer')
{
	$mysqli->query("UPDATE accounts SET Role='SA_TabletsandComputer' WHERE UserID='$getId'") or die('Failed!');
}
elseif ($SARole['Role']=="Women Clothing")
{
	$mysqli->query("UPDATE accounts SET Role='SA_Women' WHERE UserID='$getId'") or die('Failed!');
}
elseif ($SARole['Role']=="Men Clothing")
{
	$mysqli->query("UPDATE accounts SET Role='SA_Men' WHERE UserID='$getId'") or die('Failed!');
}

else
{
	$mysqli->query("UPDATE accounts SET Role='SUBADMIN' WHERE UserID='$getId'") or die('Failed!');
}
*/
	header('location:../Login/profile.php');

?>