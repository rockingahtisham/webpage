<?php
    session_start();
    $email=$_SESSION['email'];
    $name='Semolina halwa';
    $rating=$_POST['rating'];
    // Connect to database
    $conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // Query the database to get the current visit count for the URL
$result1 = mysqli_query($conn, "SELECT Email FROM rating WHERE email='$email' AND recipe='$name'");
$a=mysqli_num_rows($result1);
if ($a==0) {
    // If the URL is not in the database, insert a new row with a visit count of 1
    mysqli_query($conn, "INSERT INTO rating (Email, recipe,rating) VALUES ('$email','$name','$rating')");
    header("location:Sl_rating_Sucess.html");
} else {
    // If the URL is in the database, update the visit count by 1
    mysqli_query($conn, "UPDATE rating SET rating=$rating WHERE email='$email' AND recipe='$name'");
    header("location:Sl_rating_Success_u.html");
}
}

?>