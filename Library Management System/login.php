<?php
    session_start();
?>.
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="background">

        <div class="login">
            <div class="login-form">
                <h2>Welcome to Login Page</h2>
                <form method="POST">
                    <input type="text" name="uname" placeholder="Username" required><br><br>
                    <input type="password" name="pass" placeholder="Password" required><br><br><br>
                    <input type="submit" value="Login" name="submit"><br>
                </form>
                <a href="password_verification.php">Forgot Password?</a><br><br>
                <a href="signup.php">Sign Up</a>

                <?php
                    if (isset($_POST["submit"])) {
                        $con = mysqli_connect('localhost', 'root', '', 'mydb');

                        if ($_POST["submit"] == "Login") {
                            $user = $_POST["uname"];
                            $pass = $_POST["pass"];
                            $sql = "SELECT * FROM records WHERE username = '$user' AND password = '$pass'";
                            $result = mysqli_query($con, $sql);

                            if (mysqli_num_rows($result) > 0) {
                                header("Location: index.php");

                                $_SESSION['user']=$user;
                                exit();
                            } else {
                                echo "<p class='warning'>Invalid Username or Password</p>";
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
