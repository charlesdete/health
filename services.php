<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Our Services - Health & Lifestyle</title>
        <link rel="stylesheet" href="./style2.css">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <style>
            .services-header {
                background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-variant) 100%);
                padding: 120px 0 80px;
                margin-top: 4.5rem;
                text-align: center;
                color: white;
            }
            
            .services-title {
                font-size: 3rem;
                font-weight: 700;
                margin-bottom: 1rem;
            }
            
            .services-subtitle {
                font-size: 1.2rem;
                opacity: 0.9;
                max-width: 600px;
                margin: 0 auto;
            }
            
            .services-content {
                padding: 80px 0;
                background: var(--color-bg);
            }
            
            .services-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 3rem;
                margin-top: 3rem;
            }
            
            .service-card {
                background: var(--color-gray-900);
                border-radius: 20px;
                padding: 2.5rem;
                text-align: center;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            }
            
            .service-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(90deg, var(--color-primary), var(--color-primary-variant));
            }
            
            .service-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            }
            
            .service-icon {
                width: 80px;
                height: 80px;
                background: linear-gradient(45deg, var(--color-primary), var(--color-primary-variant));
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                font-size: 2rem;
                color: white;
            }
            
            .service-card h3 {
                color: var(--color-white);
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }
            
            .service-card p {
                color: var(--color-gray-200);
                line-height: 1.6;
                margin-bottom: 1.5rem;
            }
            
            .service-features {
                list-style: none;
                text-align: left;
                margin: 1.5rem 0;
            }
            
            .service-features li {
                color: var(--color-gray-200);
                padding: 0.5rem 0;
                position: relative;
                padding-left: 1.5rem;
            }
            
            .service-features li::before {
                content: '✓';
                color: var(--color-primary-variant);
                font-weight: bold;
                position: absolute;
                left: 0;
            }
            
            .cta-section {
                background: var(--color-gray-900);
                padding: 80px 0;
                text-align: center;
            }
            
            .cta-btn {
                background: var(--color-primary);
                color: white;
                padding: 15px 30px;
                border-radius: 25px;
                text-decoration: none;
                font-weight: 600;
                display: inline-flex;
                align-items: center;
                gap: 0.5rem;
                transition: all 0.3s ease;
            }
            
            .cta-btn:hover {
                background: var(--color-primary-variant);
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(34, 139, 34, 0.3);
            }
        </style>
    </head>
    <body>
          <nav>
            <div class="container nav_container">
                <a href="home.php" class="nav_logo">
                    <i class="uil uil-heart-medical"></i>
                    Health & Lifestyle
                </a>
             <ul class="nav_items">
               <li><a href="index.php"><i class="uil uil-home"></i> Home</a></li>
               <li><a href="blog.php"><i class="uil uil-book-alt"></i> Blog</a></li>
               <li><a href="about.php"><i class="uil uil-info-circle"></i> About</a></li>
               
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

          <!-- Services Header -->
          <section class="services-header">
            <div class="container">
                <h1 class="services-title">Our Services</h1>
                <p class="services-subtitle">Comprehensive wellness solutions designed to support your health journey</p>
            </div>
          </section>

          <!-- Services Content -->
          <section class="services-content">
            <div class="container">
                <div class="section-header" style="text-align: center; margin-bottom: 3rem;">
                    <h2 style="color: var(--color-white); font-size: 2.5rem; margin-bottom: 1rem;">What We Offer</h2>
                    <p style="color: var(--color-gray-200); max-width: 600px; margin: 0 auto;">Expert guidance and resources to help you achieve your wellness goals</p>
                </div>
                
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-apple-alt"></i>
                        </div>
                        <h3>Nutrition Counseling</h3>
                        <p>Get personalized nutrition advice from certified dietitians and nutritionists.</p>
                        <ul class="service-features">
                            <li>Personalized meal plans</li>
                            <li>Dietary assessments</li>
                            <li>Nutritional guidance</li>
                            <li>Weight management support</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-dumbbell"></i>
                        </div>
                        <h3>Fitness Programs</h3>
                        <p>Customized workout plans and fitness coaching to help you reach your goals.</p>
                        <ul class="service-features">
                            <li>Personal training sessions</li>
                            <li>Group fitness classes</li>
                            <li>Workout plan design</li>
                            <li>Progress tracking</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-brain"></i>
                        </div>
                        <h3>Mental Wellness</h3>
                        <p>Comprehensive mental health support and mindfulness training programs.</p>
                        <ul class="service-features">
                            <li>Stress management techniques</li>
                            <li>Meditation guidance</li>
                            <li>Mental health resources</li>
                            <li>Mindfulness training</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-heartbeat"></i>
                        </div>
                        <h3>Health Monitoring</h3>
                        <p>Track your health metrics and get insights into your wellness progress.</p>
                        <ul class="service-features">
                            <li>Health assessments</li>
                            <li>Vital signs monitoring</li>
                            <li>Progress tracking</li>
                            <li>Health goal setting</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-bed-double"></i>
                        </div>
                        <h3>Sleep Optimization</h3>
                        <p>Improve your sleep quality with expert guidance and proven techniques.</p>
                        <ul class="service-features">
                            <li>Sleep pattern analysis</li>
                            <li>Sleep hygiene education</li>
                            <li>Relaxation techniques</li>
                            <li>Sleep environment optimization</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                    
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="uil uil-users-alt"></i>
                        </div>
                        <h3>Community Support</h3>
                        <p>Join our wellness community for motivation, support, and shared experiences.</p>
                        <ul class="service-features">
                            <li>Support groups</li>
                            <li>Community challenges</li>
                            <li>Peer motivation</li>
                            <li>Expert Q&A sessions</li>
                        </ul>
                        <a href="blog.php" class="cta-btn">Learn More <i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>
            </div>
          </section>

          <!-- CTA Section -->
          <section class="cta-section">
            <div class="container">
                <h2 style="color: var(--color-white); font-size: 2.5rem; margin-bottom: 1rem;">Ready to Start Your Wellness Journey?</h2>
                <p style="color: var(--color-gray-200); font-size: 1.2rem; margin-bottom: 2rem;">Join thousands of people who have transformed their lives with our comprehensive wellness programs.</p>
                <a href="blog.php" class="cta-btn" style="font-size: 1.1rem; padding: 18px 35px;">
                    <i class="uil uil-rocket"></i>
                    Get Started Today
                </a>
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