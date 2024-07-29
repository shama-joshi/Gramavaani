<?php
	$meetingDate=$_POST['meetingDate'];
	$meetingTime=$_POST['meetingTime'];
	$meetingPlace=$_POST['meetingPlace'];
	$meetingTitle=$_POST['meetingTitle'];
	$host=$_POST['host'];

	// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
} else
	{
$stmt=$conn->prepare("insert into meetinginput(meetingdate,meetingtime,meetingplace,meetingtitle,host) values(?, ?, ?, ?, ?)");

$stmt->bind_param( "sssss",$meetingDate,$meetingTime,$meetingPlace,$meetingTitle,$host);
	    $stmt->execute();
	    
		echo "<script>alert('Schedule succesfully')</script>";
		echo "<script>window.location.replace('/gramavaani_v2/meetinginputsecre.html')</script>";
		$stmt->close();
		$conn->close();
	}
?>
