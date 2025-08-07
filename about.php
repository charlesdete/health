<?php
// Public page - no session required
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>About Us - Health & Lifestyle</title>
        <link rel="stylesheet" href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            .about-header {
                background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-variant) 100%);
                padding: 120px 0 80px;
                margin-top: 4.5rem;
                text-align: center;
                color: white;
            }
            
            .about-title {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }
            
            .about-subtitle {
                font-size: 1.2rem;
                opacity: 0.9;
                max-width: 600px;
                margin: 0 auto;
            }
            
            .about-content {
                padding: 80px 0;
                background: var(--color-bg);
            }
            
            .content-grid {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 4rem;
                align-items: center;
                margin-bottom: 4rem;
            }
            
            .content-text h2 {
                color: var(--color-white);
                font-size: 2.2rem;
                margin-bottom: 1.5rem;
            }
            
            .content-text p {
                color: var(--color-gray-200);
                line-height: 1.8;
                margin-bottom: 1.5rem;
            }
            
            .content-image {
                text-align: center;
            }
            
            .content-image img {
                width: 100%;
                max-width: 400px;
                border-radius: 15px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
            
            .values-section {
                background: var(--color-gray-900);
                padding: 80px 0;
            }
            
            .values-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 2rem;
                margin-top: 3rem;
            }
            
            .value-card {
                background: rgba(255, 255, 255, 0.05);
                padding: 2rem;
                border-radius: 15px;
                text-align: center;
                transition: all 0.3s ease;
            }
            
            .value-card:hover {
                transform: translateY(-10px);
                background: rgba(255, 255, 255, 0.1);
            }
            
            .value-card i {
                font-size: 3rem;
                color: var(--color-primary-variant);
                margin-bottom: 1rem;
            }
            
            .value-card h3 {
                color: var(--color-white);
                margin-bottom: 1rem;
            }
            
            .value-card p {
                color: var(--color-gray-200);
                line-height: 1.6;
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
               <li><a href="services.php"><i class="uil uil-medkit"></i> Services</a></li>
               
               <li class="nav_profile">
                <div style="display:inline-flex; align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face" alt="Profile">
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

          <!-- About Header -->
          <section class="about-header">
            <div class="container">
                <h1 class="about-title">About Health & Lifestyle</h1>
                <p class="about-subtitle">Empowering you to live your healthiest, most vibrant life through expert guidance and inspiration.</p>
            </div>
          </section>

          <!-- About Content -->
          <section class="about-content">
            <div class="container">
                <div class="content-grid">
                    <div class="content-text">
                        <h2>Our Mission</h2>
                        <p>At Health & Lifestyle, we believe that wellness is not just a destination—it's a journey. Our mission is to provide you with the knowledge, tools, and inspiration you need to make informed decisions about your health and well-being.</p>
                        <p>We're committed to delivering evidence-based content that covers all aspects of healthy living, from nutrition and fitness to mental wellness and preventive care.</p>
                    </div>
                    <div class="content-image">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Health and Wellness">
                    </div>
                </div>
                
                <div class="content-grid">
                    <div class="content-image">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Healthy Lifestyle">
                    </div>
                    <div class="content-text">
                        <h2>What We Offer</h2>
                        <p>Our platform features comprehensive articles, expert insights, and practical tips covering nutrition, fitness, mental health, and lifestyle optimization. We collaborate with certified professionals to ensure our content is accurate, reliable, and actionable.</p>
                        <p>Whether you're just starting your wellness journey or looking to enhance your existing healthy habits, we're here to support you every step of the way.</p>
                    </div>
                </div>
            </div>
          </section>

          <!-- Values Section -->
          <section class="values-section">
            <div class="container">
                <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                    <h2 style="color: var(--color-white); font-size: 2.5rem; margin-bottom: 1rem;">Our Values</h2>
                    <p style="color: var(--color-gray-200); max-width: 600px; margin: 0 auto;">The principles that guide everything we do</p>
                </div>
                <div class="values-grid">
                    <div class="value-card">
                        <i class="uil uil-shield-check"></i>
                        <h3>Evidence-Based</h3>
                        <p>All our content is backed by scientific research and expert knowledge to ensure accuracy and reliability.</p>
                    </div>
                    <div class="value-card">
                        <i class="uil uil-users-alt"></i>
                        <h3>Inclusive</h3>
                        <p>We believe wellness is for everyone, regardless of age, background, or fitness level. Our content is accessible to all.</p>
                    </div>
                    <div class="value-card">
                        <i class="uil uil-lightbulb-alt"></i>
                        <h3>Practical</h3>
                        <p>We focus on actionable advice that you can easily implement in your daily life for lasting positive change.</p>
                    </div>
                </div>
            </div>
          </section>






          <footer>
            <div class="footer_socials">
                <a href="https://youtube.com/healthlifestyle" target="_blank" aria-label="YouTube"><i class="uil uil-youtube"></i></a>
                <a href="https://facebook.com/healthlifestyle" target="_blank" aria-label="Facebook"><i class="uil uil-facebook-f"></i></a>
                <a href="https://instagram.com/healthlifestyle" target="_blank" aria-label="Instagram"><i class="uil uil-instagram-alt"></i></a>
                <a href="https://linkedin.com/company/healthlifestyle" target="_blank" aria-label="LinkedIn"><i class="uil uil-linkedin"></i></a>
                <a href="https://twitter.com/healthlifestyle" target="_blank" aria-label="Twitter"><i class="uil uil-twitter"></i></a>
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
                            <li><a href="https://facebook.com/healthlifestyle" target="_blank">Facebook</a></li>
                            <li><a href="https://instagram.com/healthlifestyle" target="_blank">Instagram</a></li>
                            <li><a href="https://twitter.com/healthlifestyle" target="_blank">Twitter</a></li>
                            <li><a href="https://youtube.com/healthlifestyle" target="_blank">YouTube</a></li>
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