<?php
session_start();
   date_default_timezone_set("Asia/Kathmandu");
   include '../db.php';
   include 'comments.inc.php';
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylecommentsection.css">
</head>
<body>
<?php
$id=$_POST['id'];
$uid=$_POST['uid'];
$date=$_POST['date'];
$message=$_POST['message'];

echo
   "<form method='POST' action='".editComments($mysqli)."'>
    <input type='hidden' name='id' value='".$id."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
   	<textarea name='message'>".$message."</textarea><br>
   	<button type='submit' name='editSubmit'>Done</button>
    </form>";

?>
</body>
</html>