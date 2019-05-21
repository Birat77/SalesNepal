<?php
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE Email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
}

else { // User exists
    $accounts = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $accounts['Passwords']) ) {
        
        $_SESSION['email'] = $accounts['Email'];
        $_SESSION['first_name'] = $accounts['FirstName'];
        $_SESSION['last_name'] = $accounts['LastName'];
        $_SESSION['active'] = $accounts['active'];
        $_SESSION['role'] = $accounts['Role'];
        $_SESSION['userId'] = $accounts['UserID'];
        

        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

