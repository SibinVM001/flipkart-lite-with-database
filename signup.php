<?php 
    // Create connection
    $conn = new mysqli("localhost", "root", "root", "flipkart");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 


    $result = $conn->query("SELECT COUNT(user_id) FROM users");
    if($row = mysqli_fetch_array($result)) {
        $count = $row['COUNT(user_id)'];
        $slno = $count + 1;
    }

    $email = mysqli_fetch_array($conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'"));
    if($email){
        echo "Email already exists, please login";
    }
    else{
        $sql = "INSERT INTO users (user_id, name, password, email, phone, joining_date) 
        VALUES ('USR".$slno."', '".$_POST['name']."', '".$_POST['password']."','".$_POST['email']."','".$_POST['phone']."','".date("F j, Y")."')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            $data = mysqli_fetch_array($conn->query("SELECT * FROM users WHERE email='".$_POST['email']."'"));
            session_start();
            $_SESSION['userId'] = $data['user_id'];
            $_SESSION['name'] = $data['name'];
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>
