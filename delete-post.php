<?php

require('check-sess-cookies.php');
 $_SERVER['REQUEST_METHOD'] ==='POST';
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}

if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

//fetch from database inorder to delete thumbnail from images folder
$query ="SELECT * FROM post WHERE id=$id";
$result = mysqli_query($conn,$query);

//only 1 record /post was fetched
if(mysqli_num_rows($result)==1 ){
    $post =mysqli_fetch_assoc($result);
    $thumbnail_name = $post['Thumbnail'];
    $thumbnail_path = '../images/' .$thumbnail_name;


    if($thumbnail_path){
       unlink($thumbnail_path);
       
       
       //delete post from database
       $delete_post_query ="DELETE FROM post WHERE id=$id LIMIT 1";
       $delete_post_result = mysqli_query($conn,$delete_post_query);


     if(!mysqli_errno($conn)){
        $_SESSION['delete-post-success'] = "Post deleted successfuly";

             }

        }
    }
}

header('location:manage-post.php')
?>