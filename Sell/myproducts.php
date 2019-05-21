<?php 
include '../db.php';
session_start();
$id=$_SESSION['userId'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>My Products</title>
 </head>
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

		#nav{
			background:#558C89;
			box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.3);	
		}
		#nav ul{
			margin: 0px;
			padding: 0px;
			list-style-type: none;

		}
		#nav ul li a{
			text-decoration: none;
			color: #ECECEA;
			text-shadow: 0.1px 0.1px 1px rgba(0, 0, 0, 1.0);
			
		}
		#nav ul li{
			float: left;
			width: 200px;
			height: 40px;
			background-color:#558C89;
			font-size: 15px;
			line-height: 40px;
			text-align: center;
			

		}
		#nav ul li ul{
			z-index: 1;
			position: relative;
		}
		#nav ul li ul li{ 
			display: none;
			pointer-events: auto;
			z-index: 1;



		}
		#nav ul li:hover ul li{
			display: block;


		}
		#nav ul li a:hover{
			font-weight: bold;
			font-size: 18px;
			background-color:#004d4d;
			display: block;
		}
		#nav #cart{
			float: right;
			 width:160px; top:0; right:0; height:40px; color:#fff; 
			 background: #D9853B;
			 box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.1);
			 border-radius: 5px;


		}
		a.cart-link { color:#fff; background:url(images/ico4.gif) no-repeat 0 0; padding:0 0 0 32px; text-decoration: none; }
		a.cart-link:hover { text-decoration: underline;}
		#sidebar { float:left; width:226px;}
		#main { padding:10px 0 0 0; }

.box { padding:1px; border:solid 1px #dedede; margin-bottom:1px;}
.box h2{ background:#D9853B; color:#fff; font-weight: normal; padding:0 5px; position:relative; height:27px; line-height:27px; }
.box h2 span{ position:absolute; width:10px; height:5px; top:27px; right:10px; font-size:0; line-height:0;}
.box-content { padding:5px;}



.search { min-height:252px;}
.search label { display:block; padding-bottom:3px; }

.search .field { display:block; margin-bottom:10px; }
.search .inline-field label { display:inline; padding:0; }
.search .inline-field .field { display:inline; margin:0; }
.search input.field { width:206px; }
.search select.field { width:212px; }
.search select.small-field { width:50px; }

.search-submit { width:70px; background:#D9853B; border:0; color:#fff; height:27px; display:block; line-height:26px; cursor:pointer; margin:12px 0 10px 0;}

.categories { min-height:383px; }
.categories ul { list-style-type: none; font-size:13px;}
.categories ul li{ border-bottom:dashed 1px #ccc; padding:5px 0;}
.categories ul li.last{ border-bottom:0; padding-bottom:0;}
.categories ul li a{ color:#5f5f5f; text-decoration: none; background:url(images/cat.gif) no-repeat 0 4px; padding-left:17px;}
.categories ul li a:hover{ color:#8b0000; }
.product_div {
  padding:  4px;
  margin-bottom:  40px;
}
.image {
  width: 350px;
  height: 220px; 
  padding-top: 20px; 
  padding-right: 50px; 
  padding-left: 50px;
  padding-bottom: 20px;
  box-shadow:  0px 0px 3px rgba(0,0,0,0.3);
  transition:  box-shadow 0.4s;
  cursor:  pointer;
}

.image:hover {
  box-shadow:  0px 0px 6px rgba(0,0,0,0.5);
}

.input_text_submit {
  box-sizing:  border-box;
  width:  100%;
}

.input_text_submit input[type="text"] {
  margin-top:  4px;
  box-sizing:  border-box;
  display:  block;
  width:  70%;
  float:  left;
  padding:  4px;
  outline:  none;
  font-size:  15px;
  border:  1px solid #e1e1e1;
}

.input_text_submit input[type="text"]:focus {
  border:  1px solid #a1a1a1;
}

.input_text_submit input[type="submit"] {
  box-sizing:  border-box;
  display:  block;
  width: 30%;
  float:  left;
  padding:  5px;
  outline:  none;
  cursor:  pointer;
  background:  lightgray;
  border: 1px solid #a1a1a1;
}

.input_text_submit input[type="submit"]:hover {
  background:  #aaa;
}



	</style>

 <body>
 <?php
$approveproducts1= mysqli_query($mysqli,"SELECT * FROM products WHERE Sellers_ID='$id' and Approved='YES'");
if($approveproducts2=mysqli_num_rows($approveproducts1) > 0) {
      while($approveproducts2= $approveproducts1->fetch_assoc()) {
      	
        $productid=$approveproducts2['Product_ID'];
        $cond=$mysqli->query("SELECT * FROM ProductDetails WHERE Product_ID='$productid'");
        $cond1=$cond->fetch_assoc();
        $cond11=$mysqli->query("SELECT * FROM products WHERE Product_ID='$productid'");
        $cond12=$cond11->fetch_assoc();
        $quantity=@$cond12['Product_Quantity'];

        ?>
        <div style="width: 100%">

        <form method="POST" action="../Sell/edit.php?id=<?php echo $approveproducts2["Product_ID"]; ?>">
        <div class="product_div" style="border-width:5px;  box-shadow: 0px 1px 2px rgba(0,0,0,0.05); float:left;">
        <a href="../info.php?id=<?php echo $approveproducts2['Product_ID']; ?> ">
        <img class="image" src="<?php echo $cond12['image']; ?>"> </a><br>
        <h5 class="name"> <?php echo $cond1['Product_Name']; ?></h5>
        <h5 class="price"> <?php echo $cond1['Product_Price']; ?> </h5>
        <h5 class="quantity"> <?php echo $cond1['Product_Quantity']; ?> </h5>
        <div class="input_text_submit">
        <input type="hidden" name="hidden_name" value="<?php echo $cond1["Product_Name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $cond1["Product_Price"]; ?>">
        <?php if (@$_SESSION['logged_in']==1 && $_SESSION['role']=='USER')
        {
        	?>
        <input type="submit" name="edit" style="margin-top:5px;"  value="Edit">

        
        <?php
    	}
     		?>
        <div style="clear: both;"></div>
           </div>
         </div> 


        </form>
        </div>

        <?php
      
      
      
      	# code...
      
  	 }
    }
 ?>
 
 </body>
 </html>
