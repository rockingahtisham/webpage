<?php 
$conn = new mysqli('localhost','root','','recipe_hub');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{
    $sql = "SELECT recipe FROM rating GROUP BY recipe ORDER BY AVG(rating) DESC LIMIT 1";
    $result = $conn->query($sql);
    $row=$result->fetch_assoc();
    $abcd=$row['recipe'];
    echo $abcd;
    switch($abcd)
    {
        case "Nihari":
            header("location:Nihari recipe.html");
            break;
        case "Biryani":
            header('location:Biryani.html');
            break;
        case "Semolina halwa":
            header('location:Semolina.html');
            break;
        case "Shikanjabeen":
            header('location:Shikanjabeen.html');
            break;
    }
}
?>