<?php 
/* Main page with two forms: sign up and log in */
require '../db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style >
*{
  margin-top:0px ;

}
  input {
    padding: 12px 20px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    width:400px;
  }
  button{
    background-color: #555555;  padding: 10px 25px;
    text-align: center; 
    text-decoration: none; color:white ; border-radius: 10px; 
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
</style>
  <title>Sign-Up/Login Form</title>
  
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
<div id="wrapper">
  <div id="header">
    <span id="salenepal">Sale-Nepal</span>
    <span style="float: right">    
      </div>
    </span>

  </div>
  <div class="form" style="background-color: #999999">
      
      
      
      <div class="tab-content" style="margin-left: 30%; margin-right:20%; padding: 50px; background-color: #ffffff;width: 700px; border-radius: ;">

        <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="index1.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address <span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div><br>
          
          <div class="field-wrap">
            <label >
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" style="margin-left: 38px;" />
          </div>
          
          <p class="forgot"><a href="forgot.php" style=" color: red;">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>

        </div>
        <hr>
        <div id="signup">   
          <h1>Sign Up for Free</h1>
          
          <form action="index1.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' style="margin-left: 29px;" />
            </div>
            <br>
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' style="margin-left: 30px;" />
            </div>
          </div>
          <br>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' style="margin-left: 6px;" />
          </div>
          
          <div class="field-wrap">
            Address:

            <select name="address">
            <?php $row=$mysqli->query("SELECT City FROM address");
            while($row1=$row->fetch_assoc())
            {
              ?>
              <option><?php echo $row1['City'];?></option>
              <?php
            }
            ?>

             </select>
          </div>
          <div class="field-wrap">
            <label>
              Contact No 1:<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off" name='contactno1' style="margin-left: 10px;" />
          </div><br>
          <div class="field-wrap">
            <label>
              Contact No 2:<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off" name='contactno2' style="margin-left:10px;" />
          </div><br>
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register" />Register</button>
          
          </form>

        </div>  
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
  

</body>
</html>
