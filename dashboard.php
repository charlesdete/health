
<?PHP
 require('check-sess-cookies.php');
$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//check connection
if(!$conn){
    die("connection failed:" .mysqli_connect_error());
}
 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Health and Lifestyle - Dashboard</title>
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
                --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                --shadow-hover: 0 20px 40px rgba(0, 0, 0, 0.15);
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
                line-height: 1.6;
            }

            .dashboard-container {
                display: grid;
                grid-template-columns: 280px 1fr;
                min-height: 100vh;
            }

            /* Sidebar Styles */
            .sidebar {
                background: var(--color-gray-900);
                padding: 2rem 0;
                box-shadow: var(--shadow);
                position: relative;
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 0 2rem;
                margin-bottom: 3rem;
                text-decoration: none;
                color: var(--color-white);
            }

            .brand i {
                font-size: 2rem;
                color: var(--color-primary);
            }

            .brand-text {
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--color-white);
            }

            .sidebar-menu {
                list-style: none;
            }

            .sidebar-menu li {
                margin-bottom: 0.5rem;
            }

            .sidebar-menu a {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem 2rem;
                color: var(--color-gray-200);
                text-decoration: none;
                transition: var(--transition);
                border-left: 4px solid transparent;
            }

            .sidebar-menu a:hover,
            .sidebar-menu a.active {
                background: var(--color-primary-light);
                color: var(--color-white);
                border-left-color: var(--color-primary);
            }

            .sidebar-menu i {
                font-size: 1.2rem;
                width: 20px;
            }

            .logout-section {
                position: absolute;
                bottom: 2rem;
                width: 100%;
            }

            .logout-section a {
                color: var(--color-red);
            }

            /* Main Content */
            .main-content {
                padding: 2rem;
                background: linear-gradient(135deg, var(--color-bg) 0%, #2d5a3d 100%);
            }

            .header {
                margin-bottom: 3rem;
            }

            .welcome-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: var(--color-white);
                margin-bottom: 0.5rem;
            }

            .breadcrumb {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                list-style: none;
                color: var(--color-gray-200);
            }

            .breadcrumb a {
                color: var(--color-primary);
                text-decoration: none;
            }

            /* Stats Cards */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-bottom: 3rem;
            }

            .stat-card {
                background: var(--color-gray-900);
                padding: 2rem;
                border-radius: 15px;
                box-shadow: var(--shadow);
                transition: var(--transition);
                border-left: 4px solid var(--color-primary);
                position: relative;
                overflow: hidden;
            }

            .stat-card::before {
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                width: 60px;
                height: 60px;
                background: var(--color-primary);
                opacity: 0.1;
                border-radius: 50%;
                transform: translate(30%, -30%);
            }

            .stat-card:hover {
                transform: translateY(-5px);
                box-shadow: var(--shadow-hover);
            }

            .stat-card i {
                font-size: 2.5rem;
                color: var(--color-primary);
                margin-bottom: 1rem;
            }

            .stat-number {
                font-size: 2rem;
                font-weight: 700;
                color: var(--color-white);
                display: block;
                margin-bottom: 0.5rem;
            }

            .stat-label {
                color: var(--color-gray-200);
                font-size: 0.9rem;
            }

            /* Quick Actions */
            .quick-actions {
                background: var(--color-gray-900);
                padding: 2rem;
                border-radius: 15px;
                box-shadow: var(--shadow);
                margin-bottom: 3rem;
            }

            .section-title {
                font-size: 1.5rem;
                font-weight: 600;
                color: var(--color-white);
                margin-bottom: 2rem;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .actions-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 1rem;
            }

            .action-btn {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem 1.5rem;
                background: var(--color-primary);
                color: white;
                text-decoration: none;
                border-radius: 10px;
                transition: var(--transition);
                font-weight: 500;
            }

            .action-btn:hover {
                background: var(--color-primary-variant);
                transform: translateY(-2px);
                box-shadow: 0 8px 20px rgba(34, 139, 34, 0.3);
            }

            .action-btn i {
                font-size: 1.2rem;
            }

            /* Recent Activity */
            .recent-activity {
                background: var(--color-gray-900);
                padding: 2rem;
                border-radius: 15px;
                box-shadow: var(--shadow);
            }

            .activity-item {
                display: flex;
                align-items: center;
                gap: 1rem;
                padding: 1rem 0;
                border-bottom: 1px solid var(--color-gray-700);
            }

            .activity-item:last-child {
                border-bottom: none;
            }

            .activity-icon {
                width: 40px;
                height: 40px;
                background: var(--color-primary-light);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: var(--color-primary);
            }

            .activity-content h4 {
                color: var(--color-white);
                font-size: 0.9rem;
                margin-bottom: 0.25rem;
            }

            .activity-content span {
                color: var(--color-gray-200);
                font-size: 0.8rem;
            }

            /* Responsive Design */
            @media (max-width: 1024px) {
                .dashboard-container {
                    grid-template-columns: 1fr;
                }

                .sidebar {
                    display: none;
                }

                .stats-grid {
                    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                }
            }

            @media (max-width: 768px) {
                .main-content {
                    padding: 1rem;
                }

                .welcome-title {
                    font-size: 2rem;
                }

                .actions-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="dashboard-container">
            <!-- Sidebar -->
            <aside class="sidebar">
                <a href="#" class="brand">
                    <i class="uil uil-heart-medical"></i>
                    <span class="brand-text">AdminHub</span>
                </a>
                
                <nav>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="dashboard.php" class="active">
                                <i class="uil uil-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="add-post.php">
                                <i class="uil uil-pen"></i>
                                <span>Add Post</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-post.php">
                                <i class="uil uil-edit-alt"></i>
                                <span>Manage Posts</span>
                            </a>
                        </li>
                        <li>
                            <a href="add-category.php">
                                <i class="uil uil-tag-alt"></i>
                                <span>Add Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="manage-categories.php">
                                <i class="uil uil-list-ul"></i>
                                <span>Manage Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="user.php">
                                <i class="uil uil-user-plus"></i>
                                <span>Add Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="uil uil-chart-pie"></i>
                                <span>Analytics</span>
                            </a>
                        </li>
                        <li>
                            <a href="settings.php">
                                <i class="uil uil-setting"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="logout-section">
                    <ul class="sidebar-menu">
                        <li>
                            <a href="logout.php">
                                <i class="uil uil-signout"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content -->
            <main class="main-content">
                <header class="header">
                    <h1 class="welcome-title">Welcome to Health & Lifestyle</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li><i class="uil uil-angle-right"></i></li>
                        <li>Overview</li>
                    </ul>
                </header>

                <!-- Stats Cards -->
                <section class="stats-grid">
                    <div class="stat-card">
                        <i class="uil uil-file-alt"></i>
                        <span class="stat-number">47</span>
                        <span class="stat-label">Total Posts</span>
                    </div>
                    <div class="stat-card">
                        <i class="uil uil-tag-alt"></i>
                        <span class="stat-number">12</span>
                        <span class="stat-label">Categories</span>
                    </div>
                    <div class="stat-card">
                        <i class="uil uil-users-alt"></i>
                        <span class="stat-number">1,234</span>
                        <span class="stat-label">Active Users</span>
                    </div>
                    <div class="stat-card">
                        <i class="uil uil-eye"></i>
                        <span class="stat-number">5,678</span>
                        <span class="stat-label">Total Views</span>
                    </div>
                </section>

                <!-- Quick Actions -->
                <section class="quick-actions">
                    <h2 class="section-title">
                        <i class="uil uil-bolt"></i>
                        Quick Actions
                    </h2>
                    <div class="actions-grid">
                        <a href="add-post.php" class="action-btn">
                            <i class="uil uil-plus"></i>
                            <span>Create New Post</span>
                        </a>
                        <a href="add-category.php" class="action-btn">
                            <i class="uil uil-tag-alt"></i>
                            <span>Add Category</span>
                        </a>
                        <a href="user.php" class="action-btn">
                            <i class="uil uil-user-plus"></i>
                            <span>Add User</span>
                        </a>
                        <a href="chart.html" class="action-btn">
                            <i class="uil uil-chart-line"></i>
                            <span>View Analytics</span>
                        </a>
                    </div>
                </section>

                <!-- Recent Activity -->
                <section class="recent-activity">
                    <h2 class="section-title">
                        <i class="uil uil-clock"></i>
                        Recent Activity
                    </h2>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="uil uil-file-plus"></i>
                        </div>
                        <div class="activity-content">
                            <h4>New post "Healthy Eating Tips" published</h4>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="uil uil-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <h4>New user registered</h4>
                            <span>5 hours ago</span>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="uil uil-edit-alt"></i>
                        </div>
                        <div class="activity-content">
                            <h4>Post "Exercise Routines" updated</h4>
                            <span>1 day ago</span>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>
