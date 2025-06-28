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
 
$conn =new mysqli($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
 
//fetch all thumbnails of user`s posts and delete them
$id=filter_var($_GET['deleteid'], FILTER_SANITIZE_NUMBER_INT);
$thumbnail_query= "SELECT Thumbnail FROM post WHERE id=$id";
$thumbnail_result = mysqli_query($conn,$thumbnail_query);

if(mysqli_num_rows($thumbnail_result) > 0){
    while ($thumbnail = mysqli_fetch_assoc($thumbnail_result))
    {
      $thumbnail_path ='images' . $thumbnail['Thumbnail']; 
      //delete thumbnail from images folder exist
      if($thumbnail_path){
        unlink($thumbnail_path);
      }
    }
}




if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];


    
    $sql="delete from users where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo'deleted successfull';
    }else{
        die(mysqli_error($conn));
    }
    header('location:display.php');
}

?>