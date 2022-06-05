<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$Pid=$_SESSION['Pid'];
$username=$_SESSION['username'];

$query=mysqli_query($conn,"SELECT * FROM booking where Pid=$Pid and booking='YES'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment</title>
  <link rel="stylesheet" href="cancel1.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<br>
<h2 style="color: black">Doctor Appointment System</h2>
<div class="responsive">
    <div class="navigation"><br><br>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li><a href="book.php"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book an Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;View Appointments</a></li>
            <li style="background-color: #014;"><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>
    
<div class="show">
  <p style="font-size: 25px;padding-top: 25px;">Patient name: <?php echo $username?></p><br/>
<table>
<?php
          while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
          {
  
            $Dname=$row['Dname'];
            $specialization=$row['specialization'];
            $slot_time=$row['slot_time'];
            $slot_date=$row['slot_date'];
        ?>

    <tr><td>Doctor</td><td><?php echo $Dname ?></td><td><a href="delete_appointment.php?booking_id=<?php echo $row['booking_id'];?>">X</a></td></tr>
    <tr><td>Specialization</td><td><?php echo $specialization; ?></td><td> </td></tr>
    <tr><td>Time</td><td><?php
     if($slot_time>'11')
      {
        echo $slot_time;
        echo ":00 PM";
      }
      else {
        echo $slot_time;echo ":00 AM";
      }
      ?></td></tr>
    <tr><td>Date</td><td><?php echo $slot_date; ?></td><td> </td></tr>
    <tr><td><hr></td><td><hr></td><td></td></tr>
  <?php } ?>
</table>
</div>
</body>
</html>