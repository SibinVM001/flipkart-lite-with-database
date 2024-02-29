<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart | Shop Online</title>
    <link rel="shortcut icon" href="images/logo/favicon-16x16.png" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="images/logo/favicon-32x32.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="searchBar">
                    <div>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="navLinks">
                    <div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item" id="navLoginBtn">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalLogin">
                                    Login
                                </button>
                            </li>
                            <li class="nav-item" id="navSignupBtn">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSignup">
                                    SignUp
                                </button>
                            </li>
                            <li class="nav-item" id="navLogoutBtn" style="display: none;">
                                <button type="button" class="btn btn-danger">
                                    logOut
                                </button>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <p>
                                        <?php 
                                            echo "<i class='fa-solid fa-user'></i> " . $_SESSION["name"];
                                            if($_SESSION['name'] != ''){
                                                echo "<script>
                                                document.getElementById('navLoginBtn').style.display = 'none';
                                                document.getElementById('navSignupBtn').style.display = 'none';
                                                document.getElementById('navLogoutBtn').style.display = '';
                                                </script>";
                                            }
                                        ?>
                                    </p>
                                </a>
                                
                            </li>
                            <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                            </li> -->
                        </ul>
                    </div>
                   
                </div>              
            </div>
        </div>
    </nav>
    <!-- Modal login-->
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <input type="email" name="email" id="loginEmail" placeholder="Enter Your Email"><br>
                        <div style="position: relative;height:max-contnet;width:max-content;">
                            <input type="password" name="password" id="loginPassword" placeholder="Enter Your Password" autocomplete="off">
                            <div class="d-flex align-items-center eyeContainer"><i class="fa-solid fa-eye" id="loginPassView"></i></div>
                        </div>
                        <div>
                            <button id="loginBtn" type="submit" class="btn btn-primary">Login</button>
                            <p>New User? <span><a href="#" data-bs-toggle="modal" data-bs-target="#modalSignup" data-bs-dismiss="modal" aria-label="Close">SignUp</a></span></p>
                            <p id="loginMsg"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modalOverlay">
        </div> -->
    </div>

    <!-- Modal signup-->
    <div class="modal fade" id="modalSignup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div style="text-align: center;">
                        <input type="text" name="name" id="name" placeholder="Enter Your Full Name"><br>
                        <input type="email" name="email" id="email" placeholder="Enter Your Email"><br>
                        <input type="text" name="phone" id="phone" placeholder="Enter Your Mobile Number" maxlength="10"><br>
                        <div style="position: relative;height:max-contnet;width:max-content;">
                            <input type="password" name="password" id="password" placeholder="Enter Your Password" autocomplete="off">
                            <div class="d-flex align-items-center eyeContainer"><i class="fa-solid fa-eye" id="passView"></i></div>
                        </div>
                        <div style="position: relative;height:max-contnet;width:max-content;">
                            <input type="password" name="rePassword" id="rePassword" placeholder="Re-Enter Your Password" autocomplete="off">
                            <div class="d-flex align-items-center eyeContainer"><i class="fa-solid fa-eye" id="rePassView"></i></div>
                        </div>
                        <div>
                            <button id="signupBtn" type="submit" class="btn btn-primary">SignUp</button>
                            <p>Already a user? <span><a href="#" data-bs-toggle="modal" data-bs-target="#modalLogin" data-bs-dismiss="modal" aria-label="Close">Login</a></span></p>
                            <p id="signupMsg"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="modalOverlay justify-content-center align-items-center" style="display: none;">
            <div class="d-flex justify-content-center align-items-center">
                <div class="spinner-border"role="status" style="color: skyblue;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div> -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>
</html>