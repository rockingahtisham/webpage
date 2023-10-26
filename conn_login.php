<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "recipe_hub";

// Get form inputs
$email = $_POST['email'];
$pass = $_POST['password'];


// Connect to database
$conn = new mysqli($servername, $username,'', $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query database for user
$sql = "SELECT * FROM user_information WHERE Email='$email' AND Password='$pass'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows > 0) {
  session_start();
  $_SESSION['email']=$email;
    // Query the database to see if the user exists
$result = mysqli_query($conn, "SELECT * FROM Login_Record WHERE Email='$email'");

if (mysqli_num_rows($result) == 0) {
  // If the user doesn't exist, insert a new row with their email and a login count of 1
  mysqli_query($conn, "INSERT INTO Login_Record (Email, login_count) VALUES ('$email', 1)");
} else {
  // If the user exists, update their login count by 1
  mysqli_query($conn, "ALTER TABLE Login_Record MODIFY ID INT;");
  mysqli_query($conn, "UPDATE Login_Record SET login_count=login_count+1 WHERE Email='$email'");
  mysqli_query($conn, "ALTER TABLE Login_Record MODIFY ID INT AUTO_INCREMENT;");
}
    // User exists, redirect to home page
    header("Location:login_success.html");
} else {
    // User doesn't exist, display error message
    header ("location:login_error.html");
}

// Close database connection
$conn->close();
?>