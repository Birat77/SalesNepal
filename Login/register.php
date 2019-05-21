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

$address1=$_POST['address'];
$contactno1=$_POST['contactno1'];
$contactno2=$_POST['contactno2'];



$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE Email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
    
}
else {
// Email doesn't already exist in a database, proceed...
    

    $row=$mysqli->query("SELECT * FROM address WHERE City='$address1'");
    $row1=$row->fetch_assoc();
    $zipcode=$row1['ZipCode'];
    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (FirstName, LastName, ZipCode, Email, Passwords, Hashkey) VALUES ('$first_name','$last_name','$zipcode','$email','$password','$hash')";
    




    // Add user to the database
    if ($mysqli->query($sql) ){
        

       
   $row1=$mysqli->query("SELECT UserID FROM users ORDER BY UserId DESC LIMIT 1");
$row=$row1->fetch_assoc();
$id= $row['UserID'];
$mysqli->query("INSERT INTO contactno VALUES ('$id','$contactno1')");
$mysqli->query("INSERT INTO contactno VALUES ('$id','$contactno2')");


        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://localhost:8080/SalesNepal/Login/verify.php?email='.$email.'&hash='.$hash;  
        $header="From:kuce2k15@gmail.com \r\n";

        $retrieval=mail( $to, $subject, $message_body, $header);
        if ($retrieval==true)
        {
            echo "mail is sent";
        }
        else
        {
            echo "mail is not sent";
        }

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        //header("location: error.php");
    }
    

}

