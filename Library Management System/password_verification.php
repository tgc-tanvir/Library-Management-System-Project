<!DOCTYPE html>
<head>
 <title>Reset Password</title>
  <body>
    <!DOCTYPE html>
<html>
<head>
    <title>Password Verification</title>
    <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
    <div class="background">

        <div class="login">
            <div class="login-form">
                <h2>Update Password</h2>
                <form method="POST">
                    <input type="text" name="uname" placeholder="Username" required><br><br>
                    <input type="password" name="new_pass" placeholder="New Password" required><br><br>
                    <input type="password" name="confirm_pass" placeholder="Confirm Password" required><br><br>
                    <input type="text" name="ques" class="login-input" placeholder="Security Question" required><br><br>
                    <input type="text" name="ans" class="login-input" placeholder="Question Answer" required><br><br><br>
                    <input type="submit" value="Set Password" name="submit"><br>
                </form>

                <?php
                    if(isset($_POST["submit"])){
                        $con = mysqli_connect('localhost', 'root', '', 'mydb');
        
                            $user = $_POST["uname"];
                            $pass = $_POST["confirm_pass"];
                            $qus = $_POST["ques"];
                            $ans = $_POST["ans"];
                            $sql= "SELECT * FROM records WHERE username = '$user' AND  qus = '$qus' AND ans = '$ans'";
                            $result = mysqli_query($con, $sql);
                            if($_POST["new_pass"]!=$_POST["confirm_pass"]){
                                echo "<p class = 'warning'>Password didn't match!</p>";
                            }
                            elseif (mysqli_num_rows($result) > 0){
                                $sql_update = "UPDATE records SET password='$pass' WHERE username='$user'";
                                mysqli_query($con, $sql_update);

                                echo "<p class = 'success'>Password Changed Successfully..</p>";
                                echo "<p class = 'success'>Redirecting to login page....</p>";
                                
                                header("refresh: 3; url=login.php");
                                exit();
                            } 
                            else {
                                echo "<p class = 'warning'>Invalid Username or Security Questions</p>";
                            }   
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>