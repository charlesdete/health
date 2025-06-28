<?php

session_start();
  

 if(isset($_COOKIE['Email'])){
         $email = $_COOKIE['Email'];
     echo "<script>
         document.getElementByID('Email').value = 'Email';
     </script>";
    
 }


if($_SERVER['REQUEST_METHOD'] ==='POST'){
    require('db_conn.php');
    // set DB connections configs
    $servername = "localhost";
    $dbname = "triza";
    $dbusername = "root";
    $dbpassword = "";

    // clean the data/ remove special characters
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // declare the post variables from form input
    $password = validate($_POST['Password']);
    $email = validate($_POST['Email']);

    if(empty($email)){
        header('Location:login.php?error=Email is required');
    }

    if(empty($password)){
    header('Location:login.php?error=Password is required');
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            // query if user exists in DB
            $sql = "SELECT * FROM users WHERE (Email=:Email)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':Email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // email was found
            if ($result) {
                // User with provided email found, verify password
                $hashedPassword = $result['Password'];

                if (password_verify($password, $hashedPassword)) {
                    echo 'login success';
                   

                            // Always set sessions
                            $_SESSION['Email'] = $email;
                            $_SESSION['Id'] = $result['Id'];  // ✅ Moved outside remember block

                            // If remember me is checked, set cookies
                            if (!empty($_POST['remember'])) {
                                setcookie('Email', md5($email), time() + 3600);
                                setcookie('Id', md5($result['Id']), time() + 3600);
                            }
                    
                    //set session
                    
                     
                
                    // redirect logged in user to homepage
                    header('Location:index.php');
                } else {
                    // Password doesn't match
                    header('Location:login.php?error=Wrong credentials');
                }
                return;
            // No user with provided email found
            } else {
                header('Location:login.php?error=Email was not found');
            }
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
 
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">Health and Lifestyle</a>
             <ul class="nav_items">
               <li><a href="blog.php">Blog</a></li>
               <li><a href="about.php">About</a></li>
               <li><a href="services.php">Services</a></li>
               
              
                 <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
                </div>
            
                <ul>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>
    <!-- <div class="container">
<button  type="submit" name="login" onclick="openPopup()" class="button">login</button>
</div>   -->

    <div class="card2">
<div class="card-header">
        <h1>LOGIN</h1>
    <form action="" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post">
         <?php if(isset($_GET['error'])){?>
            <p class="error"><?php echo $_GET ['error'];?></p> 
       <?php  } ?>  
            <label>Email</label>
        <input type="email" name="Email" placeholder="Email" class="input-style"  required value="">
            <label>Password</label>
        <input type="password" name="Password"  placeholder="Password" class="input-style">
            <div class="remember">
        <p><label for="rememeber-me">Remember me</label>
            <input type="checkbox" name="remember"></p>
        <button  type="submit" name="login" onlick="closePopup()" class="button">login</button>
        <br/>
        <p><a href="registration.php"> Create an account </a></br>
        <a href="./reset-password.php">Forgotten Password?</a>
    
         </form>
            </div>
               </div>
                 </div>
        </div>
</body>
   
</html>