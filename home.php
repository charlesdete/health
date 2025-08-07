
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health & Lifestyle - Your Wellness Journey Starts Here</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #228B22;
            --color-primary-light: hsl(120, 61%, 34%, 18%);
            --color-primary-variant: #32CD32;
            --color-red: #FF69B4;
            --color-green: #90EE90;
            --color-gray-900: #2F4F2F;
            --color-gray-700: #556B2F;
            --color-gray-300: rgba(242, 242, 254, 0.3);
            --color-gray-200: rgba(242, 242, 254, 0.7);
            --color-white: #f2f2fe;
            --color-bg: #1B4332;
            --transition: all 300ms ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: var(--color-bg);
            color: var(--color-white);
            overflow-x: hidden;
        }

        .main {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--color-bg) 0%, #2d5a3d 50%, var(--color-primary) 100%);
            position: relative;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 2rem 5%;
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(27, 67, 50, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: var(--transition);
        }

        .navbar.scrolled {
            background: rgba(27, 67, 50, 0.98);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .logo a {
            font-size: 2rem;
            font-weight: 800;
            color: var(--color-white);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo i {
            color: var(--color-primary-variant);
            font-size: 2.5rem;
        }

        .menu ul {
            display: flex;
            list-style: none;
            gap: 3rem;
            align-items: center;
        }

        .menu a {
            color: var(--color-white);
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: var(--transition);
            position: relative;
        }

        .menu a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 3px;
            background: var(--color-primary-variant);
            transition: width 0.3s ease;
        }

        .menu a:hover::before {
            width: 100%;
        }

        .menu a:hover {
            color: var(--color-primary-variant);
        }

        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 0 5%;
            position: relative;
        }

        .content h1 {
            font-size: 5rem;
            font-weight: 900;
            margin-bottom: 2rem;
            background: linear-gradient(45deg, var(--color-white), var(--color-primary-variant));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .content h1 span {
            color: var(--color-primary-variant);
            display: inline-block;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .image-circles {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            margin: 3rem 0;
            position: relative;
        }

        .circle {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            overflow: hidden;
            position: relative;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: var(--transition);
            border: 4px solid var(--color-primary-variant);
        }

        .circle:hover {
            transform: translateY(-20px) scale(1.1);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
        }

        .circle1 {
            animation: float 3s ease-in-out infinite;
        }

        .circle2 {
            animation: float 3s ease-in-out infinite 0.5s;
            width: 250px;
            height: 250px;
        }

        .circle3 {
            animation: float 3s ease-in-out infinite 1s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .circle:hover img {
            transform: scale(1.2);
        }

        .tagline {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--color-gray-200);
            margin-top: 2rem;
            max-width: 800px;
            line-height: 1.6;
            font-style: italic;
        }

        .cta-buttons {
            display: flex;
            gap: 2rem;
            margin-top: 3rem;
        }

        .btn {
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 700;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--color-primary);
            color: white;
            box-shadow: 0 10px 30px rgba(34, 139, 34, 0.4);
        }

        .btn-primary:hover {
            background: var(--color-primary-variant);
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(34, 139, 34, 0.6);
        }

        .btn-secondary {
            background: transparent;
            color: var(--color-white);
            border: 2px solid var(--color-white);
        }

        .btn-secondary:hover {
            background: var(--color-white);
            color: var(--color-bg);
            transform: translateY(-3px);
        }

        .features {
            padding: 5rem 5%;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            margin-top: 5rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            padding: 2.5rem;
            border-radius: 20px;
            text-align: center;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-card i {
            font-size: 3rem;
            color: var(--color-primary-variant);
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--color-white);
        }

        .feature-card p {
            color: var(--color-gray-200);
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem 3%;
            }

            .content h1 {
                font-size: 3rem;
            }

            .image-circles {
                flex-direction: column;
                gap: 1rem;
            }

            .circle, .circle2 {
                width: 150px;
                height: 150px;
            }

            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }

            .menu ul {
                gap: 1.5rem;
            }

            .features {
                padding: 3rem 3%;
            }
        }

        @media (max-width: 480px) {
            .content h1 {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.2rem;
            }

            .circle, .circle2 {
                width: 120px;
                height: 120px;
            }
        }
    </style>
</head>
<body>
    <div class="main">
        <div class="navbar" id="navbar">
            <div class="logo">
                <a href="home.php">
                    <i class="uil uil-heart-medical"></i>
                    Health & Lifestyle
                </a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="blog.php">BLOG</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                </ul>
            </div>
        </div>

        <div class="content">
            <h1>Health<br><span>&</span><br>Lifestyle</h1>
            
            <div class="image-circles">
                <div class="circle circle1">
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Health & Fitness">
                </div>
                <div class="circle circle2">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Lifestyle">
                </div>
                <div class="circle circle3">
                    <img src="https://images.unsplash.com/photo-1490645935967-10de6ba17061?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Natural Food">
                </div>
            </div>
            
            <p class="tagline">"Fuel Your Life: Where Healthy Choices Meet Vibrant Living!"</p>
            
            <div class="cta-buttons">
                <a href="index.php" class="btn btn-primary">
                    <i class="uil uil-book-open"></i>
                    Explore Articles
                </a>
                <a href="about.php" class="btn btn-secondary">
                    <i class="uil uil-info-circle"></i>
                    Learn More
                </a>
            </div>
        </div>

        <div class="features">
            <div class="features-grid">
                <div class="feature-card">
                    <i class="uil uil-apple-alt"></i>
                    <h3>Nutrition Guidance</h3>
                    <p>Discover science-based nutrition advice to fuel your body and mind for optimal performance.</p>
                </div>
                <div class="feature-card">
                    <i class="uil uil-dumbbell"></i>
                    <h3>Fitness Plans</h3>
                    <p>Get personalized workout routines and fitness tips to achieve your health goals effectively.</p>
                </div>
                <div class="feature-card">
                    <i class="uil uil-brain"></i>
                    <h3>Mental Wellness</h3>
                    <p>Learn mindfulness techniques and mental health strategies for a balanced, fulfilling life.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>
