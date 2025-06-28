<?php

 require('check-sess-cookies.php');
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User details</title>
    <link rel="stylesheet" href="display_style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  
 <div class="container"> 
 
<button type="submit" name="submit" class="btn btn-primary my-5"><a href="user.php" class= "text-light">Add user</a></button>
 

<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>



  <?php
$sql="SELECT *FROM users";
$result=mysqli_query($conn,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['Id'];
        $user_name =$row['Name'];
        $email =$row['Email'];
        $phone =$row['Phone'];
        echo'<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$user_name.'</td>
        <td>'.$email.'</td>
        <td>'.$phone.'</td>
        <td>
        <button class="btn btn-primary"><a href="user_update.php? updateid='.$id.'" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="user_delete.php? deleteid='.$id.'" class="text-light">Delete</a></button>
     </td>
       </tr>';
    }
}


  ?>
 
  </tbody>
</table>

 </div>

</body>
</html>