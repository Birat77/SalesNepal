
<?php
session_start();
include '../db.php';

      if(isset($_POST['Request'])) {

      $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
        $result=mysqli_query($mysqli, "SELECT * FROM users WHERE Email='$email'");
        
        if (mysqli_num_rows($result)==1)
        {
        $rows=mysqli_fetch_assoc($result);
        $userid=$rows['UserID'];
        $fname=$rows['FirstName'];
        $lname=$rows['LastName'];
        $address=$rows['Address'];
        $email=$rows['Email'];
        $role=$_POST['Type'];
        $mysqli->query("INSERT INTO subadminpanel (Type, UserID) VALUES('$role', '$userid')");
        header('Location: ../Login/profile.php');



        
    }
}
     
?>
<!DOCTYPE html>
<html>
<head>
<style>
*{
  margin-top:40px ;
background:#cccccc;
   font-size: 20px;
   margin-left: 50px;
}

    </style>
    <title>Subadmin Selection</title>
</head>
<body >
<form action="../Admin/requestsubadmin.php" method="POST">
<input type="radio" name="Type" value="Men"/> Men's Clothing<br>
<input type="radio" name="Type" value="Women"/>Women's Clothing <br>
<input type="radio" name="Type" value="MobilesAndTablets"/>Mobiles and Tablets <br>
<input type="radio" name="Type" value="TvAppliancesCameras"/> TVs, Appliances, Cameras<br>
<input type="radio" name="Type" value="ComputersLaptopsGaming"/> Computers, Laptops and Gaming<br>
<input type="submit" name="Request" value="Request for Subadmin" style="background-color: #d9853b; color: white; padding:10px 20px; cursor: pointer;">
</form>

</body>
</html>
