<?php 
session_start();
include '../db.php';
$pid=$_GET['id'];
$userid=$_SESSION['userId'];

if (isset($_POST['Rate']))
{
	$rate=$_POST['rate'];
	
$mysqli->query("INSERT INTO rating VALUES ('$userid','$pid','$rate')");
header('location:../index/main.php');
	

}
?>
