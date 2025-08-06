
<?php
require('check-sess-cookies.php');

 $email=$_SESSION['Email'];
 if( empty($_SESSION['Email'])){
    header('location:home.php');
    exit();
} 
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

//fetch  all posts from posts table
$query = "SELECT * FROM post ORDER BY  date_time DESC";
$posts = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Health & Lifestyle - Blog</title>
        <link rel="stylesheet" href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            .blog-header {
                background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-variant) 100%);
                padding: 100px 0 60px;
                margin-top: 4.5rem;
                text-align: center;
            }
            
            .blog-title {
                font-size: 3rem;
                color: white;
                margin-bottom: 1rem;
                font-weight: 700;
            }
            
            .blog-subtitle {
                font-size: 1.2rem;
                color: rgba(255, 255, 255, 0.9);
                max-width: 600px;
                margin: 0 auto;
            }
            
            .search_bar {
                background: var(--color-gray-900);
                padding: 40px 0;
                margin: 0;
            }
            
            .posts_section {
                padding: 60px 0;
                background: var(--color-bg);
            }
            
            .posts_container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 2rem;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .posts {
                background: var(--color-gray-900);
                border-radius: 15px;
                overflow: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
                height: auto;
            }
            
            .posts:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
            
            .posts::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--color-primary), var(--color-primary-variant));
            }
            
            .no-posts {
                text-align: center;
                padding: 60px 20px;
                background: var(--color-gray-900);
                border-radius: 15px;
                margin: 2rem auto;
                max-width: 500px;
            }
            
            .no-posts h3 {
                color: var(--color-primary);
                margin-bottom: 1rem;
            }
            
            .categories-section {
                background: var(--color-gray-900);
                padding: 40px 0;
                margin-top: 60px;
            }
            
            .category_button-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
                max-width: 800px;
                margin: 0 auto;
                padding: 0 2rem;
            }
            
            .category_button {
                background: var(--color-primary);
                color: white;
                padding: 12px 20px;
                border-radius: 25px;
                text-align: center;
                transition: all 0.3s ease;
                text-decoration: none;
                font-weight: 600;
            }
            
            .category_button:hover {
                background: var(--color-primary-variant);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(34, 139, 34, 0.3);
            }
        </style>
    </head>
    <body>
          <nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">
                    <i class="uil uil-heart-medical"></i>
                    Health & Lifestyle
                </a>
             <ul class="nav_items">
               <li><a href="index.php"><i class="uil uil-home"></i> Home</a></li>
               <li><a href="about.php"><i class="uil uil-info-circle"></i> About</a></li>
               <li><a href="services.php"><i class="uil uil-medkit"></i> Services</a></li>
               
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face">
                    </div>
                    <div class="user">  
                        <span>Welcome</span>
                    </div>
                </div>
                <ul>
                    <li><a href="dashboard.php"><i class="uil uil-dashboard"></i> Dashboard</a></li>
                    <li><a href="logout.php"><i class="uil uil-signout"></i> Logout</a></li>
                </ul>
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
         </div>
          </nav>

          <!-- Blog Header -->
          <section class="blog-header">
            <div class="container">
                <h1 class="blog-title">Our Blog</h1>
                <p class="blog-subtitle">Discover insights, tips, and inspiration for a healthier lifestyle</p>
            </div>
          </section>
        
         <!-- Search Bar -->
         <section class="search_bar">
            <form class="container search_bar-container" action="search.php" method="GET">
                <div class="search_input_wrapper">
                    <i class="uil uil-search"></i>
                    <input type="search" name="search" class="search_input" placeholder="Search for blog posts..." required>
                </div>
                <button type="submit" name="submit" class="btn search_btn">Search</button>
            </form>
           </section>
          
           <!-- Posts Section -->
           <?php if(mysqli_num_rows($posts) > 0) : ?>
           <section class="posts_section">
            <div class="container">
                <div class="posts_container">
                   <?php while ($post = mysqli_fetch_assoc($posts)): ?> 
                     <article class="posts">
                       <div class="post_thumbnail">
                          <img src="images<?= $post['Thumbnail'] ?>" alt="<?= htmlspecialchars($post['Title']) ?>">
                       </div>
                       <div class="post_info">
                              <h3 class="post_title">
                              <a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['Title']) ?></a>
                          </h3>
                          <p class="post_body">
                          <?= htmlspecialchars(substr($post['Body'], 0, 200)) ?>...
                          </p>
                          <div class="post_author">
                              <div class="post_author-avatar">
                                  <img src="images<?= $post['Thumbnail'] ?>" alt="Author">
                              </div>
                              <div class="post_author-info">
                                  <small>
                                  <i class="uil uil-calendar-alt"></i>
                                  <?= date("M d, Y • H:i", strtotime($post['date_time'])) ?>
                                  </small>
                              </div>
                          </div>
                       </div>
                     </article>
                     <?php endwhile ?> 
                </div>
            </div>
          </section>
          <?php else : ?>
            <section class="posts_section">
                <div class="container">
                    <div class="no-posts">
                        <i class="uil uil-exclamation-triangle" style="font-size: 3rem; color: var(--color-primary); margin-bottom: 1rem;"></i>
                        <h3>No posts found</h3>
                        <p>Check back later for new content or try adjusting your search terms.</p>
                    </div>
                </div>
            </section>
             <?php endif ?>

          <!-- Categories Section -->
          <section class="categories-section">
            <div class="container">
                <h3 style="text-align: center; margin-bottom: 2rem; color: var(--color-white);">Browse by Category</h3>
                <div class="category_button-container">
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-apple-alt"></i> Nutrition
                  </a>
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-dumbbell"></i> Fitness
                  </a>    
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-brain"></i> Mental Health
                  </a> 
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-heartbeat"></i> Wellness
                  </a> 
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-bed-double"></i> Sleep
                  </a> 
                  <a href="blog.php" class="category_button">
                      <i class="uil uil-yoga"></i> Meditation
                  </a> 
                </div>
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
                    <h4>Quick Links</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="services.php">Services</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Categories</h4>
                        <ul>
                            <li><a href="blog.php">Nutrition</a></li>
                            <li><a href="blog.php">Fitness</a></li>
                            <li><a href="blog.php">Mental Health</a></li>
                            <li><a href="blog.php">Wellness</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Support</h4>
                        <ul>
                            <li><a href="mailto:support@healthlifestyle.com">Email Support</a></li>
                            <li><a href="tel:+1234567890">Call Us</a></li>
                            <li><a href="about.php">FAQ</a></li>
                            <li><a href="about.php">Help Center</a></li>
                        </ul>
                </article>
                <article>
                    <h4>Follow Us</h4>
                        <ul>
                            <li><a href="#" target="_blank">Facebook</a></li>
                            <li><a href="#" target="_blank">Instagram</a></li>
                            <li><a href="#" target="_blank">Twitter</a></li>
                            <li><a href="#" target="_blank">YouTube</a></li>
                        </ul>
                </article>
              </div>
              <div class="footer_copyright">
                <small>Copyright &copy; <?= date('Y') ?> Health & Lifestyle • Made with ❤️ for your wellness journey</small>
              </div>
          </footer>
          <script src="./main.js"></script>
    </body>
</html>
