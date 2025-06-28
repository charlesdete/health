<?php
session_start();

$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
 function send_password_reset($get_email,$token){

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'charlesdete52@gmail.com';                     //SMTP username
    $mail->Password   = 'lrkxkwvmisnyptrp';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('charlesdete52@gmail.com', );
    $mail->addAddress($get_email ,'charles');     //Add a recipient
   
    

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    //Set email format to HTML
    $verification_code= substr(number_format(time()* rand(),0,'',''),0,6);
    $mail->Subject = 'Email verification';
    $mail->Body    = '<p> Your verification code is:</br><b style="font-size: 30px;">'.
    $verification_code . '</b></p>';
    
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      
    $mail->send();
 }
 
 if(isset($_POST['Password-reset-otp'])){
    $email=mysqli_real_escape_string($conn,$_POST['Email']);
    $token =md5(rand());
 
   
    $check_email="SELECT Email FROM users WHERE Email='$email' LIMIT 1";
    $check_email_run=mysqli_query($conn,$check_email);

   
    if(mysqli_num_rows($check_email_run)> 0){
      
        $row = mysqli_fetch_array($check_email_run);
      
        $get_email=$row['Email'];

        $update_token ="UPDATE users SET verify_token='$token' WHERE Email='$get_email' LIMIT 1";
        $update_token_run=mysqli_query($conn,$update_token);
      
        if($update_token_run)
        {
            send_password_reset($get_email,$token);
            $_SESSION['status'] = "We email you a password reset link";
           header("location:email-verify.php");
           exit();
        } else
        {
           $_SESSION['status'] = "No email found";
           header("location:reset-password.php");
           exit(0);
    
        }
    }
    else
    {
       $_SESSION['status'] = "No email found";
       header("location:reset-password.php");
       exit();

    }


 }


if(isset($_POST['password_update'])){
    $email =mysqli_real_escape_string($conn,$_POST['Email']);
    $new_password =mysqli_real_escape_string($conn,$_POST['new_password']);
    $confirm_password =mysqli_real_escape_string($conn,$_POST['confirm_password']);
    $token =mysqli_real_escape_string($conn,$_POST['password_token']);

    if(!empty($token))
    {
     if(!empty($email) && !empty($new_password) && !empty($confirm_password))
     {
      //checking if the token is valid or not
       $check_token="SELECT verify_token FROM users WHERE verify_token='$token' LIMIT 1";
       $check_token_run=mysqli_query($conn,$check_token);
       
       if(mysqli_num_rows($check_token_run) > 0)
       {

          if($new_password == $confirm_password)
          {

          $update_password ="UPDATE users SET  password='$new_password' WHERE verify_token='$token' LIMIT 1 ";
          $update_password_run=mysqli_query($conn,$update_password);
               
          if($update_password_run)
          {
            $_SESSION['status']="New password successfully";
            header("location:password-change.php");
            exit(0);
          }else
          {
            $_SESSION['status']="Did not update password. Something went wrong";
            header("location:password-change.php?token=$token&Email=$email");
            exit(0);
          }
          }

       }else
       {
        $_SESSION['status']="password and confirm password does not match";
        header("location:password-change.php?token=$token&Email=$email");
        exit(0);
       }
    }else{
        $_SESSION['status']="Invalid Token";
        header("location:password-change.php?token=$token&Email=$email");
        exit(0);
     }

    }else
    {
        $_SESSION['status']="no token available";
        header('location:password-change.php');
        exit(0);
    }
}
?> 