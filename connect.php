<?php
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $c_password=$_POST['c_password'];
    if($c_password!=$password)
    {
        header("location:Confirm_password_error.html");
    }
    else{
        $conn = new mysqli('localhost','root','','recipe_hub');
    if($conn->connect_error){ die('connection failed:'.$conn->connect_error);
    }
    else{
        $stmt=$conn->prepare("insert into user_information(Fname,Lname,Email,password) values(?,?,?,?)");
        $stmt->bind_param("ssss",$fname,$lname,$email,$password);
        $query="Select * from user_information where Email='$email'";
        $result= mysqli_query($conn,$query);
        $a= mysqli_num_rows($result);
        if($a)
        {
            header("location:email_already_exists.html");
        }
        else
        {
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
 
            session_start();
            $_SESSION['email']=$email;
            $stmt->execute();
            header("location:Reg_success.html");
            $stmt->close();
            $conn->close();
        }
        }
    }
    
?>    