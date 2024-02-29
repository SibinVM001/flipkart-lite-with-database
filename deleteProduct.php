<?php 
    // Create connection
    $conn = new mysqli("localhost", "root", "root", "flipkart");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $result = $conn->query("DELETE FROM products WHERE productId='".$_POST['productId']."'");
    // echo "Product deleted successfully";

    $conn->close();
?>