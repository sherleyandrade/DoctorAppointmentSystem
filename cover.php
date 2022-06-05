<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="cover12.css">
</head>
<body>
<br>
  <div class="container">
      <button class="btn2" onclick="document.getElementById('id01').style.display='block'">Login</button>
            <button class="btn1" onclick="document.getElementById('id02').style.display='block'">Sign Up</button>
  </div>

<div id="id01" class="modal">  
  <form class="modal-content animate" method="post" action="cover.php">
    <div class="imgcontainer">
		<span style="float:left"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Log In</h2></span>
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	  
    <div class="container1">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

		<center><button class="btn2" type="submit" name="login">Login</button></center>
    </div>
  
    <div class="container1" style="background-color:#f1f1f1">
      <!-- <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button> -->
      <p ><center style="font-size: 20px;">Don't have an Account?</center></p>

      <center><button class="signupbtn" onclick="document.getElementById('id02').style.display='block';document.getElementById('id01').style.display='none'">SignUp</button></center>
    </div>
  </form>
</div>

<div id="id02" class="modal">
  <form class="modal-content animate" action="signup.php" method="post">
  	<div class="imgcontainer">
		<span style="float:left"><h2>&nbsp;&nbsp;&nbsp;&nbsp;Sign Up Here!!</h2></span>
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter the username" name="uname" required>

      <label><b>Email:</b></label><br>
	  <input type="email" placeholder="Enter the email-id" name="email" required><br>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter the password" name="psw" required>

      <label><b>Date of Birth:</b></label><br>
		<input type="date" name="dob" required>
	
		<label><b>Gender</b></label>&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="radio" name="gender" value="female" checked>&nbsp;Female
		<input type="radio" name="gender" value="male">&nbsp;Male<br><br>
		
		<label><b>Contact No:</b></label>
    <input type="text" placeholder="Contact Number" name="contact" required><br>
	  <center><button type="submit" name="signup">Sign Up</button></center>
    </div>
  </form>
</div>
<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
$error=" ";
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($conn,$_POST['uname']);
      $password = mysqli_real_escape_string($conn,$_POST['psw']); 
      
      $sql = "SELECT * FROM user WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
    
      if($count == 1) {
          $_SESSION['username']=$username;
          $_SESSION['Pid']=$row["Pid"];
          $_SESSION['email_id']=$row["email"];
         header("location: main.php");
      }
      else {
        echo '<script>alert("Invalid credentials")</script>';
      }
   }
?>
</body>
</html>
