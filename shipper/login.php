<?php


$email = $mysqli->escape_string($_POST['email']);

$result = $mysqli->query("SELECT * FROM shipperinfo WHERE Email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $accounts = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $accounts['Passwords']) ) {
        
        $_SESSION['Emails'] = $accounts['Email'];
        $_SESSION['First_names'] = $accounts['FirstName'];
        $_SESSION['Last_names'] = $accounts['LastName'];
        $_SESSION['Actives'] = $accounts['active'];
        $_SESSION['ShipperIds'] = $accounts['ShipperID'];
        

        
        // This is how we'll know the user is logged in
        $_SESSION['logged_ins'] = true;

        header("location:profiles.php");
    }
    else {
        echo "You have entered wrong password, try again!";
        
    }
}

