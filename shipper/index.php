<?php
include '../db.php';
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
  <title>Login/Register</title>
  <meta charset="utf-8">
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
<div class="form">
      
      <div class="tab-content" style="margin-left: 30%; margin-right:20%; padding: 50px; background-color: #ffffff;width: 700px; border-radius: ;">
         <div id="login">   
          <h1>Shipper Login</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="off" name="email"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" style="margin-left: 34px;" />
          </div>
          
          <p class="forgot"><a href="forgot.php" style=" color: red;">Forgot Password?</a></p>
          
          <button class="button button-block" name="login" />Log In</button>
          
          </form>
        </div>
          
         <hr style="color: black;"> 
        <div id="signup">   
          <h1>Shipper SignUp</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' style="margin-left: 29px;"/>
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' style="margin-left: 31px;" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' style="margin-left: 6px;" />
          </div>
          <div class="field-wrap">
            <label>
              Address<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='address' style="margin-left: 49px;" />
          </div>
          <div class="field-wrap">
            <label>
              Contact No<span class="req">*</span>
            </label>
            <input type="number"required autocomplete="off" name='contactno' style="margin-left: 28px;"/>
          </div>
          <div class="field-wrap">
            <label>
              Vehicle<span class="req">*</span>
            </label>
            <SELECT name="Vehicle">
              <OPTION value="CAR">CAR</OPTION>
              <OPTION value="BIKE">BIKE</OPTION>
              <OPTION value="JEEP">JEEP</OPTION>
            </SELECT>
          </div>
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