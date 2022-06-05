<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_POST['signup'])){
$username= mysqli_real_escape_string($conn, $_REQUEST['uname']);
$email_id=mysqli_real_escape_string($conn, $_REQUEST['email']);
$password = mysqli_real_escape_string($conn, $_REQUEST['psw']);
$dob = mysqli_real_escape_string($conn, $_REQUEST['dob']);
$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
$phone= mysqli_real_escape_string($conn, $_REQUEST['contact']);

$query = "INSERT INTO user(username,email,password,dob,gender,phone) VALUES('$username','$email_id','$password','$dob','$gender','$phone')";

if(mysqli_query($conn, $query)){
  $sql = "SELECT Pid,email FROM user WHERE email = '$email_id'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result); 
    
      if($count == 1) {
          $_SESSION['username']=$username;
          $_SESSION['email_id']=$row["email"];
          $_SESSION['Pid']=$row["Pid"];
    header('location:main.php');
} 
}
mysqli_close($conn);
}
?>