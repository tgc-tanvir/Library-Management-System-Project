<?php
//
if (session_status() >= 0){
      session_start();
      if(isset($_SESSION["uname"])) {
            header("refresh: 0.5; url = private.php");
      }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <title>Registration</title>
	  <link rel="stylesheet" href="loginstyle.css">
</head>
<body>
      <div class="background">
	  
	      <div class="login">
		     <div class="login-form">
			   <h2>Registration</h2>
                <form method="POST">
                  <input type="text" name="uname" placeholder="Username" required><br><br>   
                  <input type="password" name="pass" placeholder="Password" required><br><br>   
                  <input type="password" name="confirm_pass" placeholder="Confirm Password" required><br><br>
                  <input type="text" name="ques" class="login-input" placeholder="Set a Security Question" required><br><br>
				  <input type="text" name="ans" class="login-input" placeholder="Answer of the Question" required><br><br>
                  <input type="submit" value="Confirm" name="submit">
                </form>
				
                <?php
                    if(isset($_POST["submit"])){
                        $con = mysqli_connect('localhost', 'root', '', 'mydb');
        
                            $user = $_POST["uname"];
                            $pass = $_POST["confirm_pass"];
					        $qus = $_POST["ques"];
					        $ans = $_POST["ans"];
							$sql_check = "SELECT * FROM records WHERE username = '$user' AND qus= '$qus' AND ans= '$ans'";
                            $result = mysqli_query($con, $sql_check);
                            if($_POST["pass"]!=$_POST["confirm_pass"]){
                                echo "<p class = 'warning'>Password didn't match!</p>";
                            }
                            elseif (mysqli_num_rows($result) == 0){
                                $sql_insert="INSERT INTO records(username,password,qus,ans) VALUES('$user','$pass','$qus','$ans')";
                                mysqli_query($con, $sql_insert);
                                echo "<p class = 'success'>Sign Up Successfull..</p>";
                                echo "<p class = 'success'>Redirecting to login page....</p>";
                                
                                header("refresh: 3; url=login.php");
                                exit();
                            } 
                            else {
                                echo "<p class = 'warning'>You have already registered!</p>";
                            } 
					}
                ?>					
			 </div>
		  </div>
	  </div>
</body>
</html>