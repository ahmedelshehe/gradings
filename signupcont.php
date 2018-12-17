<?php
if(isset($_POST['signup'])){
    require "dbh.php";

    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $type=$_POST['types'];
    if (empty($username)|| empty($password) || empty($cpassword)||empty($type)) {
        header('Location:http://localhost/signup.php?error=missingvalues');
        exit();
    }else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header('Location :http://localhost/signup.php?error=invalidusername');
        exit();

    }else if($password!==$cpassword){
        header('Location:http://localhost/signup.php?error=passworderror');
        exit();
    }
    else{
        $sql="SELECT username FROM user WHERE username=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('Location:http://localhost/signup.php?error=sqlerror');
        exit();

        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultcheck=mysqli_stmt_num_rows($stmt);
            if ($resultcheck>0) {
                header("Location : http://localhost/signup.php?error=usertaken");
                exit();
            }
            else{
                $sql="INSERT INTO user (username,password,type) VALUES (?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    header('Location:http://localhost/signup.php?error=sqlerror');
                exit();
        
                }else{
                    $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"sss",$username,$hashedpassword,$type);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    header('Location:http://localhost/signup.php?signup=success');
                    exit();


                }


            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}else{
    header("Location : signup.php");
    exit();
}