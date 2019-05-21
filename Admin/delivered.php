<?php
session_start();
require '../db.php';
$getorderid=@$_GET['oid'];
echo $getorderid;
echo "sd";
$delivered="UPDATE orders SET Deliverd='YES' WHERE OrderNo='$getorderid'";
$mysqli->query($delivered);
header('Location:adminpanel.php');





?>
