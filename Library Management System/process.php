<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: logout.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	
   <title>Document</title>
	 <style>
        body 
		{
            font-family: verdana;
            text-align: center;
            background-color: #34495E;
        }
        h2 
		{
            font-size: 120%;
            color: #1B2631;
            width: 40%;
            margin: 15px auto;
            padding: 10px;
            border-radius: 10px;
            background-color: #85929E;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.7 );
        }
 
        nav 
		{
            width: 18%;
            background-color: #BFC9CA;
            margin: 0 auto;
            border-radius: 10px;
        }
        nav a 
		{
            color: #154360;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            display: inline-block;
        }
		nav a:hover
		{
		    color: black;
		}

     </style>
 </head>
  <body>
    <h2>Borrower Information</h2>

    <nav>
        <a href="logout.php">Logout</a>
    </nav>
    <?php
     $sid =$_POST['id'];
     //$cookie_name="book_borrowing";
	 function validateId($sid)
	 {
		 $pattern= "/^[0-9]{2}-[0-9]{5}-[1-3]{1}$/";
		 
		 if(preg_match($pattern,$sid))
		 {
			 
			 return true;
			 
		 }
		 else
		 {
			 return false;
		 }
	 }
	 if(validateId($sid))
	 {
      /*
	  if(isset($_POST['submit']))
	  {
	     $sid =$_POST['id'];
		 echo "Name:".$_POST['name'];
		 echo "<br>";
	     echo "Student ID:".$_POST['id'];
		 echo "<br>";
		 echo "Address:".$_POST['address'];
		 echo "<br>";
		 echo "Book name:".$_POST['books'];
		 echo "<br>";
		 echo "Borrowing Date:".$_POST['borrowing_date'];
		 echo "<br>";
		 echo "Return date:".$_POST['return_date'];
		 echo "<br>";
		 echo "You have successfully borrowed the book";
	  }
	    */
		echo "<br>";
		echo "<br>";
		$cookie_name="book_borrowing";
		if(isset($_POST['submit']))
		{
	     
		   $cookie_value=$sid;
		   if(isset($_COOKIE[$cookie_name]) && ($_COOKIE[$cookie_name]==$sid))
		   {
			   echo "You have already borrowed the book ".$_POST['books'].".Please return the book within 7 days";
		   }
		   else
		   {
			  setcookie($cookie_name,$cookie_value,time()+(7*24*60*60));
			  $sid =$_POST['id'];
		      echo "Name:".$_POST['name'];
		      echo "<br><br>";
	          echo "Student ID:".$_POST['id'];
		      echo "<br><br>";
		      echo "Address:".$_POST['address'];
		      echo "<br><br>";
		      echo "Book name:".$_POST['books'];
		      echo "<br><br>";
		      echo "Borrowing Date:".$_POST['borrowing_date'];
		      echo "<br><br>";
		      echo "Return date:".$_POST['return_date'];
		      echo "<br><br>";
		      echo "You have successfully borrowed the book";	 
		   }
	    }
	 }
	    else
	 {
		echo "ID is invalid"; 
	 }
	 
		
		$var1=$_POST['name'];
		$var2=$_POST['id'];
		$var3=$_POST['address'];
		$var4=$_POST['borrowing_date'];
		$var5=$_POST['return_date'];
		$var6=$_POST['books'];
		
		$con=mysqli_connect('localhost','root','','mydb');
		$sql="INSERT INTO book_list(uname,uid,uaddress,book_borrowing_date,book_return_date,booklist) VALUES('$var1','$var2','$var3','$var4','$var5','$var6')";
		if(isset($_POST['submit']) && mysqli_query($con,$sql))
		{
		
		}
		
    ?>
</body>
</html>
