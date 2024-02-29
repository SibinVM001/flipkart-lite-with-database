<?php 
    // Create connection
    $conn = new mysqli("localhost", "root", "root", "flipkart");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $result = $conn->query("SELECT COUNT(productId) FROM products");
    if($row = mysqli_fetch_array($result)) {
        $count = $row['COUNT(productId)'];
        $slno = $count + 1;
    }

    if (!file_exists("uploads/'PDT".$slno."'")) {
        mkdir("uploads/PDT".$slno."", 0777, true);
        $target_dir = "uploads/PDT".$slno."/";
    }

    $target_file = $target_dir . basename($_FILES['productImages']["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES['productImages']["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 1) {
        move_uploaded_file($_FILES['productImages']["tmp_name"], $target_file);
    }
    
    $sql = "INSERT INTO products (productId, productName, productImages, productCategory, productCount, productColor, productPrice, salePrice) 
    VALUES ('PDT".$slno."', '".$_POST['productName']."','$target_file','".$_POST['productCategory']."','".$_POST['productCount']."','".$_POST['productColor']."','".$_POST['productPrice']."','".$_POST['salePrice']."')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>