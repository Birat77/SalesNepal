<?php
include '../db.php';
session_start();
$NoOfItems=@$_SESSION['count'];

 $first_name = @$_SESSION['first_name'];
    $last_name = @$_SESSION['last_name'];
    $email = @$_SESSION['email'];
    $active = @$_SESSION['active'];
    @$role= $_SESSION['role'];    

   
    $beforeprice=  @$_SESSION['beforeprice'];
        $afterprice= @$_SESSION['afterprice'];
        if ($role=='ADMIN')
        {
          header('location:../Admin/adminpanel.php');
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<title>Sale Nepal</title>
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
</head>
<body>
<div id="wrapper">
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
	<div id="nav">
		<ul>
			<li><a href="main.php">Home</a></li>
      <?php if (@$_SESSION['logged_in']==1) {

        ?>
			<li><a href="javascript:void(0);">My account</a>
				<ul>
					<li><a href="../Sell/myproducts.php">My Products</li>
					<li><a href="../soldproducts.php">Sold Products</li>
					<li><a href="../Sell/sellproduct.php">Sell Products</li>

          <?php if (@$_SESSION['role']=='USER')
          {
            ?>
					<li><a href="../Admin/requestsubadmin.php">Make me admin</li>
          <?php
        }

        else
        {
          ?>
          <li><a href="../Sell/approvesell.php">Pending Ads</li>
          <li><a href="../Shipper/request.php">Shipper Request</li>

          <?php
        }
        ?>
				</ul>
				<div style="clear: both"></div>
			</li>
      <?php
    }
    ?>  

			
			<li><a href="javascript:void(0);">Contact</a></li>
      <?php if (@$_SESSION['logged_in']!=1)
      {
        ?>
        <li><a href="../shipper/index.php">Shipper login</li>
        <?php
      }
      ?>

		</ul>
		

		<div id="cart"> <a href="../Buy/cartorder.php" class="cart-link">Cart</a>&nbsp;&nbsp; &nbsp;&nbsp; 
      		<span>Quantity:<?php echo $NoOfItems;?> </span> 
      	</div>
      	<div style="clear: both"></div>	

	</div>
	<div id="maincontent">
		<div class="left1">
			<div id="sidebar">
      <!-- Search -->
      <div class="box search">
        <h2>Search by <span></span></h2>
        <div class="box-content">
          <form action="main.php" method="get" enctype="multipart/form-data">
            <label>Name</label>
            <input type="text" name="user_search" placeholder="Search for products" class="field" />
           
            <label>Category</label>
            <select class="field" name="category">
              	<option value="">-- Select Category --</option>
      			<option value="Men"> Men's Wear</option>
      			<option value="Women"> Women's Wear</option>
                <option value="MobilesAndTablets"> Mobiles & Tablets</option>   
                <option value="JewelleryAndWatches"> Jewelry & Watches</option>
               	<option value = "TvAppliancesCameras">TV, APPLIANCES & CAMERA'S	</option>
      		  	<option value = "ComputerLaptopGaming">  COMPUTER'S LAPTOP'S & GAMING</option>
            </select>
            <div class="inline-field">
             <label>Popularity
            <input type="radio" name="popular" value="1"></label>
              <label>Price</label>
              <select class="field small-field" name="price1" style="width: 60px">
                <option value="100" selected="selected">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
                <option value="3000">3000</option>
                <option value="5000">5000</option>
                <option value="10000">10000</option>


              </select>
              <label>to:</label>
              <?php
              $max=$mysqli->query("SELECT Product_Price FROM ProductDetails order by Product_Price desc limit 1 offset 1 ");
              $row=$max->fetch_assoc();
              ?>
              <select class="field small-field" name="price2" style="width: 70px">
                <option value="500" >500</option>
                <option value="1000">1000</option>
                <option value="3000">3000</option>
                <option value="5000">5000</option>
                <option value="10000">10000</option>
                <option value="50000">10000</option>
                <option value="200000" selected="selected">200000</option>
                
              </select>
            </div>
            <input type="submit" class="search-submit" name="search" />
			<p> <? php  echo($output) ?> <br>
        <!--    <p> <a href="#" class="bul">Advanced search</a><br />
		       <a href="#" class="bul">Contact Customer Support</a> </p>
			   -->
       
             </form>
        </div>
      </div>
      		<div class="box categories">
        <h2>Categories <span></span></h2>
        <div class="box-content">
          <ul>
            <li><a href="main.php?cat=Men">Men's Wear</a></li>
            <li><a href="main.php?cat=Women">Women's Wear</a></li>
            <li><a href="main.php?cat=MobilesAndTablets">Mobiles & Tablets</a></li>
            <li><a href="main.php?cat=JewelleryAndWatches">Jewelry & Watches</a></li>
            <li><a href="main.php?cat=TvAppliancesCameras">Tv, Appliances, and Cameras</a></li>
            <li><a href="main.php?cat=ComputerLaptopGaming">Computer's Laptop's & Gaming</a></li>
             </ul>
        </div>
      </div>
      <!--sidebar sakyo-->
		</div>
	</div>
	<div class="product" style="width: 100%">
		<?php
		if (isset($_GET['cat']) && !empty($_GET['cat']))
		{
			$cat=$_GET['cat'];
			$get_joinpro= "select s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Category like '$cat%' ";
			 $result = mysqli_query($mysqli, $get_joinpro); 
        while($row=mysqli_fetch_array($result))
        {
            $img=$row['pimage'];
            $pro_id = $row['Product_ID'];
		$pro_name = $row['Product_Name'];
		$pro_cat = $row['Product_Category'];
        $pro_qty= $row['Product_Quantity'];
		$pro_price = $row['Product_Price'];
       // $pro_img = $row_pro['image'];
	
        // USE THIS INSIDE ECHO <img src='../product_images/$pro_image' width='180' height='180' />
        ?>
					  <div style="width: 100%">

        <form method="POST" action="../Buy/cart.php?action=add&id=<?php echo $pro_id; ?>">
        <div class="product_div" style="border-width:5px;  box-shadow: 0px 1px 2px rgba(0,0,0,0.05); float:left;">
        <a href="../forum/info.php?id=<?php echo $pro_id; ?> ">
        <img class="image" src="<?php echo $img; ?>"> </a><br>
        <h5 class="name">Name: <?php echo $pro_name; ?></h5>
        <h5 class="price">Price: <?php echo $pro_price; ?> </h5>
        <h5 class="quantity">Quantity: <?php echo $pro_qty; ?> </h5>
        <div class="input_text_submit">
        
        <input type="hidden" name="hidden_name" value="<?php echo $pro_name; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $pro_price; ?>">
        <?php if (@$_SESSION['logged_in']==1 && $_SESSION['role']=='USER')
        {
        	?>
          <input type="text" name="Quantity" class="quantity" value="1">
        <input type="submit" name="AddProduct" style="margin-top:5px;"  value="Add to Cart">
        <?php
    	}
     		?>
        <div style="clear: both;"></div>
           </div>
         </div> 


        </form>
        </div>
					<?php
	
            
  
        }

		}

		elseif(isset($_GET['search'])){ 
	
	$search_query = $_GET['user_search'];
    $search_cat = $_GET['category'];
    $search_prc1 = $_GET['price1'];
    $search_prc2 = $_GET['price2'];
    $popular=@$_GET['popular'];
    	if($search_prc1!=NULL && $search_prc2!=NULL && $search_prc2<$search_prc1)
    	{
    		echo '<script>alert("Invalid Price Range")</script>';
    		echo '<script>window.location="main.php"</script>';
    	}

       
     

         if ($search_prc1==NULL && $search_cat==NULL && $search_prc2==NULL && $popular==NULL )
        {
          $get_joinpro = "SELECT s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Name like '%$search_query%'";
        }
         if($search_prc1!=NULL && $search_prc2!=NULL && $search_cat!=NULL && $popular==NULL)
         {
              //$get_pro = "select * from productdetails where Product_Name like '%$search_query%' AND Product_Category like '%$search_cat%'";
        $get_joinpro= "SELECT s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Name like '%$search_query%'  AND Product_Category like '$search_cat' AND Product_Price between '$search_prc1' and '$search_prc2'  ";
         }
         if($search_prc1!=NULL && $search_prc2!=NULL && $search_cat==NULL && $popular==NULL)
     
         {    //$get_pro = "select * from productdetails where Product_Name like '%$search_query%' AND Product_Category like '%$search_cat%'";
        $get_joinpro= "SELECT s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Name like '%$search_query%' AND Product_Price between '$search_prc1' and '$search_prc2' ";
         }




         //POPULARITY
         
         if($search_prc1!=NULL && $search_prc2!=NULL && $search_cat!=NULL)
         {
              //$get_pro = "select * from productdetails where Product_Name like '%$search_query%' AND Product_Category like '%$search_cat%'";
        $get_joinpro= "SELECT s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Name like '%$search_query%'  AND Product_Category like '$search_cat' AND Product_Price between '$search_prc1' and '$search_prc2'  ";
         }
         if($search_prc1!=NULL && $search_prc2!=NULL && $search_cat==NULL)
     
         {    //$get_pro = "select * from productdetails where Product_Name like '%$search_query%' AND Product_Category like '%$search_cat%'";
        $get_joinpro= "SELECT s.image pimage,p.Product_ID,p.Product_Name,p.Product_Category,p.Product_Quantity,p.Product_Price from productdetails p INNER JOIN products s ON p.Product_ID=s.Product_ID where Product_Name like '%$search_query%' AND Product_Price between '$search_prc1' and '$search_prc2' ";
         }
        
          //  var_dump($get_joinpro);
         $result=$mysqli->query($get_joinpro);
         if($result->num_rows >0)
         {
    //$result = mysqli_query($mysqli, $get_joinpro); 
        while($row=$result->fetch_assoc())
        {

            $img=$row['pimage'];
            $pro_id = $row['Product_ID'];
		$pro_name = $row['Product_Name'];
		$pro_cat = $row['Product_Category'];
        $pro_qty= $row['Product_Quantity'];
		$pro_price = $row['Product_Price'];
       // $pro_img = $row_pro['image'];
	
        // USE THIS INSIDE ECHO <img src='../product_images/$pro_image' width='180' height='180' />
        ?>
					  <div style="width: 100%">

        <form method="POST" action="../Buy/cart.php?action=add&id=<?php echo $pro_id; ?>">
        <div class="product_div" style="border-width:5px;  box-shadow: 0px 1px 2px rgba(0,0,0,0.05); float:left;">
        <a href="../forum/info.php?id=<?php echo $pro_id; ?> ">
        <img class="image" src="<?php echo $img; ?>"> </a><br>
        <h5 class="name"> Name:<?php echo $pro_name; ?></h5>
        <h5 class="price"> Price:<?php echo $pro_price; ?> </h5>
        <h5 class="quantity"> Remaining Quantity<?php echo $pro_qty; ?> </h5>
        <div class="input_text_submit">
        
        <input type="hidden" name="hidden_name" value="<?php echo $pro_name; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $pro_price; ?>">
        <?php if (@$_SESSION['logged_in']==1 && $_SESSION['role']=='USER')
        {
        	?>
          <input type="text" name="Quantity" class="quantity" value="1">
        <input type="submit" name="AddProduct" style="margin-top:5px;"  value="Add to Cart">
        <?php
    	}
     		?>
        <div style="clear: both;"></div>
           </div>
         </div> 


        </form>
        </div>
					<?php
	
            
  
        }
      }
      else
      {
        echo '<script>alert("Not")</script>';
        echo '<script>window.location="main.php"</script>';

      }
           
	   }
	   else
	   {
if (@$_SESSION['role']!='ADMIN')
{
$approveproducts1= $mysqli->query("SELECT * FROM products WHERE Approved='YES'");
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

        <form method="POST" action="../Buy/cart.php?action=add&id=<?php echo $approveproducts2["Product_ID"]; ?>">
        <div class="product_div" style="border-width:5px;  box-shadow: 0px 1px 2px rgba(0,0,0,0.05); float:left;">
        <a href="../forum/info.php?id=<?php echo $approveproducts2['Product_ID']; ?> ">
        <img class="image" src="<?php echo $cond12['image']; ?>"> </a><br>
        <h5 class="name">Name: <?php echo $cond1['Product_Name']; ?></h5>
        <h5 class="price">Price: <?php echo $cond1['Product_Price']; ?> </h5>
        <h5 class="quantity">Quantity: <?php echo $cond1['Product_Quantity']; ?> </h5>
        <div class="input_text_submit">
        
        <input type="hidden" name="hidden_name" value="<?php echo $cond1["Product_Name"]; ?>">
        <input type="hidden" name="hidden_price" value="<?php echo $cond1["Product_Price"]; ?>">
        <?php if (@$_SESSION['logged_in']==1 && $_SESSION['role']=='USER')
        {
        	?>
        <input type="submit" name="AddProduct" style="margin-top:5px;"  value="Add to Cart">
        <input type="text" name="Quantity" class="quantity" value="1">
        <?php
    	}
     		?>
        <div style="clear: both;"></div>
           </div>
         </div> 


        </form>
        </div>

        <?php
      
      }
    }
  }
}
    ?>  
        

	</div>

</div>

</body>
</html>