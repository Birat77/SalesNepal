
<?php

include '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
<style>
body{ background-color: #d3d3d3; }
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
<title>Admin panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="open-sans.css" type="text/css" />
</head>
<body>

<div id="header" style="border-radius:6%">
  <div class="logo">
    <a href="#">Sale-Nepal<span style="font-size: 50% ">.com</span></a>

  </div>

  <div id=button >
      <button  style="background-color:orange; color:white;width:70px;height:30px;border:transparent; border-radius:7px; margin-top: 10px; "><a href="../Login/logout.php" style="color:white;">Log Out</a></button> 
  </div>
  
</div>


<div id="container">

  <div class="sidebar" style="width:20% height:600px;">
    <ul id="nav">
      <ul></ul>
        <li><a href="#" class="selected">Dashboard</a></li>
      <li><a href="adminpanel.php?req=totalorders">Total Orders</a></li>
      <li><a href="adminpanel.php?req=totalsales">Total Sales</a></li>
      <li><a href="adminpanel.php?req=totaluser">Total Customers</a></li>
      <li><a href="adminpanel.php?req=pending">Requests Pending</a></li>
    </ul>
    
  </div>

  <div class="content" style=" width:79%  background-color:grey;">
  <?php
  if (@$_GET['req']=='totalorders')
  {
  
    require 'listoforders.php';
  

  }
  elseif (@$_GET['req']=='totalsales')
  {
    require 'listofsales.php';
  }

  elseif (@$_GET['req']=='totaluser') {
  $vivek = "SELECT * FROM users NATURAL JOIN address";
  $x = mysqli_query(@$mysqli,$vivek);
  $y = mysqli_num_rows($x);
  echo 'TOTAL USERS:'.$y;
  ?>
  <table>
  <tr>
    <th>User ID</th>
    <th>FirstName</th>
    <th>LastName</th>
    <th>Address</th>
   
    <th>Email-ID</th>
  </tr>
  <?php 
    while($x1=$x->fetch_assoc())
  {
    ?>
    <tr>
      <td><?php echo $x1['UserID']; ?></td>
      <td><?php echo $x1['FirstName']; ?></td>
      <td><?php echo $x1['LastName']; ?></td>
      <td><?php echo $x1['City']; ?></td>
      
      <td><?php echo $x1['Email']; ?></td>
    </tr>
<?php
  }
    
  
    # code...
  }
  elseif (@$_GET['req']=='pending') {
    require 'subadminrequestpending.php';
    # code...
  }
  ?>



  </div>


</div>
</body>
</html>