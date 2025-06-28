<?php
require('check-sess-cookies.php');

$conn = mysqli_connect("localhost", "root", "", "triza");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ( isset($_POST['submit'])) {
    $title = trim(filter_var($_POST['Title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $description = trim(filter_var($_POST['Description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    
        // Escape inputs for SQL
        $title = mysqli_real_escape_string($conn, $title);
        $description = mysqli_real_escape_string($conn, $description);

        $query = "INSERT INTO category (Title, Description) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            $_SESSION['add-category'] = "Couldn't add category: " . mysqli_error($conn);
            header('location:add-category.php');
            exit;
        } else {
            $_SESSION['add-category'] = "Category '$title' added successfully";
            header('location:manage-categories.php');
            exit;
        }
    }

?>
