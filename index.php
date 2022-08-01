<?php 
    session_start();
    include('config/db.php');
    $_SESSION['log_in'] = false;
    if (isset($_POST['login'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if (!empty($name) && !empty($email) && !empty($pass)) {
            $sql = "SELECT * FROM `users` WHERE `name` = '$name' AND `email` = '$email' AND `password` ='$pass'";
            $query = mysqli_query($db_con, $sql);
            if (mysqli_num_rows($query)) {
                $_SESSION['log_in'] = true;
                $_SESSION['username'] = $name;
                $_SESSION['usermail'] = $email;
                $_SESSION['userpass'] = $pass;
                header('location: dashboard.php');
            } else {
                echo "<script> alert('DATA SUPPLIED DO NOT MATCH MAKE SURE YOU ARE SIGN UP BEFORE LOG IN') </script>";
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
    <title>LOGIN PAGE</title>
</head>
<body>
    <section class="login-container">
        <div class="holder">
            <form action="" method="POST">
                <input type="text" name="name" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pass" placeholder="Password">
                <div class="login-btn-holder">
                    <button name="login">LOGIN</button>
                    <a href="/todo/signup.php">
                        SIGN UP
                    </a>
                </div>
            </form>
        </div>
    </section>
</body>
</html>