<?php

    session_start();
    if(isset($_SESSION['connected'])) header('Location: home.php');
    else {
        if(isset($_POST['login'])){
            require_once('php/connection.php');
            $conn = new Connection();
            if($conn->login($_POST['username'], $_POST['password'])){
                echo "<script>  alert('Les informations sont incorrects') </script>";
            }else{
                $_SESSION['connected'] = true;
                header('Location: home.php');
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assetClient/css/Login_Register_Forms.css">
    <link rel="stylesheet"
        href="assetAdmin/bootstrap-5.1.3-dist/css/bootstrap.css">
    <!--bootstrap css link-->
    <script src="assetAdmin/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <!--bootstrap js link-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

    <!--*********************login form code **********************-->
<div class="login_all">
    <div class="login_container">
        <div class="login_container_items">
            <div class="title">S'identifier</div>
        </div>
        <div class="login_content">
            <form method="POST">
                <div class="login_user-details">
                    <div class="login_input-box">
                        <span class="login_details">Nom d'utilisateur</span>
                        <input type="text" name="username" placeholder="Adresse email">
                    </div>
                    <div class="login_input-box">
                        <span class="login_details">Mot de passe</span>
                        <input type="password" name="password" placeholder="Nouveau mot de passe">
                    </div>
                </div>
                <div class="login_button">
                    <input type="submit" name="login" value="S'identifier">
                </div>
            </form>
        </div>
    </div>
</div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>