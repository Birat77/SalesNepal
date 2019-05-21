<?php
session_start();
$firstname=@$_SESSION['role'];
echo $firstname;
//session_start();
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>sad</title>
</head>
<body>


	<h4> <?php echo @$_SESSION['first_name'] ?> </h4>
	<h4> <?php echo @$_SESSION['last_name'] ?> </h4>
	<h4> <?php echo @$_SESSION['role'] ?> </h4>


</body>
</html>