<?php 
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
//fetch categories from database
$query ="SELECT * FROM category";
$categories =mysqli_query($conn,$query);
?>  
             
                
              <link rel="stylesheet" href="style2.css"> 
              <body>
<nav>
            <div class="container nav_container">
                <a href="index.php" class="nav_logo">Health and Lifestyle</a>
             <ul class="nav_items">
               <li><a href="blog.php">Blog</a></li>
               <li><a href="add-post.php"> Add Post</a></li>
               <li><a href="add-category.php">Add Category</a></li>
              
               
               <li class="nav_profile">
                <div style="display:inline-flex ;align-items: center;">
                    <div class="avatar">
                        <img src="https://images.unsplash.com/photo-1601625463687-25541fb72f62?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8fA%3D%3D&w=1000&q=80">
                    </div>
                    <div class="user">  
                        <span>WELCOME</span>
                    </div>
               
                
                </li>
            </ul>
    
           <button id="open_nav-btn"><i class="uil uil-bars"></i></button>
           <button id="close_nav-btn"><li class="uil uil-multiply"></li></button>
         </div>
          </nav>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div clas="col-md-6"> 
                 <div class="card2">
                    <div class="card-header">
                    <h2>Add Post</h2>
                </div>
                    <form action="add-post-logic.php" enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                    <input type="text" name="Title"   placeholder="Title" class="input-style">
                    </br>
                    <select name="Category" class="input-style">
                    <p>
                    <?php  while ($category_id = mysqli_fetch_assoc($categories)) :?>
                    <option value="<?= $category_id['id'] ?>"><?= $category_id['Title']?></option> 
                     <?php endwhile ?>
                    </p>
                    </select>
                    </br>
                    <textarea rows="8" name="Body" placeholder="Body" class="input-style"></textarea>
                    
                    <input type="checkbox"  name="is_featured" value="1" id="is_featured" checked >
                    <label for="is_featured">Featured</label>
                    <label for="Thumbnail">Add thumbnail</label></br>
                     <input type="file" class="input-style" name="Thumbnail" id="thumbnail">
            
                    </br>
                    <button type="submit" name="submit" class="button">Add Post</button>
                    </div>   
                </form>
                    </div>
                    </div>    
                   </div>
                     </div>
</body>
            
         
 




         