<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login</title>
    <link rel="stylesheet" href="Css_files/login.css">

</head>

<body>

    <section class="outline">

        <div class="title">
            <img src="Images/logo.png" alt="Logo" class="logoImg">
            <h1>LOGIN</h1>
        </div>
        <hr>
        <div class="content">
            <form action="process_login.php" method="post">

                <p class="email">
                    <!-- <label for="mail">Email Address</label><br> -->
                    <input type="email" name="user_mail" id="mail" placeholder="Email Address">
                </p>

                <p class="password">
                    <!-- <label for="pass">Password</label><br> -->
                    <input type="password" name="user_pass" id="pass" placeholder="Password">
                </p>

                <!-- <p id="forgot"><a href="#">forgot password?</a></p> -->

                <input class="button" type="submit" value="LOGIN">

            </form>

            <p class="register">Don't have an account? <a href="registration.php">SIGN UP</a></p>
            <p><a href="index.php">Back</a></p>
        </div>
    </section>
</body>

</html>