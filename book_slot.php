<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$vdate=$_SESSION['vdate'];
$Pid=$_SESSION['Pid'];
$email_id=$_SESSION['email_id'];
$username=$_SESSION['username'];

if(isset($_POST['submit'])){
	$doctor = mysqli_real_escape_string($conn, $_REQUEST['doctor']);
	$time = mysqli_real_escape_string($conn, $_REQUEST['appoint_time']);

	$sql1="SELECT specialization FROM top_doctors";
    $results=$conn->query($sql1); 
    $rs=$results->fetch_assoc();
         
    $specialization = $rs["specialization"];
	
	$query = "SELECT Did FROM doctor where Dname = '$doctor' and specialization = '$specialization' ";
	$result = $conn->query($query);
	if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
    		$Did = $row["Did"];
  }
} 

	//$query1 = "INSERT INTO slots(Did,Date,Slot,booking) values('$Did','$vdate','$time','Yes')";

	$query2 = "INSERT INTO `booking`(`Pid`,`Did`,`Pname`, `email_id`, `Dname`, `specialization`, `slot_time`, `slot_date`, `booking`) VALUES ('$Pid','$Did','$username','$email_id','$doctor','$specialization','$time','$vdate','Yes')";

		if(mysqli_query($conn,$query2)){
			// $_SESSION['Did'] = $Did;
			// $_SESSION['slot_date'] = $time;
			// $_SESSION['slot_time'] = $vdate;
			header('location:main.php');
		}

		else{
			        echo '<script>alert("Entered slot is full!!")</script>';
		}
}

?>

<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Appointment</title>

<link rel="stylesheet" href="book_slot.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
	<br>
	<h2 style="color: black">Doctor Appointment System</h2>
<div class="responsive">
    <div class="navigation"><br><br>
        <ul>
            <li><a href="main.php"><i class="fas fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a></li>
            <li style="background-color: #014;"><a href="book.php"><i class="fas fa-calendar-check"></i>&nbsp;&nbsp;&nbsp;Book an Appointment</a></li>
            <li><a href="viewappointments.php"><i class="fas fa-address-card"></i>&nbsp;&nbsp;&nbsp;View Appointments</a></li>
            <li><a href="cancel.php"><i class="fas fa-window-close"></i>&nbsp;&nbsp;&nbsp;Cancel Appointments</a></li>
            <li><a href="cover.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>

    <form action="book_slot.php" method="post">
      <div class="subcontainer">
        <label><b style="font-size: 20px;">Doctor:</b></label><br>
        <select required="" name="doctor">
		<option value="">Select Doctor</option>

		<?php
		$sql1="SELECT * FROM top_doctors";
         $results=$conn->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["name"]; ?>"><?php echo $rs["name"]; ?></option>
		<?php
		}
		?>
		</select><br>

        <div class="form-group">
          <label>Appointment Time: </label><br>
          <select name="appoint_time" required>
              <option value="" disabled selected>Choose the time</option>
              <option value="9">9:00 A.M</option>
              <option value="10">10:00 A.M </option>
              <option value="11">11:00 A.M</option>
              <option value="12">12:00 P.M</option>
          </select>
        </div>

        <input type="submit" name="submit" id="btn" class="button1" value="Confirm">
    </div>
</form>
</div>
	
</body>
</html>