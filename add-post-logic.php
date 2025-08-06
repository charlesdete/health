<?php

 require('check-sess-cookies.php');

$servername = "localhost";
$dbname = "triza";
$dbusername = "root";
$dbpassword = "";
 
$conn =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

//fetch categories from database
$query = "SELECT * FROM category";
$categories = mysqli_query($conn,$query);
 

 if(isset($_POST['submit'])){
    $author_id= $_SESSION['Id'];
    $title = filter_var($_POST['Title'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['Body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['Category'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['Thumbnail'];
     $is_featured=filter_var($_POST['is_featured']);


    //set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?:0;
    //validate form data
    if(!$title){
        $_SESSION['add-post'] ="Enter post title";
    }elseif(!$category_id){
        $_SESSION['add-post']= "Select post category";

    }elseif(!$body){
        $_SESSION['add-post'] ="Enter post body";
    }elseif(!$thumbnail['name']){
        $_SESSION['add-post']= "Choose post thumbnail";
    }else{
        //work on thumbnail
        //rename the image
     $time = time();
     //make each image name unique
     $thumbnail_name = $time . $thumbnail['name'];
     $thumbnail_tmp_name =$thumbnail['tmp_name'];
     $thumbnail_destination_path = 'images' . $thumbnail_name;
     $thumbnail_path ='images';
     //make sure file is an image
     $allowed_files = ['png','jpg','jpeg'];
     $extension = explode('.', $thumbnail_name);
     $extension = end($extension);
     
     
    if (in_array($extension, $allowed_files)){
         //make sure image is not too big.
         if ($thumbnail['size'] < 20_000_000 ){

           //upload thumbnail hhhhhhhhhhhh
            move_uploaded_file($thumbnail_tmp_name,$thumbnail_destination_path);
         }else {
            $_SESSION['add-post'] = "file size too big.Should be less than 2mb";
         }
        }else{
            $_SESSION['add-post'] = "file should be png ,jpg or jpeg";
        }

        $compress_thumbnail ="compress_".$thumbnail_name;
        //rename compressed file
        $compress_thumbnail=$thumbnail_path.$compress_thumbnail;
    
        // $compress_name= compressImage($thumbnail_name,$compressed_thumbnail);
        //compressImage(sourcefile,CompressFile)
        unlink($thumbnail_name);
        //delete original file and keep only the compressed image
    }
     function compressImage($thumbnail_path,$compress_thumbnail){
       $image_info=getimagesize($thumbnail_path);
       if($image_info['mine']=='image/jpg'){
        $thumbnail_path=imagecreatefromjpeg($thumbnail_path);
        imagejpeg($thumbnail_path,$compress_thumbnail,40);
       }
       elseif($image_info['mine']=='image/png'){
        $thumbnail_path=imagecreatefrompng($thumbnail_path);
        imagepng($thumbnail_path,$compress_thumbnail,40);
       }
       die ($compress_thumbnail);
       return;
     }
     //redirect back (with form data)  to add-post page  if there is any problem
     if(isset($_SESSION['add-post'])){
        $_SESSION['add-post-data'] =$_POST;
        // header('location:add-post.php');
        // die();
     }else{
        //set is_featured of all posts to 0 if is_featured for this post is 1
        if($is_featured == 1){
            $zero_all_is_featured_query ="UPDATE post SET is_featured = 0";
            $zero_all_is_featured_result= mysqli_query($conn,$zero_all_is_featured_query);
        }
    }
     //insert into posts table 
    $query="INSERT INTO post (Title,Body,Category_id,Thumbnail,is_featured,Author_id)
        VALUES ('$title','$body',$category_id,'$thumbnail_name',$is_featured,'$author_id')";

     $result=mysqli_query($conn,$query);
    
    if(!mysqli_errno($conn)){
     $_SESSION['add-post-success'] = "New post added successfully";
    // header('location:add-post.php');
    // die();
    }
        
     }
    
header('location:manage-post.php');
?> 

