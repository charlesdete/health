<?php
session_start();
// $email=$_SESSION['Email'];
//  if( empty($_SESSION['Email'])){
//     header('location:home.php');
//     exit();
// }
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
               <li><a href="blog.php">Blog</a></li>
               <li><a href="add-post.php"> Add Post</a></li>
               <li><a href="add-category.php">Add Category</a></li>
              
               
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
 $query= "SELECT * FROM category ORDER BY Title";
 $categories= mysqli_query($conn, $query);

 if(isset($_GET['search'])){

    $query = "SELECT * FROM category WHERE Title LIKE '%SEARCH%' ORDER BY Category_id DESC";
    $category = mysqli_query($conn, $query); 
    $search =mysqli_num_rows($category);
     
    if($search > 0){
        while($row = mysqli_fetch_assoc($category)){
            echo "<div>
            <h3>".$row['Title']."</h3>
            <p>".$row['Description']."</p>
             </div>";
        }
    }
}else{
    //  header('location:add-category.php');
    //  die();
}
?>

<section class="dashboard">
    
<div search-me>
                    <i class="uil uil-search"></i>
                    <input type="search" name="search"class="input-style" placeholder="search">
                    </div>
                    <button type="submit" name="search" class="button">Go</button>
                   
                    
      <div class="container dashboard_container">
<main>
<h2> Manage Categories</h2>
<table>
    <thead>
        <tr>
            <th>Categories</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php while($category_id = mysqli_fetch_assoc($categories)) : ?>
        <tr>
            <td><?= $category_id['Title'] ?></td>
            <td> <a href="edit-category.php?id=<?=$category_id['id'] ?>" class="btn sm">Edit</a></td>
            <td> <a href="delete-category.php?id=<?=$category_id['id'] ?>" class="btn danger">Delete</a></td>
        </tr>
        <?php endwhile ?>
        
</tbody>
</table>
</main>
</div>
</section>
</br>
        </div>

<footer>
            <div class="footer_socials">
                <a href="https://youtube.com/egatortutorials" target="_blank"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/egatortutorials" target="_blank"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/egatortutorials" target="_blank"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/egatortutorials" target="_blank"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/egatortutorials" target="_blank"><i class="uil uil-twitter"></i></a>
            </div> 
            <div class="container footer_container">
                <article>
                    <h4>Categories</h4 >
                        <ul>
                            <li><a href="">Art</a></li>
                            <li><a href="">Wild Life</a></li>
                            <li><a href="">Travel</a></li>
                            <li><a href="">Music</a></li>
                            <li><a href="">Science & Technology</a></li>
                            <li><a href="">Food</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Support</h4 >
                        <ul>
                            <li><a href="">Online Support</a></li>
                            <li><a href="">Call Numbers</a></li>
                            <li><a href="">Email</a></li>
                            <li><a href="">Social Numbers</a></li>
                            <li><a href="">Social Support</a></li>
                            <li><a href="">Location</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Blog</h4 >
                        <ul>
                            <li><a href="">Safety</a></li>
                            <li><a href="">Repair</a></li>
                            <li><a href="">Recent</a></li>
                            <li><a href="">Popular</a></li>
                            <li><a href="">Categories</a></li>
                            
                        </ul>
                </article>
                <article>
                    <h4>Permalinks</h4 >
                        <ul>
                            <li><a href="">Home</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">About</a></li>
                            <li><a href="">Services</a></li>
                            <li><a href="">Contact</a></li>
                        </ul>
                </article>
              </div>
              <div class="footer_copyright">
                <small>Copyright &copy;SPECTACULAR VIEWS </small>
              </div>
          </footer>
          <script src="./main.js"></script>
    </body>
</html>