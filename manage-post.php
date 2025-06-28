<?php
require('check-sess-cookies.php');
$email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Blog Website</title>
        <link rel="stylesheet"  href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Monserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
          <nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">SPECTACULAR VIEWS</a>
             <ul class="nav_items">
               <li><a href="blog.php">Blog</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="services.php">Services</a></li>
               <li><a href="contact.php">Contact</a></li>
               
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
               
                
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>
</br>



<?php
// include('check-sess-cookies.php');
 $_SERVER['REQUEST_METHOD'] ==='POST';
 $servername= "localhost";
    $dbname = "triza";
    $dbusername = "root";
    $dbpassword = "";
 $conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);
 
 //check connection
 if(!$conn){
     die("connection failed:" .mysqli_connect_error());
 }
 
 //fetch categories from database
 $query= "SELECT * FROM post ORDER BY Title";
 $post= mysqli_query($conn, $query);


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width", intial-scale="1.0">
        <title>Blog Website</title>
        <link rel="stylesheet"  href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Monserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    </head>
    <body>
          <nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">Health and Lifestyle</a>
             <ul class="nav_items">
               <li><a href="post.php">Post</a></li>
               <li><a href="add-post.php"> Add Post</a></li>
               <li><a href="add-category.php">Add Category</a></li>
               <li><a href="contact.php">Contact</a></li>
               
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
               
                
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>

<section class="dashboard">
<div class="container dashboard_container">
<main>
<h2> Manage Posts</h2>
<table>
    <thead>
        <tr>
            <th>Posts</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php while($id = mysqli_fetch_assoc($post)) : ?>
        <tr>
            <td><?= $id['Title'] ?></td>
            <td> <a href="edit-post.php?id=<?=$id['id'] ?>" class="btn sm">Edit</a></td>
            <td> <a href="delete-post.php?id=<?=$id['id'] ?>" class="btn danger">Delete</a></td>
        </tr>
        <?php endwhile ?>
        
</tbody>
</table>
</main>
</div>
</section>

</br>

          <script src="./main.js"></script>
    </body>
</html>