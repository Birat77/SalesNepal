<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>logout</title>
 
</head>

<body style="background-color:#ccfff5;">

    <div style="margin-top: 150px;margin-left: 30%;">
          <p style="font-size: 50px;text-shadow: 2px 2px blue;"><span style="color: orange;font-style: inherit; ">Thanks</span> for stopping by<span style="color: orange;">!</span>!</p>
              
          <p style="font-size: 20px;"><?= 'You have been logged out!'; ?></p>
          
          <a href="../index/main.php"><button class="button button-block" style="color:white; text-anchor: all;  border-radius: 5px; background-color: #d9853b; padding: 15px 25px; text-align: center;"/>Home</button></a>

    </div>
</body>
</html>
