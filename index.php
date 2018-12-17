<?php
require "header.php";
?>
 <main>
<section class="w3-container">
<br><br><br><br>
<h1><br><br>Welcome!<br><br></h1>
<?php
if(isset($_SESSION['token'])){
  echo '<p >You are Logged IN </p>';

}else{
  echo '<p >You are Logged Out </p>';
}
?>
</section>
 </main>
 <?php
require "footer.php";
?>
 