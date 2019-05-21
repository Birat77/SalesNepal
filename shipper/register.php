<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$address=$_POST['address'];
$contactno=$_POST['contactno'];
@$Vehicle=$_POST['Vehicle'];

$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM shipperinfo WHERE Email='$email'") or die($mysqli->error());


// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO shipperinfo (FirstName, LastName, Address, ContactNo, Email, Passwords, Hashkey, VehicleType) VALUES ('$first_name','$last_name','$address','$contactno','$email','$password','$hash','$Vehicle')";


    // Add user to the 
        
    if ($mysqli->query($sql) ){
        echo "Succesfully created";
    }
    else {
        echo "NOt";
        # code...
    }

}

?>

