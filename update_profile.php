<?php
session_start();
$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
// require('check-sess-cookies.php');
include('db_conn.php');
session_start();
$user_id =$_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login.php');
};
if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device width, intial-scale=1.0">
        <link rel="stylesheet" href="style1.css">
        <title>Update Profile</title>
</head>
<body>
    <div class="update_profile">
    <?php
     $select= mysqli_query($conn, "SELECT* FROM 'users' WHERE id= '$user_id'")
     or die('query failed');
     if(mysqli_num_rows($select) > 0){
        $fetch =mysqli_fetch_assoc($select);
     }
     if ($fetch['image'] == ''){
        echo'<img src ="<images/default-avatar.png">'; 
     }else{
        echo'<img src="uploaded_img/'.$fetch['image'].'">';
     }
    ?>

</div>
</body>
</html>