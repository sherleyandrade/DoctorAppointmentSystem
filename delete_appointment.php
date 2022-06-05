<?php
session_start();
$conn = mysqli_connect("remotemysql.com", "NVBXd4n6Q9", "cyJkBWARLr", "NVBXd4n6Q9");

$booking_id = $_GET['booking_id'];

$query = "UPDATE booking set booking = 'No' WHERE booking_id=$booking_id";

if(mysqli_query($conn,$query))
{
	header('location:viewappointments.php');
}
?>
<html>
<body>

</body>
</html>

