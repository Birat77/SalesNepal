<?php 
	include '../db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve</title>
	<style type="text/css">
		.product_div {
  padding:  4px;
  margin-bottom:  40px;
}
.image {
  width: 120px;
  height: 120px; 
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

	</style>
</head>
<body>
 	<?php 
 	session_start();

$SArole=$_SESSION['role'];
$SAId=$_SESSION['userId'];
$q=$mysqli->query("SELECT Type FROM subadminpanel Where UserID=$SAId AND Approved='YES'");
$type=$q->fetch_assoc();
$Type=$type['Type'];



 		// for foods
 		$query = $mysqli->query("SELECT * FROM ProductDetails WHERE Product_Category='$Type' ");
 		{
 		if($query->num_rows > 0) {
 			while($rows = $query->fetch_assoc()) {
 				$productid=$rows['Product_ID'];
 				$query2=$mysqli->query("SELECT * FROM products WHERE Product_ID='$productid'");
 			
 					$rows2=$query2->fetch_assoc();

 				if ($rows2['Approved']=='NO') {
 					?>
 					 <div class="product_div" style="border-width:5px;  box-shadow: 0px 1px 2px rgba(0,0,0,0.05); float:left;">
       
        <img class="image" src="<?php echo $rows2['image']; ?>"> </a><br>
        <h5 class="name">Name: <?php echo $rows['Product_Name']; ?></h5>
        <h5 class="price">Price: <?php echo $rows['Product_Price']; ?> </h5>
        <h5 class="quantity">Quantity: <?php echo $rows['Product_Quantity']; ?> </h5>
        <?php echo '&nbsp;&nbsp;&nbsp;<a href="../Sell/approvetheproduct.php?id='. $rows['Product_ID'] .'">Approve</a><br>';
       
        
     
      
     		?>
        <div style="clear: both;"></div>
          
         </div> <?php
 				
 			}
 				
 		
 			}
 		}
 	}

 	?>
</body>
</html>