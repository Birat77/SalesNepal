<?php
session_start();
include '../db.php';
if(isset($_POST['submit']))
{
	
	require 'submit.php';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sell Product</title>
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
		  input {
    padding: 12px 20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    width:400px;
  }
  button{
    background-color: #d9853b;  padding: 8px 25px;
    text-align: center; 
    text-decoration: none; color:white ; border-radius: 10px; 
  }
    </style>
</head>
<body>
  <div>
    <div id="header">
		<span id="salenepal">Sale-Nepal</span>
		<span style="float: right">
			<div id="session">
				<?php if (@$_SESSION['logged_in']!=1)
						{

							?>
							<div id="login">
							<h4><a href='../Login/index1.php'>Login</a></h4>
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
	<form action="sellproduct.php" method="post" enctype="multipart/form-data">
		
		



		<div id='content' style="margin-top: 20px;margin-left: 35%;padding-left: 50px;padding-top: 30px;background-color: lightgrey;border-radius: 5px;width: 500px; height: 600px;">
       <form action="submit.php" method="POST" enctype="multipart/form-data">
       <div class="Product Name"></div>
       <label for="ProductName">Product Name:   </label><br>
	   <input type = "text" name="name" placeholder="Product Name" ><br><br>
			<input type="file" name="file"><br><br>
			<label for="Quantity cols="40">Quantity:</label><br>
			<input type="text" name="Quantity" placeholder="Quantity"> <br> <br>
			 <label for="Description cols="40">Description:</label><br>
		  <input type="text" name="description" placeholder="Description of the Product..." autocomplete="on"><br><br>

		<label for="Price"> Price: </label><br>
		<input type = "text" name="Price" placeholder="price"><br><br>
		


		<select name="choose">
			<option value="Men">
		MEN'S CLOTHES
			</option>
        	<option value="Women">
        WOMEN'S CLOTHES
             	</option>
        	<option value = "MobilesAndTablets">
        MOBILES & TABLETS
        	</option>
        	<option value = "JewelleryAndWatches">
        JEWELLERY & WATCHES
        	</option>
        	<option value = "TvAppliancesCameras">
        TV, APPLIANCES & CAMERA'S
        	</option>
        	<option value = "ComputerLaptopGaming">
        COMPUTER'S LAPTOP'S & GAMING
        	</option>
		</select><br>
		
		<button name="submit" type="submit">SUBMIT</button>
</form>
	</form>
</div>
</body>
</html>