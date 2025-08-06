<?php
session_start();
?>
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
<!-- <div class="py-5">
    <div class="container">
        <div class="row justify-content-center"> -->
            <!-- <div clas="col-md-6"> -->
      
<!--     
    <div class="card1">
        <div class="card-header"> -->
            <div class='card1'>
            <h5>CHANGE PASSWORD</h5>
</br>
        <div class="card-body p-4">

        <form action="password-reset-code.php" method="POST">
          <input type="hidden" name="password_token" value="<?php if(isset($_GET['verify_token'])){echo $_GET['verify_token'];}?>">

        <div class="form-group mb-3">
                 <label> Email Address</label>
                 </br>
                 <input type="text" name="Email" value="<?php if(isset($_GET['Email'])){echo $_GET['Email'];}?>" class="form-control" placeholder=" Email Address">
        </div></br>
        <div class="form-group mb-3">
                 <label>New  Password</label>
                 </br>
                 <input type="text" name="new_password" class="form-control" placeholder="New Password">
        </div></br>
       <div class="form-group mb-3">
                 <label>confirm Password</label>
                 </br>
                 <input type="text" name="confirm_password" class="form-control" placeholder="Confirm Password">
        </div></br>
          <div class="card1-button">
                <button type="submit" name="password_update" class="card1-button">Change Password</button>
          </div>
            
                 </form>
        </div>
</div>
        <!-- </div>
               </div>    
            </div>
        </div>
    </div> --> 
    </body>
</html>