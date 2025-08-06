
<?php
 session_start();
// require 'check-sess-cookies.php';
// $email=$_SESSION['Email'];
//  if( empty($_SESSION['Email'])){
//     header('location:home.php');
//     exit();
// }
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

if(isset($_POST['login'])){
    $user_email =$_POST['Email'];
if($user_email == "Email"){
    if(isset($_POST['remember']));
}}
 
$featured_query= "SELECT * FROM post WHERE is_featured=1";
$featured_result =mysqli_query($conn,$featured_query);
$featured =mysqli_fetch_assoc($featured_result);

//fetch 9 posts from posts table
$query = "SELECT * FROM post ORDER BY date_time DESC LIMIT 9";
$posts=mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Health and Lifestyle - Your Wellness Journey Starts Here</title>
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <style>
            /* Enhanced styles for better UI */
            .hero-section {
                background: linear-gradient(135deg, #1B4332 0%, #2d5a3d 50%, #40916c 100%);
                padding: 80px 0;
                margin-top: 4.5rem;
                position: relative;
                overflow: hidden;
            }
            
            .hero-section::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="80" cy="40" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="40" cy="80" r="1.5" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>') repeat;
                opacity: 0.3;
            }
            
            .hero-content {
                position: relative;
                z-index: 2;
                text-align: center;
                color: white;
            }
            
            .hero-title {
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
                background: linear-gradient(45deg, #90EE90, #98FB98, #FFFFFF);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                text-shadow: none;
            }
            
            .hero-subtitle {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                opacity: 0.9;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                line-height: 1.6;
            }
            
            .cta-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
                margin-top: 2rem;
            }
            
            .cta-btn {
                padding: 12px 30px;
                border-radius: 50px;
                text-decoration: none;
                font-weight: 600;
                transition: all 0.3s ease;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }
            
            .cta-btn.primary {
                background: linear-gradient(45deg, #228B22, #32CD32);
                color: white;
                box-shadow: 0 4px 15px rgba(34, 139, 34, 0.4);
            }
            
            .cta-btn.secondary {
                background: transparent;
                color: white;
                border: 2px solid rgba(255, 255, 255, 0.3);
            }
            
            .cta-btn:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            }
            
            .section-header {
                text-align: center;
                margin-bottom: 3rem;
            }
            
            .section-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--color-white);
                margin-bottom: 1rem;
            }
            
            .section-subtitle {
                font-size: 1.1rem;
                color: var(--color-gray-200);
                max-width: 600px;
                margin: 0 auto;
            }
            
            .featured-badge {
                display: inline-block;
                background: linear-gradient(45deg, #FF69B4, #FFB6C1);
                color: white;
                padding: 5px 15px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
                margin-bottom: 1rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            
            .featured .post {
                background: linear-gradient(135deg, var(--color-gray-900) 0%, #2F4F4F 100%);
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
                transition: all 0.3s ease;
            }
            
            .featured .post:hover {
                transform: translateY(-10px);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
            }
            
            .stats-section {
                background: var(--color-gray-900);
                padding: 60px 0;
                margin: 60px 0;
            }
            
            .stats-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 2rem;
                max-width: 800px;
                margin: 0 auto;
            }
            
            .stat-item {
                text-align: center;
                padding: 2rem;
                background: rgba(255, 255, 255, 0.05);
                border-radius: 15px;
                backdrop-filter: blur(10px);
            }
            
            .stat-number {
                font-size: 3rem;
                font-weight: 700;
                color: var(--color-primary);
                display: block;
            }
            
            .stat-label {
                color: var(--color-gray-200);
                font-size: 1rem;
                margin-top: 0.5rem;
            }
            
            .floating-elements {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
                pointer-events: none;
            }
            
            .floating-icon {
                position: absolute;
                color: rgba(255, 255, 255, 0.1);
                font-size: 2rem;
                animation: float 6s ease-in-out infinite;
            }
            
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(180deg); }
            }
            
            .posts-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 2rem;
                margin-top: 2rem;
            }
            
            .post-card {
                background: var(--color-gray-900);
                border-radius: 15px;
                overflow: hidden;
                transition: all 0.3s ease;
                position: relative;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }
            
            .post-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
            
            .post-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--color-primary), var(--color-primary-variant));
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
               <li><a href="blog.php"><i class="uil uil-blog"></i> Blog</a></li>
               <li><a href="about.php"><i class="uil uil-info-circle"></i> About</a></li>
               <li><a href="services.php"><i class="uil uil-medkit"></i> Services</a></li>
              
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="<?= isset($featured['Thumbnail']) ? 'images'.$featured['Thumbnail'] : 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face' ?>">
                    </div>
                    <div class="user">  
                        <span style="font-size: 0.9rem;">Welcome</span>
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

          <!-- Hero Section -->
          <section class="hero-section">
            <div class="floating-elements">
                <i class="floating-icon uil uil-heart-medical" style="top: 20%; left: 10%; animation-delay: 0s;"></i>
                <i class="floating-icon uil uil-dumbbell" style="top: 60%; right: 15%; animation-delay: 2s;"></i>
                <i class="floating-icon uil uil-apple-alt" style="bottom: 30%; left: 20%; animation-delay: 4s;"></i>
            </div>
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title">Transform Your Life</h1>
                    <p class="hero-subtitle">
                        Discover the perfect balance of health and lifestyle. Join thousands of people on their journey to wellness, fitness, and vibrant living.
                    </p>
                    <div class="cta-buttons">
                        <a href="blog.php" class="cta-btn primary">
                            <i class="uil uil-rocket"></i>
                            Start Your Journey
                        </a>
                        <a href="about.php" class="cta-btn secondary">
                            <i class="uil uil-play-circle"></i>
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
          </section>

          

          <!-- Featured Post Section -->
          <?php if(mysqli_num_rows($featured_result) == 1) : ?>
           <section class="featured">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Featured Article</h2>
                    <p class="section-subtitle">Our top pick for your wellness journey</p>
                </div>
                <div class="post">
                    <div class="featured-badge">
                        <i class="uil uil-star"></i>
                        Featured
                    </div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: center;">
                        <div class="post_thumbnail">
                            <img src="images<?= $featured['Thumbnail'] ?>" alt="<?= htmlspecialchars($featured['Title']) ?>">
                        </div>
                        <div class="post_info">
                            <h2 class="post_title">
                                <a href="post.php?id=<?= $featured['id'] ?>"><?= htmlspecialchars($featured['Title']) ?></a>
                            </h2>
                            <p class="post_body">
                                <?= htmlspecialchars(substr($featured['Body'], 0, 300)) ?>...
                            </p>
                            <div class="post_author">
                                <?php 
                                $author_id = $featured['id'];
                                $author_query = "SELECT * FROM users WHERE id=$author_id";
                                $author_result = mysqli_query($conn, $author_query);
                                $author = mysqli_fetch_assoc($author_result);
                                ?>
                                <div class="post_author-avatar">
                                    <img src="images<?= $featured['Thumbnail'] ?>" alt="Author">
                                </div>
                                <div class="post_author-info">
                                    <small>
                                        <i class="uil uil-calendar-alt"></i>
                                        <?= date("M d, Y • H:i", strtotime($featured['date_time'])) ?>
                                    </small>
                                </div>
                            </div>
                            <a href="post.php?id=<?= $featured['id'] ?>" class="cta-btn primary" style="margin-top: 1rem; display: inline-flex;">
                                Read Full Article
                                <i class="uil uil-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
          </section>
          <?php endif ?>

          <!-- Latest Posts Section -->
          <section class="latest-posts" style="padding: 60px 0; background: var(--color-bg);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Latest Articles</h2>
                    <p class="section-subtitle">Stay updated with our newest health and lifestyle content</p>
                </div>
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
                                <?= htmlspecialchars(substr($post['Body'], 0, 150)) ?>...
                            </p>
                            <div class="post_author">
                                <div class="post_author-avatar">
                                    <img src="images<?= $post['Thumbnail'] ?>" alt="Author">
                                </div>
                                <div class="post_author-info">
                                    <small>
                                        <i class="uil uil-clock"></i>
                                        <?= date("M d, Y", strtotime($post['date_time'])) ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endwhile ?> 
                </div>
                
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="blog.php" class="btn" style="background: var(--color-primary); color: white; padding: 12px 30px; border-radius: 25px; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                        <i class="uil uil-arrow-right"></i>
                        View All Articles
                    </a>
                </div>
            </div>
          </section>

          <!-- Categories Section -->
          <section class="category_button" style="padding: 60px 0; background: var(--color-gray-900);">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Explore Categories</h2>
                    <p class="section-subtitle">Find content that matches your interests</p>
                </div>
                <div class="category_button-container" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; max-width: 800px; margin: 0 auto;">
                    <?php 
                    $all_categories_query = "SELECT * FROM category";
                    $all_categories = mysqli_query($conn, $all_categories_query);
                    ?>
                    <?php while($category = mysqli_fetch_assoc($all_categories)): ?>
                    <a href="category-post.php?id=<?= $category['id'] ?>" class="category_button" style="display: flex; align-items: center; justify-content: center; padding: 1rem; transition: all 0.3s ease;">
                        <i class="uil uil-tag-alt" style="margin-right: 0.5rem;"></i>
                        <?= htmlspecialchars($category['Title']) ?>
                    </a> 
                    <?php endwhile ?>
                </div>
            </div>
          </section>

          <footer>
            <div class="footer_socials">
                <a href="https://youtube.com/egatortutorials" target="_blank" aria-label="YouTube"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/egatortutorials" target="_blank" aria-label="Facebook"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/egatortutorials" target="_blank" aria-label="Instagram"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/egatortutorials" target="_blank" aria-label="LinkedIn"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/egatortutorials" target="_blank" aria-label="Twitter"><i class="uil uil-twitter"></i></a>
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
                            <li><a href="blog.php">Health Tips</a></li>
                            <li><a href="blog.php">Nutrition</a></li>
                            <li><a href="blog.php">Fitness</a></li>
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
