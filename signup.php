<?php
    session_start();
    include('config/db.php');
    if (isset($_POST['signup'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        if (!empty($name) && !empty($email) && !empty($pass) && $cpass == $pass) {
            $check = "SELECT * FROM `users` WHERE `name` = '$name' AND `email` = '$email'";
            $cquery = mysqli_query($db_con, $check);
            if (mysqli_num_rows($cquery)) {
                echo"<script> 
                        alert('DATA SUPPLIED IS ALREADY IN USE')
                        setTimeout(function(){
                            window.location.replace('index.php')
                        },1000) 
                    </script>";
            } else {
                $sql = "INSERT INTO `users`(`id`,`name`,`email`,`password`) VALUES('','$name','$email','$pass')";
                $query = mysqli_query($db_con, $sql);
                if ($query) {
                    header('location: index.php');
                } else {
                    echo 'You do not exist';
                } 
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
    <link rel="stylesheet" href="css/form_style.css">
    <title>SIGN UP PAGE</title>
</head>

<body>
    <section class="login-container">
        <div class="holder">
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Name" autocomplete="off">
                <input type="email" name="email" placeholder="Email" autocomplete="off">
                <input type="password" name="pass"  placeholder="Password">
                <input type="password" name="cpass" placeholder="Repeat Password">
                <div class="login-btn-holder">
                    <button name="signup">SIGN UP</button>
                    <a href="/todo">
                        LOGIN
                    </a>
                </div>
            </form>
        </div>
    </section>
</body>

</html>