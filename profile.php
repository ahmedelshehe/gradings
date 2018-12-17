<?php
require "header.php";
require "dbh.php"

?>


 <main>
<section class="w3-container">
<br><br><br><br>
<h1><br><br>Your Profile<br><br></h1>
<?php
if(isset($_SESSION['token'])){
 require "jwt.php";
  $dtoken=JWT::decode($_SESSION['token'], 'secret_server_key');
  

  $str="SELECT * FROM user WHERE username=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$str)){
            echo $dtoken;
        exit();
    }else {
        mysqli_stmt_bind_param($stmt,"s",$dtoken);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result)){
                $sId=$row['id'];
                
            if($row['type']=='Student'){

                $strgrade="SELECT grade FROM studentgrade WHERE userId=?;";
                if(!mysqli_stmt_prepare($stmt,$str)){
                    echo $dtoken;
                exit();
            }else{
                mysqli_stmt_bind_param($stmt,"i",$sId);
                mysqli_stmt_execute($stmt);
                $resultg= mysqli_stmt_get_result($stmt);
                print $resultg;
                if($rowg=mysqli_fetch_assoc($resultg)){
                    echo $rowg['grade'];

                }else{
                    
                    echo '<p>HIWO</p>';
                    
                }
            }

            }

            }
        

        }


}else{
  echo '<p >You are Logged Out </p>';
}
?>
</section>
 </main>
 <?php
require "footer.php";
?>
 