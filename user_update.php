<?php
// require('check-sess-cookies.php');
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
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());

}

if(isset($_POST['submit'])){
$id=filter_var($_GET['updateid']);
$sql ="SELECT * FROM users where Id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

//  $user_name= $row['Name'];
//  $email=$row['Email'];
//  $phone=$row['phone'];

 
 $user_name= $_POST['Name'];
 $email=$_POST['Email'];
 $phone=$_POST['Phone'];


 $sql="UPDATE users set  Id=$id, Name ='$user_name',Email='$email'  WHERE Id=$id";
 $result= mysqli_query($conn,$sql);
 if($result){
    echo'user details updated successfully';
 }else{
    die(mysqli_error($conn));
 }
 header('location:display.php');
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
 <div class="card2 "> 
 <div class="card-header">
      <h2>Update user!</h2>
      </div>
 <form action="" method="POST">
          
             <label>Name</label>
               <input type="text" name="Name" placeholder="Enter your name" value="" class="input-style">
               <label> Email</label>
               <input type="email" name="Email" placeholder="Enter your email" value="" class="input-style">
               <label> Phone </label>
               <input type="phone number" name="phone" placeholder="Enter your mobile number" value="" class="input-style">
             <br/>
           <button type="submit" name="submit" class="button">Update</button>
      
  </form> 
   </div>
     </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth - Registration</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
   <nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">Health and Lifestyle</a>
             <ul class="nav_items">
               <li><a href="blog.php">Blog</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="services.php">Services</a></li>
              
              
                 <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
                </div>
            
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div clas="col-md-6">
            <div class="card2">
        <div class="card-header">
            <h5>UPDATE USER</h5>
        </div>
        <form action="" method="POST">
           <div class="form-group">
           <label>Name</label>
               <input type="text" name="Name" placeholder="Name" class="input-style">
                 <label> Email Address</label>
                 </br>
                 <input type="text" name="Email" class="input-style" placeholder="Enter Email Address">
                 <label> Phone number </label>
                 <input type="phone number" name="Phone"placeholder="phone number" class="input-style">
                <button type="submit" name="submit" class="button">Update User</button>
          </div>
         </form>
             </div>
               </div>
                 </div>    
                   </div>
                     </div>
</body>
</html>