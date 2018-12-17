<?php
 
if(isset($_POST['login'])){

    require "dbh.php";
    require "jwt.php";
    $username=$_POST['username'];
    $password=$_POST['password'];
    if (empty($username)|| empty($password) ) {
        header('Location:http://localhost/index.php?error=missingvalues');
        exit();
    }else{
        $str="SELECT * FROM user WHERE username=?;";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$str)){
            header('Location:http://localhost/index.php?error=sqlerror');
        exit();
        }else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            $result= mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result)){
                $passwordcheck=password_verify($password,$row[password]);
                if($passwordcheck==false){
                    header('Location:http://localhost/index.php?error=wrongpassword');
                    exit();
                   

                }else if($passwordcheck==true){
                   
                    session_start();
                    
                    $token=JWT::encode($username, 'secret_server_key');
                    $_SESSION['token']=$token;
                    
                    

                    header('Location:http://localhost/index.php?login=success');
                    exit();
                }


            }
        }
    }
}else{
    header('Location:http://localhost/index.php');
    exit();
}