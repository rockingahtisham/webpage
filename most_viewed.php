<?php 
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "SELECT Link_name FROM link_visit_count WHERE visit_count=(SELECT MAX(visit_count) FROM link_visit_count)";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $abcd=$row['Link_name'];
    echo $abcd;
    switch($abcd)
    {
        case "Nihari":
            header("location:Nihari recipe.html");
            break;
        case "Biryani":
            header('location:Biryani.html');
            break;
        case "Semolina pudding":
            header('location:Semolina.html');
            break;
        case "Shikanjabeen":
            header('location:Shikanjabeen.html');
            break;
    }
}
?>