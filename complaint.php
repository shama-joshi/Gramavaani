<?php
    
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$houseNumber = $_POST['houseNumber'];
	$contactNumber = $_POST['contactNumber'];
    $issueDescription=$_POST['issueDescription'];
// Database connection
	$conn = new mysqli('localhost','root','','gramavaani');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	}
else
	{
		$stmt=$conn->prepare("insert into complaintissue(firstname,lastname, housenumber,contactnumber,issues) values(?, ?, ?, ?, ?)");
		$stmt->bind_param( "ssiis", $firstName, $lastName,$houseNumber,$contactNumber, $issueDescription);
    	$stmt->execute();
		echo "<script>alert('we verify your issue')</script>";
		echo "<script>window.location.replace('/gramavaani_v2/complaint.html')</script>";
		$stmt->close();
		$conn->close();
	}
?>