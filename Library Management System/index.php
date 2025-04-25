<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: logout.php");
    exit();
   }
?>
<!DOCTYPE html>
<html>
 <head>
  <title>Book Borrowing</title>
      <style>
        body 
		{
            font-family: verdana;
            text-align: center;
            background-color: #34495E;
        }
        h1 
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
   <h1>Welcome to Book Borrowing Website</h1>
   <nav>
        <a href="">Profile</a>
        <a href="logout.php">Logout</a>
    </nav>
   <br>
   <figure style="text-align:center;">
   <img src="vinno_kichu.png" style="width:240px;height:180px;">
   <figcaption>Ebar Vinno Kichu Hok</figcaption>
   <img src="aroj_ali.jpg" style="width:240px;height:180px;">
   <figcaption>Aroj Ali Somipe</figcaption>
   <img src="paap.jpg" style="width:240px;height:180px;"> <br>
   <figcaption>Paap</figcaption>
   <img src="anyman.jpg" style="width:240px;height:180px;">
   <figcaption>Anyman</figcaption>
   <img src="brishti_bilash.jpg" style="width:240px;height:180px;">
   <figcaption>Brishti Bilash</figcaption>
   <img src="proloy.jpg" style="width:240px;height:180px;">
   <figcaption>Proloy</figcaption>
   </figure>
   
   <h3 style="text-align:center;">Please fill out the form below</h3>
   <form style="text-align:center;" action="process.php" method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
	<label for="id">ID:</label><br>
    <input type="text" id="id" name="id"><br>
	<label for="address">Address:</label><br>
	<input type="text" id="address" name="address"><br>
	<label for="borrowing_date">Borrowing Date:</label><br>
	<input type="date" id="borrowing_date" name="borrowing_date"><br>
	<label for="return_date">Return Date:</label><br>
    <input type="date" id="return_date" name="return_date"><br>
    <label for="books">Choose a book from below</label><br>
	<select name="books" id="books">
	  <optgroup label="Arif Azad Books">
	  <option value="Ebar Vinno Kichu Hok">Ebar Vinno Kichu Hok</option>
	  <option value="Aroj Ali Somipe">Aroj Ali Somipe</option>
	  </optgroup>
	  <optgroup label="Humayun Ahmed Books">
	  <option value="Paap">Paap</option>
	  <option value="Brishti Bilash">Brishti Bilash</option>
	  </optgroup>
	  <optgroup label="Zafar Iqbal Books">
	  <option value="Proloy">Proloy</option>
	  <option value="Anyman">Anyman</option>
	  </optgroup>
	</select>
	<br>
	<input type="submit" value="Submit" name="submit">
	  
   </form>
    
   
 </body>

</html>