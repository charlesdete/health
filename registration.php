

<?php
session_start();
// if( empty($_SESSION['Email'])){
//     header('location:home.php');
//     exit();
// } 

//  require('check-sess-cookies.php');
if($_SERVER['REQUEST_METHOD'] ==='POST'){
   
    //db connection configs
    $servername= "localhost";
    $dbname = "triza";
    $dbusername = "root";
    $dbpassword = "";
    //cleaning up the data
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dbusername, $dbpassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 //declare th e post variables from the form input
                 // Validate username
                    $user_name = $_POST['Name'];
                    function validateName($user_name) {
                        if (preg_match('/^[a-z]\w{2,23}[^_]$/i', $user_name)) {
                            return true;
                        }
                        return false;
                    }

                    // Validate email
                    $email = $_POST["Email"];
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr = "Invalid email format";
                    }

                    // Validate phone
                    $phone = $_POST['Phone'];
                    if (empty($phone)) {
                        throw new Exception("Phone number cannot be empty");
                    }

                    $password = $_POST['Password'];

                    // Hash password
                    $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert into database
        $sql ="INSERT INTO users (Name,Email,Password,Phone) VALUES (:Name,:Email,:Password,:Phone)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':Name',$user_name,PDO::PARAM_STR);
        $stmt->bindParam(':Email',$email,PDO::PARAM_STR);
        $stmt->bindParam(':Password',$hash,PDO::PARAM_STR);
        $stmt->bindParam(':Phone',$phone,PDO::PARAM_STR);

        $stmt->execute();
        } catch (PDOException $e) {
            echo "Error registering user: " . $e->getMessage();
        
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
    <head> 
        <title>SIGN UP  HERE! </title>
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
 <div id class="registration">
    <div class="alert">
        <?php 
        if(isset($_SESSION['status']))
        {
          echo"<h4>".$_SESSION['status']."</h4>";  
          unset($_SESSION['status']);
        }
        ?>
      
 <div class="card2">
 <form action="" <?php echo
    htmlspecialchars($_SERVER['PHP_SELF']) ?> method="POST">
      <div class="card-header">
      <h2>Sign up here!</h2>
    </div>
         <?php ?>
         <div class="form-group ">
               <label>Name</label>
               <input type="text" name="Name" placeholder="Name" class="input-style"></br>
                &nbsp;<label> Email</label>
               <input type="email" name="Email" placeholder="Email" class="input-style">
                &nbsp;<label> Phone number </label>
               <input type="phone number" name="Phone"placeholder="phone number" class="input-style">
                &nbsp;<label> Password </label>
               <input type="password" name="Password"placeholder="Password" class="input-style">
               <br/>
        
               </br>
              <div class='registerbtn'>
               <button type="submit" name="registerbtn" onlick="closePopup_reg()" class="button">Register </button>
             </div>  
            </div>
          </form> 
         </div> 
      </div>  
    </body>
   
</html>
