
<?php
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die("connection failed:" . mysqli_connect_error());
}

// Get category posts
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM post WHERE Category_id=$id ORDER BY date_time DESC";
    $posts = mysqli_query($conn, $query);
    
    // Get category title
    $category_query = "SELECT * FROM category WHERE id=$id";
    $category_result = mysqli_query($conn, $category_query);
    $category = mysqli_fetch_assoc($category_result);
} else {
    header('location: blog.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($category['Title']) ?> - Health & Lifestyle</title>
    <link rel="stylesheet" href="./style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        .category-header {
            background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-variant) 100%);
            padding: 120px 0 80px;
            margin-top: 4.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .category-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }
        
        .category-title {
            font-size: 3.5rem;
            color: white;
            margin-bottom: 1rem;
            font-weight: 700;
            position: relative;
            z-index: 2;
        }
        
        .category-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        .category-icon {
            font-size: 4rem;
            color: rgba(255, 255, 255, 0.2);
            margin-bottom: 1rem;
            position: relative;
            z-index: 2;
        }
        
        .posts-section {
            padding: 80px 0;
            background: var(--color-bg);
        }
        
        .posts-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .post-card {
            background: var(--color-gray-900);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s ease;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, var(--color-primary), var(--color-primary-variant));
        }
        
        .post-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }
        
        .post-thumbnail {
            position: relative;
            height: 250px;
            overflow: hidden;
        }
        
        .post-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        
        .post-card:hover .post-thumbnail img {
            transform: scale(1.1);
        }
        
        .post-content {
            padding: 2rem;
        }
        
        .post-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--color-white);
            margin-bottom: 1rem;
            line-height: 1.4;
        }
        
        .post-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .post-title a:hover {
            color: var(--color-primary);
        }
        
        .post-excerpt {
            color: var(--color-gray-200);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .post-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1rem;
            border-top: 1px solid var(--color-gray-700);
        }
        
        .post-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-gray-300);
            font-size: 0.9rem;
        }
        
        .read-more {
            background: var(--color-primary);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .read-more:hover {
            background: var(--color-primary-variant);
            transform: translateX(3px);
        }
        
        .no-posts {
            text-align: center;
            padding: 80px 20px;
            background: var(--color-gray-900);
            border-radius: 20px;
            margin: 2rem auto;
            max-width: 600px;
        }
        
        .no-posts-icon {
            font-size: 4rem;
            color: var(--color-primary);
            margin-bottom: 2rem;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--color-gray-700);
            color: var(--color-white);
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 3rem;
        }
        
        .back-button:hover {
            background: var(--color-primary);
            transform: translateX(-3px);
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
                <li><a href="blog.php"><i class="uil uil-book-alt"></i> Blog</a></li>
                <li><a href="about.php"><i class="uil uil-info-circle"></i> About</a></li>
                <li><a href="services.php"><i class="uil uil-medkit"></i> Services</a></li>
                <li><a href="login.php"><i class="uil uil-signin"></i> Login</a></li>
            </ul>
            
            <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <!-- Category Header -->
    <section class="category-header">
        <div class="container">
            <div class="category-icon">
                <?php
                $category_icons = [
                    'Nutrition' => 'uil-apple-alt',
                    'Fitness' => 'uil-dumbbell',
                    'Mental Health' => 'uil-brain',
                    'Wellness' => 'uil-heartbeat',
                    'Sleep' => 'uil-bed-double',
                    'Meditation' => 'uil-yoga'
                ];
                $icon = isset($category_icons[$category['Title']]) ? $category_icons[$category['Title']] : 'uil-tag-alt';
                ?>
                <i class="uil <?= $icon ?>"></i>
            </div>
            <h1 class="category-title"><?= htmlspecialchars($category['Title']) ?></h1>
            <p class="category-subtitle">Explore our collection of articles about <?= strtolower(htmlspecialchars($category['Title'])) ?></p>
        </div>
    </section>

    <!-- Posts Section -->
    <section class="posts-section">
        <div class="container">
            <a href="blog.php" class="back-button">
                <i class="uil uil-arrow-left"></i>
                Back to All Posts
            </a>
            
            <?php if(mysqli_num_rows($posts) > 0) : ?>
                <div class="posts-container">
                    <?php while ($post = mysqli_fetch_assoc($posts)): ?> 
                        <article class="post-card">
                            <div class="post-thumbnail">
                                <img src="images<?= $post['Thumbnail'] ?>" alt="<?= htmlspecialchars($post['Title']) ?>">
                            </div>
                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="post.php?id=<?= $post['id'] ?>"><?= htmlspecialchars($post['Title']) ?></a>
                                </h3>
                                <p class="post-excerpt">
                                    <?= htmlspecialchars(substr($post['Body'], 0, 150)) ?>...
                                </p>
                                <div class="post-meta">
                                    <div class="post-date">
                                        <i class="uil uil-calendar-alt"></i>
                                        <?= date("M d, Y", strtotime($post['date_time'])) ?>
                                    </div>
                                    <a href="post.php?id=<?= $post['id'] ?>" class="read-more">
                                        Read More <i class="uil uil-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php endwhile ?> 
                </div>
            <?php else : ?>
                <div class="no-posts">
                    <div class="no-posts-icon">
                        <i class="uil uil-exclamation-triangle"></i>
                    </div>
                    <h3>No posts found in this category</h3>
                    <p>Check back later for new content in <?= htmlspecialchars($category['Title']) ?>.</p>
                    <a href="blog.php" class="btn" style="margin-top: 2rem;">Browse All Posts</a>
                </div>
            <?php endif ?>
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
                    <li><a href="category-post.php?id=1">Nutrition</a></li>
                    <li><a href="category-post.php?id=2">Fitness</a></li>
                    <li><a href="category-post.php?id=3">Mental Health</a></li>
                    <li><a href="category-post.php?id=4">Wellness</a></li>
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
