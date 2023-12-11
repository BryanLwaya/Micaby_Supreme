<!DOCTYPE html>
<html lang="en">

<head>

    <title>Registration</title>
    <link rel="stylesheet" href="Css_files/registration.css">

</head>

<body>

    <section class="outline">
        <img id="back-img" src="Images/reg-background.jpg" alt="reg_img">

        <div class="form_layout">
            <div class="title">
                <img src="Images/logo.png" alt="Logo" class="logoImg">
                <h1>SIGN UP</h1>
            </div>
            <hr>

            <form action="process_register.php" method="post" enctype="multipart/form-data">

                <div class="names">
                    <p class="fname">
                        <label for="fname">First name</label><br>
                        <input type="text" name="user_fname" id="fname">
                    </p>

                    <p class="sname">
                        <label for="sname">Surname</label><br>
                        <input type="text" name="user_sname" id="sname">
                    </p>
                </div>

                <div class="user-info">
                    <p class="email">
                        <label for="mail">Email Address</label><br>
                        <input type="email" name="user_mail" id="mail" placeholder="example@example.com">
                    </p>

                    <p class="contact">
                        <label for="contact">Tel No</label><br>
                        <input type="tel" name="user_contact" id="contact">
                    </p>

                    <p class="image">
                        <label for="img">Profile Image</label><br>
                        <input type="file" name="user_img" id="img">
                    </p>

                    <p class="password">
                        <label for="pass">Enter Password</label><br>
                        <input type="password" name="user_pass" id="pass">
                    </p>
                    
                    <p class="role">
                        <label for="role">Role</label><br>
                        <select name="user_role" id="role" required>
                            <option value="">- Select -</option>
                            <option value="customer">Customer</option>
                            <option value="admin">Admin</option>
                        </select>
                    </p>
                    
                </div>
                <input id="button" type="submit" name="create" value="CREATE ACCOUNT">

            </form>
            
            <p class="user-login">Already have an account? <a href="login.php" id="login">LOGIN</a></p>
            <a href="index.php">Back</a>
        </div>
    </section>

</body>

</html>