<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
$email_id = $_SESSION['email_id'];
$Pid=$_SESSION['Pid'];
$username=$_SESSION['username'];
//$time=$_SESSION['time'];

$_SESSION['Pid']=$Pid;
$_SESSION['username']=$username;
$_SESSION['email_id']=$email_id;
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{
    mysqli_query($conn,"UPDATE all_top_doctors set Pid=$Pid where Pid = 0");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Appointment</title>
    <link rel="stylesheet" href="main2.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body><br>
    <h2><strong style="font-size: 30px;">&nbsp;&nbsp;&nbsp;Hello, <?php echo $_SESSION['username']; ?> !</strong></h2>
    <div class="navigation"><br><br>
        <ul>
            <li style="background-color: #014;"><a href="#"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="book.php"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book an Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;View Appointments</a></li>
            <li><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>
<img src="image1.png" alt=" " class="responsive">
</body>
</html>