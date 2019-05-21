<?php
session_start();
include '../db.php';
$getId = $_GET['id'];

$query=$mysqli->query("SELECT Product_ID, Product_Name, Product_Price, Product_Category FROM ProductDetails WHERE Product_ID='$getId'");
	
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			font-family: "Trebuchet MS";
			box-sizing: border-box;
			transition: background 0.4s;


		}
		a{
			text-decoration: none;
			color: #ECECEA;

		}
		body{
			background: #ECECEA;
		}
		#header{
			background: #74AFAD;
			font-size: 40px;
			color: #ECECEA;
			font-weight: bold;
			padding: 10px;
			padding-left: 30px;
			border-bottom: 1px solid #c1c1c1;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 1.0);

		}
		#header #salenepal{
			text-shadow: 1px 1px 3px rgba(0, 0, 0, 5.0);

		}
		#header #session{
			margin-right: 5px;
			padding: 1px;
			font-size: 14px;
			font-weight: bold;
			text-shadow: 0px 2px 1px rgba(0, 0, 0, 0.5);
			
		}
		#header #session h4:hover{
			font-size: 15px;
			cursor: pointer;
			display: block;



		}
		#header #session #log{
			margin-left:75%;

		}
		</style>
	<link rel="stylesheet" type="text/css"  href="styleprofile.css">
  
</head>
<body>
   <div class="container" style="background-color: #e7fff9">
   	<div id="header">
		<span id="salenepal">Sale-Nepal</span>
		<span style="float: right">
			<div id="session">
				<?php if (@$_SESSION['logged_in']!=1)
						{

							?>
							<div id="login">
							<h4><a href='../index/main.php'>Login</a></h4>
							</div>
							<?php
						}
					else
						{
							?>
							<h3 style="float: right"> WELCOME &nbsp<?php echo $_SESSION['first_name'];?>&nbsp<?php echo $_SESSION['last_name']; ?></h3>
							<div id="log">
							<h4><a href='../Login/logout.php'>Logout</a></h4>
							</div>
							<?php

						}

						?>
				
			</div>
		</span>

	</div>
    
    <div class="row">
        
    	<?php
    	$getId = $_GET['id'];
        
        $image="SELECT image FROM products WHERE Product_ID='$getId'";
        $image1=$mysqli->query($image);
        $image2=$image1->fetch_assoc(); ?>
        <div style="margin-left: 145px; margin-top: 20px;">
           <img src="<?php echo $image2['image']; ?>" style="width:400px;height: 500px;">
        </div>
        
        <div class="block" style="margin-top: 20px;margin-left: 20px;width: 600px;">
        <?php
             $query=$mysqli->query("SELECT Product_ID, Product_Name, Product_Price, Product_Category FROM ProductDetails WHERE Product_ID='$getId'");
	         while($result=$query->fetch_assoc())
	         {
	         echo 'Product Category:'. $result['Product_Category'];
	         echo "<br><br>"; ?>
	         
        <?php
	         echo 'Product Name:'. $result['Product_Name'];
	         echo "<br><br>"; ?>
            <hr>
	    <?php     
	         echo 'Product Price:'. $result['Product_Price'];
	         echo "<br><br><br><br><br>";
             }
        
    	?>
    	  
    	   <button style="font-size: 25px;width: 100%;">Add to Cart</button>
    	   
    	</div>
        
    </div>
    <br>
    <div class="block">
    	<b style="font-size: 30px;">Product Description</b>
        <hr>
    	<p>This product is awesome!!!!</p>
    </div><br>
    <div class="block">
    	<b style="font-size: 30px;">Customer Questions</b><br><br>
    	<?php 
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
        
    </div><br><br><br><br>
    
    <footer></footer>
    
   </div>
   
</body>
</html>

