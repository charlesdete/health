<?php
   session_start();
  
$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
// require('check-sess-cookies.php');
 if(!empty($_SESSION['user_id']))
 {
  setcookie($cookie_email,"",time()-3600);
   unset($_SESSION['user_id']);
 }
   unset( $_SESSION['Email']);
   
   header('location:home.php');
   exit();
?>