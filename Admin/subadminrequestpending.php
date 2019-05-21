<?php
include '../db.php';
session_start();
$sql="SELECT * FROM subadminpanel NATURAL JOIN users WHERE Approved='NO'";
$result=$mysqli->query($sql);

while ($rows=$result->fetch_assoc())
{

		$uId = $rows['UserID'];

		$query = $mysqli->query("SELECT Role FROM users WHERE UserID='$uId'");

		$role = $query->fetch_assoc();

		if(($role['Role'] != 'SUBADMIN') && ($role['Role'] != 'ADMIN')) {
			echo $rows['UserID'].' ';
			echo $rows['FirstName'].' ';
			echo $rows['LastName'].' ';
			echo $rows['Email'];
			echo '&nbsp;&nbsp;&nbsp;<a href="approve.php?id='. $rows['UserID'] .'">Approve</a><br>';
		} 
}


?>
<!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE>
	PENDING SUBADMIN
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
		
	</TITLE>
</HEAD>
<BODY>
	
</BODY>
</HTML>