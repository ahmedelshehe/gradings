<?php
require "header.php";
?>
<br><br><br><br><br><br>
 <main>
<div class="wrapper-main">
<section class="section-default">
<h1>Sign Up</h1>
<form class="form-signup"action="signupcont.php" method="post">
<input type="text" name ="username" placeholder="Username" >
<input type="password" name ="password" placeholder="Password" >
<input type="password" name ="cpassword" placeholder="Confirm Password" >


  <select name="types" >
    <option value="Lecturer">Lecturer</option>
    <option value="TA">TA</option>
    <option value="Student">Student</option>
    
  </select>
  <br><br>


<button type="submit" name ="signup">Sign Up</button>
</form>
</section>
</div>
 </main>
 <?php
require "footer.php";
?>
 