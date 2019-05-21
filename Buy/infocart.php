<?php
session_start();
include '../db.php';
$id=$_GET['id'];
$cond11=$mysqli->query("SELECT * FROM ProductDetails WHERE Product_ID='$id'");
        $cond12=$cond11->fetch_assoc();
         $quantity=@$cond12['Product_Quantity'];
         $enteredquantity=@$_POST['Quantity'];
        

if($enteredquantity <= $quantity)
{

			{

					if (isset($_SESSION['ShoppingCart']))
						{
					$ArrayOfProductId= array_column($_SESSION['ShoppingCart'], "Product_Id");
								if(!in_array($_GET['id'], $ArrayOfProductId))
					{
						$count= count($_SESSION['ShoppingCart']);
						$_SESSION['count']=$count+1;
						
						$ArrayOfProductDetails= array(
						'Product_Id' => $_GET["id"],
						'Product_Name' => $cond12['Product_Name'],
						'Product_Price' => $cond12['Product_Price'],
						'Product_Quantity' => $_POST["Quantity"]
						);
						$_SESSION["ShoppingCart"][$count] = $ArrayOfProductDetails;
						echo '<script>window.location="../index/main.php"</script>';
					}
				else 
					{
						echo '<script>alert("Products is already added to the cart")</script>';
						echo '<script>window.location="../index/main.php"</script>';
					}
		}		
			else
	{
			$ArrayOfProductDetails = array(
			'Product_Id' => $_GET["id"],
			'Product_Name' => $_POST["hidden_name"],
			'Product_Price' => $_POST["hidden_price"],
			'Product_Quantity' => $_POST["Quantity"]
			);
			$_SESSION["ShoppingCart"][0] = $ArrayOfProductDetails;
			echo '<script>window.location="../index/main.php"</script>';
	}	
}
}

?>



