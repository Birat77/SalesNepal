<?php
/* Database connection*/

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'user';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

$address="CREATE TABLE address (ZipCode varchar(10) PRIMARY KEY, City varchar(20))";
mysqli_query($mysqli,$address);
$users="CREATE TABLE users (UserID int(11) AUTO_INCREMENT PRIMARY KEY,
									FirstName varchar(20),
									LastName varchar(20),
									Zipcode varchar(10),
									
									Email varchar(30),
									Passwords varchar(100),
									Hashkey varchar (50),
									active int(1) DEFAULT '0',
									Role varchar(20) DEFAULT 'USER',
									FOREIGN KEY (Zipcode) REFERENCES address(Zipcode))";
mysqli_query($mysqli,$users);



$subadminpanel="CREATE TABLE subadminpanel (SubAdminID int(5) AUTO_INCREMENT PRIMARY KEY,
											Type varchar(20),
											UserID int(11),
											Approved varchar(5) DEFAULT 'NO',
											FOREIGN KEY(UserID) REFERENCES users(UserID))";
mysqli_query($mysqli,$subadminpanel);
$shipperinfo="CREATE TABLE shipperinfo(ShipperID int(11) AUTO_INCREMENT PRIMARY KEY,
									FirstName varchar(20),
									LastName varchar(20),
									Address varchar(20),
									ContactNo varchar(20),
									Email varchar(30),
									Passwords varchar(100),
									Hashkey varchar (50),
									RemainingTasks int(10) DEFAULT'0',
									VehicleType varchar(20),
									active int(1) DEFAULT '0')";
mysqli_query($mysqli,$shipperinfo);
$discount="CREATE TABLE discount (TotalPrice int(191) PRIMARY KEY,
									 DiscountedPrice int(191))";
									 mysqli_query($mysqli,$discount);

$order="CREATE TABLE orders (OrderNo int(20) AUTO_INCREMENT PRIMARY KEY, 
									UserID int(20) NOT NULL,
									ProductsDetails TEXT NOT NULL,
									Deliverd char(5) DEFAULT 'NO',
									OrderDate date,
									DeliveryDate date,
									ShipperID int(11),
									TotalPrice int(191),
									FOREIGN KEY (UserID) REFERENCES users(UserID),
									FOREIGN KEY (ShipperID) REFERENCES shipperinfo(ShipperID),
									FOREIGN KEY (TotalPrice) REFERENCES discount(TotalPrice))
									";
								
mysqli_query($mysqli, $order);


$ProductDetails="CREATE TABLE ProductDetails (Product_ID int(20) AUTO_INCREMENT PRIMARY KEY,
												Product_Name varchar(20),
												Product_Price int(20),
												Product_Category varchar(20),
												Product_Description text,
												Product_Quantity int(255)
												)";
mysqli_query($mysqli,$ProductDetails);


$products="CREATE TABLE Products (Product_ID int (20),
													Sellers_ID int (20),
													image varchar(255),
													Approved char(5) DEFAULT 'NO',
													FOREIGN KEY (Product_ID) REFERENCES ProductDetails(Product_ID),

													PRIMARY KEY (Product_ID, Sellers_ID))";
mysqli_query($mysqli,$products);




$vehicleinfo="CREATE TABLE shippingvehicle(VehicleID int(20) PRIMARY KEY AUTO_INCREMENT,
										VechileName varchar(20),
										VehicleType varchar(20),
										VehicleNumber varchar(20),
										ShipperID int(20),
										FOREIGN KEY(ShipperID) REFERENCES shipperinfo(ShipperID))";
mysqli_query($mysqli,$vehicleinfo);
$shippingdetails="CREATE TABLE shippingdetails (OrderNo int (20),
												ShipperID int (11),
												ShippingDate date,
												PickupTime time,
												DeliveryTime time,
												VehicleID int(20),
												FOREIGN KEY (OrderNo) REFERENCES orders(OrderNo),
												FOREIGN KEY (ShipperID) REFERENCES shipperinfo(ShipperID),
												FOREIGN KEY (VehicleID) REFERENCES shippingvehicle(VehicleID),
												PRIMARY KEY(OrderNo,ShipperID,VehicleID))";
mysqli_query($mysqli,$shippingdetails);


$updatehistory="CREATE TABLE updatehistory (ProductID int(20) PRIMARY KEY, UpdatedName varchar(30), UpdatedDescription text,UpdatedQuantity int (20), UpdatedPrice float(20), DateOfUpdate date, TimeOfUpdate time)";
mysqli_query($mysqli,$updatehistory);

$comment="CREATE TABLE comment(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    UserID int(128) not null,
    dates datetime not null,
    message TEXT not null,
    reply TEXT,
    ProductId int(10),
    FOREIGN KEY (UserID) REFERENCES Users(UserID));";
mysqli_query($mysqli,$comment);
 $ContactNo="CREATE TABLE contactno (UserID int(10), ContactNo int(20), FOREIGN KEY (UserID) REFERENCES users(UserID))";
 $mysqli->query($ContactNo);
 $rating="CREATE TABLE rating (UserID int(10),
 							   ProductID int(10),
 							   Rate int(5),
 							   PRIMARY KEY(UserID, ProductID))";
 							   mysqli_query($mysqli,$rating);


												




?>
