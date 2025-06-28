<?php
session_start();
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

    //UPDATE category_id of posts that belong to this category to id of uncategorized category
    $update_query = "UPDATE posts SET category_id  WHERE category_id=$id";
    $update_result = mysqli_query($conn,$update_query);
   if(!mysqli_errno($conn)){
    //delete category
    $query = "DELETE FROM categories WHERE id=$id LIMIT 1";
    $result = mysqli_query($conn,$query);
    $_SESSION['delete-category-success'] = "Category deleted successfully";
 
   }
}
 header('location:manage-categories.php');
 die();
 ?>