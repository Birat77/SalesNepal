<?php
/* Displays user information and some useful messages */
session_start();
require '../db.php';


// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");  
   }
  /*if ($_SESSION['role']=="ADMIN")
  {
    header('location: profileadmin.php');
  } 
  if (($_SESSION['role'])=="SUBADMIN")
  {
    include 'profilesubadmin.php';
  }
  */
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
    @$role= $_SESSION['role']; 
    if ($active!=1)
    {
      echo '<script>alert("Your Account is not Activated)</script>';
          
    } 
    else
    {
  header("location:../index/main.php");    
    }
  
    ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style>
      .drop_down {
      list-style-type:  none;
      background:  #27D;
    }

    .drop_down li {
      width: 100px;
      float:  left;
      position:  relative;
    }

    .drop_down li ul {
      list-style-type:  none;
      position:  absolute;
      background:  #39f;
      left:  0;
      top:  100%;
      z-index:  1;
      display:  none;
    }

    .drop_down li:hover ul {
      display:  block;
    }

    .drop_down li a {
      text-decoration:  none;
      color:  #fff;
      padding:  5px;
      display:  block;
      font-weight:  bold;
      font-size:  18px;
    }

    .drop_down li a:hover {
      background:  #16C;
    }
    </style>
</head>

<body>
    <?php
    if ($active==1) {
      # code...
    ?>

    <?php 
    if (@$_SESSION['role']=='ADMIN') {
      ?>
      <a href="../Admin/subadminrequestpending.php"><button class="button button-block" name="sarp"/>SUB ADMIN REQUEST PENDING</button></a>
      <?php
    }
      ?>
      
      <?php
      if (@$_SESSION['role']=='USER') 
      {
        ?>
        <a href="../Admin/requestsubadmin.php"><button class="button button-block" name="msadmin"/>Makemeadmin</button></a>
      <?php
      }
        ?>
        <?php
        if (@$_SESSION['role']=='SUBADMIN') {
          ?>
          <button onclick='location.href="../Sell/approvesell.php";'> Pending Ads</button>
          <?php
        
        }
        ?>
        <?php
        if ((@$_SESSION['role']=='SUBADMIN') OR (@$_SESSION['role']=='USER') ){
          ?>
          <div id="SellAdd">
          <button onclick='location.href="../Sell/sellproduct.php";'>Sell Product</button>
          </div>

            <?php       
           }   
           ?>
           <?php
           }
           ?>

    
 <div class="form">

          <h1>Welcome</h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          
          ?>
          
          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>
          
          <a href="../Login/logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

    
    </div>
  

</body>
</html>
