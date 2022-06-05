<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$Pid=$_SESSION['Pid'];
$email_id=$_SESSION['email_id'];
$username=$_SESSION['username'];

if(isset($_POST['submit'])){
         $vdate = mysqli_real_escape_string($conn, $_REQUEST['vdate']);
        
         $visit_date = date("Y-d-m", strtotime($vdate));    

         $currentDateTime = date('Y-m-d');

         if($visit_date < $currentDateTime)
            echo '<script>alert("Enter a valid date of visit")</script>';
          else{
            $_SESSION['vdate'] = $vdate;
            header('location:book_slot.php');
          }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment</title>
  <link rel="stylesheet" href="book1.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body><br>
<h2 style="color: black">Doctor Appointment System</h2>
<div class="responsive">
    <div class="navigation"><br><br>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li style="background-color: #014;"><a href="#"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book an Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;View Appointments</a></li>
            <li><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>


      <form action="book.php" method="post">
      <div class="subcontainer">
        <label><b style="font-size: 20px;">Name:</b></label><br>
        <input type="text" name="username" disabled placeholder=<?php echo $_SESSION['username'];?>><br>


        <div class="form-group">
          <label for="vdate"><b style="font-size: 20px;">Date of Visit</b> (dd/mm/yyyy):</label><br>
            <input type="text" id="vdate" name="vdate" placeholder="dd/mm/yyyy" required=" " 
            pattern="^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$"><br><br>
        </div>

        <input type="submit" name="submit" id="btn" class="button1" value="Continue">
    </div>
</form>
</div>
</body>
</html>