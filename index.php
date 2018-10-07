<?php

session_start();

if(isset($_SESSION['id'])){
    header("location: home/index.php");
}

if(isset($_SESSION['register'])){
    extract($_SESSION['register']);
}

?>

<!DOCTYPE html>
<html lang='eng'>
    <head>
        <title>MyApp : Home</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
        </style>
        <link rel="stylesheet" href="style/style.css">
        <script src="scripts/script.js"></script>
    </head>
    <body>
        <div class="container">
            <form action ="signup/signup.php" method="POST" class="signup active">
                <div class="signheader">
                <h2 style="margin:0px;color:#354b68;margin:10px 0px 40px; font-family:arial;">SignUp</h2>
                </div>
                <div class="title">
                    <input type="text" id="fname" name="fname" required="required" value="<?php if(isset($fname)){echo $fname;} ?>">
                    <label for="fname">First Name</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="text" id="lname" name="lname" required="required" value="<?php if(isset($lname)){echo $lname;} ?>">
                    <label for="lname">Last Name</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="email" id="email" name="email" required="required">
                    <label for="email">Email Address</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="password" id="password" name="password" required="required">
                    <label for="password">Password</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="password" id="cnf" name="cnf" required="required">
                    <label for="cnf">Confirm Password</label>
                    <span></span>
                </div>
                <div>
                    <p id="demo" style="color:red;">
                        <?php
                            if(isset($_GET['error'])){
                                echo $_GET['error'];
                            }
                        ?>
                    </p>
                </div>
                <div class="title">
                    <input type="submit" value="Signup" name="signup" class="btn">
                </div>
                <div class="title">
                    Already have an account? <a href="#signup" id="signin">Signin</a>
                </div>
            </form>
            <form action="login/login.php" method="POST" class="signin">
                <div class="signheader">
                <h2 style="margin:0px;color:#354b68;margin:10px 0px 40px; font-family:arial;">SingIn</h2>
                </div>
                <div class="title">
                    <input type="email" id="login-email" name="email" required="required">
                    <label for="login-email">Email Address</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="password" id="login-password" name="password" required="required">
                    <label for="login-password">Password</label>
                    <span></span>
                </div>
                <div class="title">
                    <input type="submit" value="Signin" name="signup" class="btn">
                </div>
                <div>
                    <p style="color:red;"><?php if(isset($_GET['login_error'])){ echo $_GET['login_error'];} ?></p>
                </div>
                <div class="title">
                    Don't have an Account? <a href="#" id="signup">Signup</a>
                </div>
            </form>        
        </div>

        <script>
            // accessing the signin and signup switching buttons
            let signin = document.getElementById('signin');
            let signup = document.getElementById('signup');
            let form1 = document.querySelector('form.signup');
            let form2 = document.querySelector('form.signin');
            console.log(signin);
            console.log(signup);

            signin.addEventListener('click', function() {
                form1.classList.remove('active');
                form2.classList.add('active');
                form1.reset();
                form2.reset();
            },false);

            signup.addEventListener('click', function() {
                form2.classList.remove('active');
                form1.classList.add('active');
                form1.reset();
                form2.reset();
            },false);
            
            if(window.location.href.match("signup")){
                form1.classList.remove('active');
                form2.classList.add('active');
            }

        </script>
    </body>
</html>