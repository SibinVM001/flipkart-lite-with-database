<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "root", "flipkart");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $data = mysqli_fetch_array($conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'"));
    if($data){
        if($data['password'] == $_POST['password']){
            session_start();
            $_SESSION['userId'] = $data['user_id'];
            $_SESSION['name'] = $data['name'];   
        }
        else{
            echo 'Incorrect Password!';
        }
    }
    else{
        echo "Email does not exists, please Signup!";
    }

    $conn->close();
?>