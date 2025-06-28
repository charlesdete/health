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
               <li><a href="manage-post.php">Manage Post</a></li>
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
                </div>
            
                
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>   
          
          

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
          //fetch post from database if id  is set
          if(isset($_GET['id'])){
            $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
            $query = "SELECT * FROM post WHERE  id=$id";
            $result = mysqli_query($conn, $query);
            $post=mysqli_fetch_assoc($result);
            }else{
               // header('location:blog.php');
               // die();
            } 
?>
          <section class="singlepost">
            <div class="container singlepost_container">
                <h2>
                    <?php if (isset($post)) : ?>
    <h2><?= htmlspecialchars($post['Title']) ?></h2>
<?php else : ?>
    <h2>Post not found</h2>
<?php endif; ?>

            </h2>
                <div class="post_author">
                <div  class="post_author-avatar">
               <?php 
                //fetch author from users table using id
                $author_id=$post['Author_id'];
                $author_query = "SELECT * FROM users WHERE id=$author_id";
                $author_result =  mysqli_query($conn,$author_query);
               $author = mysqli_fetch_assoc($author_result);
               
               ?>
               
                <div  class="post_author-avatar">
                     <img src="images<?= $post['Thumbnail'] ?>">
                      </div></br>
                      <div class="post_author-info">
                        <h5>by: <?$author['Name'] ?></h5>
                        <small>
                            <?= date("M d, Y = H:i",strtotime($post['date_time'])) ?>
                        </small>
                    </div></br></br>
                   
                    </div>
                </div>
                <div class="singlepost_thumbnail">
               <img src="images<?= htmlspecialchars($post['Thumbnail']) ?>">

                </div>
            <p> <?=substr( $post['Body'],0, 300) ?>...</p>
            </div>
          </section>
          <!---end of singlepost-->

          <section class="category_button">
            <div class="container category_button-container">
                <?php 
              $all_categories_query= "SELECT * FROM category";
              $all_categories = mysqli_query($conn,$all_categories_query);
                ?>
                <?php while($category = mysqli_fetch_assoc($all_categories)): ?>
                <a href="category-post.php?id=<?=$category_id['id'] ?>" class="category_button"><?= $category['Title'] ?></a> 
                <?php endwhile ?>
            </div>
          </section>

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