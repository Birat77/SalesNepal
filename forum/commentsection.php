<?php
   date_default_timezone_set("Asia/Kathmandu");
   include 'db.php';
   include 'comments.inc.php';
   session_start();
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylecommentsection.css">
</head>
<body>
<?php
echo"
    <form method='POST' action='".userLogin($conn)."'>
    Username:<input type='text' name='uid'><br><br>
    Password:<input type='password' name='password'><br><br>
    <button type='submit' name='loginSubmit'>Submit</button>
    </form>";

echo"
    <form method='POST' action='".userLogout()."'>
    <button type='submit' name='logoutSubmit'>Logout</button>
    </form><br><br>";

    if (isset($_SESSION['id'])) {
      echo"You are logged in!!";
      echo"<form method='POST' action='".setComments($conn)."'>
           <input type='hidden' name='uid' value='".$_SESSION['id']."'>
           <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
           <textarea name='message'></textarea><br>
           <button type='submit' name='commentSubmit'>Comment</button>
           </form>";
    }else{
      echo"You need to logged in to comment!";
    }

getComments($conn);

?>
</body>
</html>