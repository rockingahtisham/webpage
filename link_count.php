<?php
    // Get the URL of the link that was clicked
$id = $_GET['id'];
function query_execute()
{};
if($id==1){
    $name='Nihari';
    // Connect to database
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // Query the database to get the current visit count for the URL
$result = mysqli_query($conn, "SELECT visit_count FROM link_visit_count WHERE Link_name='$name'");
echo $name;
if (mysqli_num_rows($result) == 0) {
    // If the URL is not in the database, insert a new row with a visit count of 1
    mysqli_query($conn, "INSERT INTO link_visit_count (Link_name, visit_count) VALUES ('$name', 1)");
} else {
    // If the URL is in the database, update the visit count by 1
    mysqli_query($conn, "UPDATE link_visit_count SET visit_count=visit_count+1 WHERE Link_name='$name'");
}
}
    header("location:Nihari recipe.html");
}
else if($id==2){
    $name='Biryani';
    // Connect to database
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // Query the database to get the current visit count for the URL
$result = mysqli_query($conn, "SELECT visit_count FROM link_visit_count WHERE Link_name='$name'");
echo $name;
if (mysqli_num_rows($result) == 0) {
    // If the URL is not in the database, insert a new row with a visit count of 1
    mysqli_query($conn, "INSERT INTO link_visit_count (Link_name, visit_count) VALUES ('$name', 1)");
} else {
    // If the URL is in the database, update the visit count by 1
    mysqli_query($conn, "UPDATE link_visit_count SET visit_count=visit_count+1 WHERE Link_name='$name'");
}
}
    header("location:Biryani.html");
}
else if($id==3){
    $name='Semolina pudding';
    // Connect to database
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // Query the database to get the current visit count for the URL
$result = mysqli_query($conn, "SELECT visit_count FROM link_visit_count WHERE Link_name='$name'");
echo $name;
if (mysqli_num_rows($result) == 0) {
    // If the URL is not in the database, insert a new row with a visit count of 1
    mysqli_query($conn, "INSERT INTO link_visit_count (Link_name, visit_count) VALUES ('$name', 1)");
} else {
    // If the URL is in the database, update the visit count by 1
    mysqli_query($conn, "UPDATE link_visit_count SET visit_count=visit_count+1 WHERE Link_name='$name'");
}
}
    header("location:Semolina.html");
}
else if($id==4){
    $name='Shikanjabeen';
    // Connect to database
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    // Query the database to get the current visit count for the URL
$result = mysqli_query($conn, "SELECT visit_count FROM link_visit_count WHERE Link_name='$name'");
echo $name;
if (mysqli_num_rows($result) == 0) {
    // If the URL is not in the database, insert a new row with a visit count of 1
    mysqli_query($conn, "INSERT INTO link_visit_count (Link_name, visit_count) VALUES ('$name', 1)");
} else {
    // If the URL is in the database, update the visit count by 1
    mysqli_query($conn, "UPDATE link_visit_count SET visit_count=visit_count+1 WHERE Link_name='$name'");
}
}
    header("location:Shikanjabeen.html");
}
?>