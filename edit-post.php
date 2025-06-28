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

//fetch post data from database if id is set
if(isset($_GET['id'])){

    $id= filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query= "SELECT * FROM post WHERE id=$id";
    $result = mysqli_query($conn,$query);
    $post =mysqli_fetch_assoc(($result));
}else{
//  header('location:manage-post.php');
// die();

}

?>
 <section class="form_section">
              <link rel="stylesheet" href="style2.css"> 
                 <div class="card2">
                    <div class="card-header">
                    <h2>Edit Post</h2>
                 </div>
                    <form action="edit-post-logic.php" enctype="multipart/form-data" method="POST">
                    
                    <input type="hidden" name="id"  value="<?=$post['id'] ?>" >
                    <input type="hidden" name="previous_thumbnail_name"  value="<?= $post['Thumbnail'] ?>" >
                    <input type="text"  value="<?= $post['Title'] ?>" class="input-style" name='Title' placeholder="Title">
                   
                    </br>
                    <select name="Category" class="input-style">
                    <p>
                    <?php  while ($category_id = mysqli_fetch_assoc($categories)) :?>
                    <option value="<?= $category_id['id'] ?>"><?= $category_id['Title']?></option> 
                     <?php endwhile ?>
                    </p>
                    </select>
                    </br>
                    <textarea rows="8" name="Body" class="input-style"  placeholder="body"><?= $post['Body']?></textarea>
                    
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured" >Featured</label>
                      <label for="thumbnail">Add thumbnail</label></br>
                      <input type="file" class="input-style" name="Thumbnail" id="thumbnail">
                    <button type="submit" name="submit"  class="button">Edit Post</button>
                    </form>
                    </div>
                    
              </section>