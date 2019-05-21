  <?php
include '../db.php';
session_start();



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
  <title>Cart</title>
</head>
<body>
<div>

  <h4> <?php echo @$_SESSION['first_name'] ?> </h4>
  <h4> <?php echo @$_SESSION['last_name'] ?> </h4>
  <h4> <?php echo @$_SESSION['role'] ?> </h4>
</div>
<div style="clear: both">
<h2 style="color: #d9853b; text-shadow: 5px; letter-spacing: 0.5px;">Your Shopping Cart :</h2>
<table border="5px">
 <tr>
    <th width="40%">Product Name</th>
    <th width="10%">Quantity</th>
    <th width="20%">Price Details</th>
    <th width="10%">Order Total</th>
    <th width="10%">Total After Discount</th>

    <th width="5%">Action</th>
    </tr>
     <?php
  if(!empty($_SESSION["ShoppingCart"]))
  {
    $total = 0;
    foreach($_SESSION["ShoppingCart"] as $keys => $values)
    {
      ?>
            <tr>
            <td><?php echo $values["Product_Name"]; ?></td>
            <td><?php echo $values["Product_Quantity"] ?></td>
            <td>$ <?php echo $values["Product_Price"]; ?></td>
            <td>$ <?php echo number_format($values["Product_Quantity"] * $values["Product_Price"], 2); ?></td>
            <td></td>
             <td><a href="cart.php?action=delete&id=<?php echo $values["Product_Id"]; ?>" style="text-decoration: none;"><span class="Delete" style=" color:red;">Delete</span></a></td>
            </tr>
            <?php 
      $total = $total + ($values["Product_Quantity"] * $values["Product_Price"]);
      $discount=0;
      if ($total>5000)
      {
        $discount=5;
      }
      elseif ($total>10000 && $total<20000) 
      {
        $discount=10;
      }
       elseif ($total>20000 && $total<50000) 
      {
        $discount=15;
      }
      $discountedprice=((100-$discount)/100)*$total;
    }
    ?>
        <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php echo number_format($total, 2); ?></td>
        <td>$ <?php echo number_format($discountedprice,2);?></td>
        <td></td>
        </tr>
        <?php
        $_SESSION['total']=$total;
        $_SESSION['atotal']=$discountedprice;
  }
  ?>
  <div>

  <button onclick='location.href="order.php"' style="background-color: #555555;  padding: 15px 15px;
    text-align: center; 
    text-decoration: none; color:white ; border-radius: 10px; margin-bottom: 5px; float:right;">Checkout</button>
  </div>
</body>
</html>