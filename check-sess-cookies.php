<?php
session_start();
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
 //check if a cookie was created and a user-session was started
//  $email=$_SESSION['Email'];

if(!isset($_SESSION)){
    
    $email=$_SESSION['Email'];
    $query ="SELECT * FROM users WHERE Email='$email'";
    $query_result=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($query_result);
    $_SESSION['Email']=$email;
    $_SESSION['Id']=$result['Id'];
    //set cookie that will be used to auto login a user.
     setcookie('Email',md5($email),time()+3600);
     setcookie('Id', md5($result['Id']),time()+3600);

}elseif(empty($_COOKIE) && empty($_SESSION['Id']))
    {
     setcookie($email,"",time()-3600);
      unset($_SESSION['Id']);
      unset( $_SESSION['Email']);
         header("location:login.php");
         die();

        
    }
elseif(!empty($_COOKIE) && !empty($_SESSION['Id'])){
echo 'You are still logged in';
}


?>