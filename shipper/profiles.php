<?php 
include '../db.php' ;
session_start();

$sid=$_SESSION['ShipperIds'];

?>
<table>
<tr>
	<th></th> 
</tr>
<?php


?>

<!DOCTYPE html>

<html>
<head>
    <title>SHIPPERPROFILE</title>
    <style type="text/css">
   body {
  margin: 0;
  padding: 0;
  border: 0;
  font-size: 100%;
  font: inherit;
  outline: none;
  box-sizing: border-box;
}
html { overflow-y: scroll; }
body { 
  background: #eee url('photos/weave.png'); 
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 62.5%;
  line-height: 1;
  color: #585858;
  padding: 22px 10px;
  padding-bottom: 55px;
}

br { display: block; line-height: 1.6em; } 


input, textarea { 
  box-sizing: border-box;
  outline: none; 
}


table { border-collapse: collapse; border-spacing: 0; }
img { border: 0; max-width: 100%; }

h1 { 
  font-family: 'Amarante', Tahoma, sans-serif;
  font-weight: bold;
  font-size: 3.6em;
  line-height: 1.7em;
  margin-bottom: 10px;
  text-align: center;
}


/** page structure **/
#wrapper {
  display: block;
  width: 850px;
  background: #fff;
  margin: 0 auto;
  padding: 10px 17px;
  -webkit-box-shadow: 2px 2px 3px -1px rgba(0,0,0,0.35);
}

#keywords {
  margin: 0 auto;
  font-size: 1.2em;
  margin-bottom: 15px;
}


#keywords thead {
  cursor: pointer;
  background: #c9dff0;
}
#keywords thead tr th { 
  font-weight: bold;
  padding: 12px 30px;
  padding-left: 42px;
}
#keywords thead tr th span { 
  padding-right: 20px;
  background-repeat: no-repeat;
  background-position: 100% 100%;
}

#keywords thead tr , #keywords thead tr {
  background: #acc8dd;
}


#keywords tbody tr { 
  color: #555;
}
#keywords tbody tr td {
  text-align: center;
  padding: 15px 10px;
}
#keywords tbody tr td.lalign {
  text-align: left;
}
    </style>
</head>
    <body>
       <body>
 <div id="wrapper">
  <h1>Shipper Log</h1>
  
  <table id="keywords" cellspacing="0" cellpadding="0">
    <thead>
      <tr>
        <th><span>OrderNo</span></th>
        <th><span>BuyersName</span></th>
       
        <th><span>BuyersAddress</span></th>
        <th><span>DateofDelivery</span></th>
        <th><span>Days Remaining</span></th>
        <th><span>State</span></th>
      </tr>
    </thead>
    <tbody>
    <?php
    $query="SELECT * FROM orders WHERE ShipperID='$sid' AND Deliverd='NO'";
	$query1=$mysqli->query($query);
	$buyer=$mysqli->query("SELECT * FROM shipperinfo WHERE ShipperID='$sid'");
	$buyer1=$buyer->fetch_assoc();
	while ($query2=$query1->fetch_assoc()) {
		$x=date('y-m-d');
		$y=$query2['DeliveryDate'];
$from=date_create(date('Y-m-d'));
$to=date_create($y);
$diff=date_diff($from,$to);
$orderno=$query2['OrderNo'];
$kinnemanxe=$mysqli->query("SELECT UserID FROM orders WHERE OrderNo='$orderno'");
$kinnemanxe1=$kinnemanxe->fetch_assoc();
$userid=$kinnemanxe1['UserID'];

$info=$mysqli->query("SELECT FirstName, LastName, City FROM users NATURAL JOIN address WHERE UserID='$userid'");
$info1=$info->fetch_assoc();




		?>


		<tr>
        <td class="lalign"><?php echo $query2['OrderNo']; ?></td>
        <td><?php echo $info1['FirstName']; echo" "; echo $info1['LastName']?></td>
                <td><?php echo $info1['City'];?></td>
        <td><?php echo $query2['DeliveryDate']?></td>
        <td><?php echo $diff->format('%R%a days');?></td>
        
        <td><a href="deliveryinfo.php?oid=<?php echo $query2['OrderNo'];?>"> Explore</td>
      </tr>

		<?php
	}
    ?>
      
      <!--<tr>
        <td class="lalign">desktop workspace photos</td>
        <td>2,200</td>
        <td>500</td>
        <td>22%</td>
        <td>8.9</td>
      </tr>
      <tr>
        <td class="lalign">arrested development quotes</td>
        <td>13,500</td>
        <td>900</td>
        <td>6.7%</td>
        <td>12.0</td>
      </tr>
      <tr>
        <td class="lalign">popular web series</td>
        <td>8,700</td>
        <td>350</td>
        <td>4%</td>
        <td>7.0</td>
      </tr>
      <tr>
        <td class="lalign">2013 webapps</td>
        <td>9,900</td>
        <td>460</td>
        <td>4.6%</td>
        <td>11.5</td>
      </tr>
      <tr>
        <td class="lalign">ring bananaphone</td>
        <td>10,500</td>
        <td>748</td>
        <td>7.1%</td>
        <td>17.3</td>
      </tr>
    
    </tbody>
  </table>
 </div> 
</body>
    </body>

</html>


