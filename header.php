<?php 

session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Grading System</title>
  <meta name="description" content="Grading system">
  <meta name=viewport content="width=device-width, inintial-scale=1">
  

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6,input {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
form { 
margin: 0 auto; 
width:250px;
}
</style>


</head>

<body>
  
<header class="w3-container w3-teal">
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Profile</a>
    <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">login</a>
    <?php
if(isset($_SESSION['token'])){
  echo '<form action="logout.php" method="post">

  <button type="submit" name ="logout" class="w3-right-align w3-large">Log Out</button>
  
  
  </form>';

}else{
  echo '<form action="login.php" method="post" class="w3-container w3-left-align ">
  <div class="w3-left-align w3-small header-login" style="margin:0 -16px;">
            <div class="w3-half w3-margin-bottom">
              
              <input class="w3-input w3-border" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="w3-half">
            
              <input class="w3-input w3-border" type="password" placeholder="password..." name="password" required>
            </div>
            <button type="submit" name ="login" class="w3-right-align w3-large">Log In</button>
  
  <a href="signup.php">signup</a>
            
  
  </form>';
}
?>
    




</div>
    
  </div>
  

</div>

</header>